<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\User;

class ClientController extends Controller
{
    public function __construct()
    {
        //$this->AuthorizeResource(User::class, 'user');
    }

    public function index(Request $request): View
    {
        $user = Auth::user();
        $search_filter = $request->search ?? '';
        $user_type = $request->user_type ?? 'All';

        if ($user->user_type == 'C') {
            return view('settings.account')
                ->with('user', $user);
        } else if ($user->user_type == 'E') {
            return view('settings.account')->with('user', $user);
        }

        $users = User::where('name', 'like', '%' . $search_filter . '%');
        

        if ($user_type == 'Client') {
            $users = $users->where('user_type', 'C');
        } elseif ($user_type == 'Employee') {
            $users = $users->where('user_type', 'E');
        } elseif ($user_type == 'Admin') {
            $users = $users->where('user_type', 'A');
        }

        $sort = $request->sort ?? 'A_Z';

        if ($sort == 'A_Z') {
            $users = $users->orderBy('name', 'asc');
        } elseif ($sort == 'Z_A') {
            $users = $users->orderBy('name', 'desc');
        } elseif ($sort == 'Newest') {
            $users = $users->orderBy('created_at', 'desc');
        } elseif ($sort == 'Oldest') {
            $users = $users->orderBy('created_at', 'asc');
        }

        $users = $users->paginate(21);
        
        return view('dashboard.clients.index')->with('users', $users)->with('search', $search_filter)->with('user_type', $user_type)->with('sort', $sort);
    }

    public function show(User $user): View
    {
        $this->authorize('view', $user);
        return view('settings.account')
            ->with('user', $user);
    }

    public function edit(User $user): View
    {
        $this->authorize('update', $user);
        return view('settings.account')
            ->with('user', $user);
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        if ($request->block) {
            if ($user->blocked == 0) {
                $user->blocked = 1;
            } else {
                $user->blocked = 0;

            }
            $user->save();
            return redirect()->back();
        }

        if ($request->customer) {
            if ($request->customer == 'Billing') {
                $user->customer->default_payment_type = $request->default_payment_type;
                $user->customer->default_payment_ref = $request->default_payment_ref;
                $user->customer->nif = $request->nif;
            } elseif ($request->customer == 'Shipping') {
                $user->customer->address = $request->address;
            }
            $user->customer->save();
            return redirect()->back();
        }


        DB::transaction(function () use ($request, $user) {
            if (Auth::user()->id == $user->id && $request->password != null) {
                if ($request->password == $request->confirm_password) {
                    $user->password = Hash::make($request->password);
                } else {
                    return redirect()->route("account.index")->withErrors(['error' => 'Passwords do not match']);
                }
            }
            if (Auth::user()->user_type != 'E') {
                $user->name = $request->name;
                $user->email = $request->email;
                if ($request->hasFile('user_photo')) {
                    if ($user->photo_url) {
                        Storage::delete('public/photos/' . $user->photo_url);
                    }
                    $path = $request->user_photo->store('public/photos');
                    $user->photo_url = basename($path);
                }
            }

            $user->save();
        });


        return redirect()->route('account.index');

    }


    public function store(UserRequest $request): RedirectResponse
    {
        //$formData = $request->validated();
        $user = DB::transaction(function () use ($request) {
            $newuser = new User();
            $newuser->email = $request->email;
            $newuser->name = $request->name;
            $newuser->user_type = $request->user_type;
            $newuser->password = Hash::make($request->password);
            if ($request->hasFile('photo_url')) {
                $path = $request->photo_url->store('public/photos');
                $newuser->photo_url = basename($path);
            }
            $newuser->save();
        });

        return back();
    }


    public function destroy(User $user): RedirectResponse
    {
        if ($user->user_type == 'C') {
            $user->delete();
        } else {
            $user->forceDelete();
        }
        return redirect()->back();
    }

}
