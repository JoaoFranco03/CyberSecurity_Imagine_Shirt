@extends('../template.dashboard_navbar')

@section('content')
    <div id="user-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="fixed inset-0 bg-gray-500 dark:bg-black dark:bg-opacity-50 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0" x>
                <div>
                    <form hidden></form>
                    <form action="{{route('users.store')}}" method="POST" class="relative transform overflow-hidden rounded-xl bg-white dark:bg-gray-800 px-4 pt-5 pb-4
                        text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6 dark:text-white"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="">
                            <div class="mt-3 text-center sm:mt-0 sm:text-left">
                                <div class="mt-6 flex flex-col lg:flex-row">
                                    <div class="flex-grow space-y-6">
                                        <div>
                                            <label for="name"
                                                   class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name:</label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <input required type="text" name="name" id="name" autocomplete="name"
                                                       class="block dark:bg-gray-800 w-full min-w-0 flex-grow rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                            </div>
                                            @error('name')
                                            <div class="text-red-600 mt-1 text-md font-bold">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="email"
                                                   class="block text-sm font-medium text-gray-700 dark:text-gray-200">E-mail:</label>
                                            <div class="mt-1">
                                                <input required type="email" name="email" id="email"
                                                       pattern="[^ @]*@[^ @]*"
                                                       class="block dark:bg-gray-800 w-full min-w-0 flex-grow rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                            </div>
                                            @error('email')
                                            <div class="text-red-600 mt-1 text-md font-bold">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-shrink-0 lg:flex-grow-0">
                                        <p class="text-sm font-medium text-gray-700 dark:text-gray-200"
                                           aria-hidden="true">
                                            Photo:</p>

                                        <div
                                            class="relative hidden overflow-hidden rounded-full border shadow-sm lg:block">
                                            <img class="relative h-36 w-36 rounded-full" id="user_img"
                                                 src="{{asset('img/default_img.png')}}" alt="">
                                            <label for="desktop-user-photo"
                                                   class="absolute inset-0 flex h-full w-full rounded-full items-center text-white justify-center bg-black/30 bg-opacity-75 text-sm font-medium dark:text-white opacity-0 hover:opacity-100 backdrop-blur-md transition ease-in-out duration-300">
                                                <span>Change</span>
                                                <span class="sr-only"> user photo</span>
                                                <input type="file" id="desktop-user-photo" name="photo_url"
                                                       class="absolute inset-0 h-full w-full cursor-pointer rounded-md border-gray-300 opacity-0">
                                            </label>
                                            @error('photo_url')
                                            <div class="text-red-600 mt-1 text-md font-bold">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                            <script>
                                                document.getElementById("desktop-user-photo").onchange = function (e) {
                                                    var files = e.target.files;
                                                    if (FileReader && files && files.length) {
                                                        var fr = new FileReader();
                                                        fr.onload = function () {
                                                            document.getElementById("user_img").src = fr.result;
                                                        }
                                                        fr.readAsDataURL(files[0]);
                                                    }
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-4">
                                    <div class="col-span-12 sm:col-span-6">
                                        <label for="password"
                                               class="block text-sm font-medium text-gray-700 dark:text-gray-200">Password:</label>
                                        <input required type="password" name="password" id="password"
                                               class="mt-1 block dark:bg-gray-800 w-full min-w-0 flex-grow rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                    </div>
                                    @error('password')
                                    <div class="text-red-600 mt-1 text-md font-bold">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                    <div class="col-span-12 sm:col-span-6">
                                        <label for="confirm-password"
                                               class="block text-sm font-medium text-gray-700 dark:text-gray-200">Confirm
                                            Password:</label>
                                        <input required type="password" name="confirm_password" id="confirm_password"
                                               class="mt-1 block dark:bg-gray-800 w-full min-w-0 flex-grow rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                    </div>
                                    @error('confirm_password')
                                    <div class="text-red-600 mt-1 text-md font-bold">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="col-span-12">
                                        <label for="user_type"
                                               class="block text-sm font-medium text-gray-700 dark:text-gray-200">User
                                            Type:</label>
                                        <select name="user_type" id="user_type"
                                                class="mt-1 block dark:bg-gray-800 w-full min-w-0 flex-grow rounded-md border-gray-300 dark:text-white dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                            <option value="A">Administrator</option>
                                            <option value="E">Employee</option>
                                        </select>
                                    </div>
                                    @error('user_type')
                                    <div class="text-red-600 mt-1 text-md font-bold">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                            <button type="submit"
                                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-blue-600 px-8 py-2 text-base font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                                Add
                            </button>
                            <button type="button" data-modal-hide="user-modal"
                                    class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 sm:mt-0 sm:w-auto sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <main class="flex-1">
        <div x-data="{ modelOpen: false }">
            <div x-show="modelOpen" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true"
                 x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" role="dialog"
                 aria-modal="true">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <div class="fixed inset-0 z-10 overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0" x>
                        <div
                            class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <!-- Heroicon name: outline/exclamation-triangle -->
                                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Are you
                                        sure
                                        you want to delete
                                        the client?</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">This action cannot be reversed</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                <button type="button"
                                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-8 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                                    Delete
                                </button>
                                <button type="button" @click="modelOpen =!modelOpen"
                                        class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 sm:mt-0 sm:w-auto sm:text-sm">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-6 rounded-tl-xl">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                    <!-- Replace with your content -->
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-xl font-semibold text-gray-900 dark:text-white">Users</h1>
                            <p class="mt-2 text-sm text-gray-700 dark:text-gray-400">A list of all the Users of the
                                Store.
                            </p>
                        </div>
                        <div class="mt-1">
                        </div>
                        @can('viewAny', \App\Models\User::class)
                        <form action="{{route('users.index')}}" id="searchform">
                            <div class="block space-y-3 md:space-y-0 md:flex md:space-x-2 items-center bg-white dark:bg-gray-900">

                                <div class="flex items-center">
                                    <p
                                        class="whitespace-nowrap justify-center text-sm font-medium me-2 text-gray-700 dark:text-gray-100">
                                        User Type:
                                    </p>
                                    <select id="location" name="user_type"
                                            onchange="document.getElementById('searchform').submit()"
                                            class="dark:text-white dark:bg-gray-800 w-full rounded-md border-gray-300 dark:border-gray-700 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                                        <option @if($user_type=='All' ) selected @endif> All</option>
                                        <option @if($user_type=='Client' ) selected @endif> Client</option>
                                        <option @if($user_type=='Employee' ) selected @endif> Employee</option>
                                        <option @if($user_type=='Admin' ) selected @endif> Admin</option>
                                    </select>
                                </div>

                                <button id="add_new_user" type="button" data-modal-target="user-modal"
                                        data-modal-toggle="user-modal"
                                        class="inline-flex w-full mt-2 md:w-fit items-center justify-center rounded-md border border-gray-800 text-white bg-black px-4 py-2 text-sm font-medium shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-neutral-500 dark:focus:ring-neutral-800 sm:w-auto transition dark:bg-gray-800 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 4.5v15m7.5-7.5h-15"/>
                                    </svg>
                                    Add New User
                                </button>
                            </div>
                        </form>
                        @endcan
                    </div>
                    <button onclick="block_unblock_user(document.getElementsByClassName('checkuser'))" hidden
                            id="all_checked_btn" class="bg-red-500">Block/Unblock User
                    </button>
                    @can('viewAny', \App\Models\User::class)
                    <div class="flex w-full space-x-2">
                        <div class="flex items-center w-80 my-4 border-r pr-2">
                            <p
                            class="whitespace-nowrap justify-center text-sm font-medium me-2 text-gray-700 dark:text-gray-100">
                            Sort By:
                        </p>
                            <select type="text" id="table-search" form="searchform" name="sort" onchange="this.form.submit()"
                                   class="block p-2 pl-4 text-sm text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                   <option value="A_Z" @if($sort == "A_Z")selected @endif>Name: A to Z</option>
                                   <option value="Z_A" @if($sort == "Z_A")selected @endif>Name: Z to A</option>
                                    <option value="Newest" @if($sort == "Newest")selected @endif>Newest Users</option>
                                    <option value="Oldest" @if($sort == "Oldest")selected @endif>Oldest Users</option>
                            </select>
                        </div>
                        <div class="relative my-4 w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="table-search" name="search"
                                   class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="Search for Users" value="{{$search}}" form="searchform"
                                   onchange="document.getElementById('searchform').submit()">
                        </div>
                    </div>
                    @endcan
                    <div class="flex flex-col">
                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div
                                    class="overflow-hidden shadow ring-1 ring-black dark:ring-white dark:ring-opacity-10 ring-opacity-5 md:rounded-lg">

                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead class="bg-gray-50 dark:bg-gray-800 rounded-xl">
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                <input type="checkbox" name="check_all" id="check_all" class="h-4 w-4 rounded border-gray-300 dark:boder-gray-400 text-blue-600 dark:bg-gray-500 bg-white focus:ring-blue-500 transition duration-250
                                                ease-in-out" onclick="var elems = document.getElementsByClassName('checkuser');
                                                var n = 0;
                                                for (var i = 0; i < elems.length; i++) {
                                                    elems[i].click();
                                                    enable_disable_btn(elems, document.getElementById('all_checked_btn'));
                                                }
                                                ">
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                                User
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                                NIF
                                            </th>
                                            <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                                User since
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                                User Type
                                            </th>
                                            <th scope="col" class="relative py-3.5">

                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach ($users as $user)
                                            <tr x-data="{ checked: false }"
                                                :class="{ 'bg-blue-50 dark:bg-blue-950/50 transition duration-100': checked }">
                                                <td
                                                    class="whitespace-nowrap pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                    <input type="checkbox" name="{{$user->id}}" id="{{$user->id}}"
                                                           class="checkuser h-4 w-4 rounded border-gray-300 dark:boder-gray-400 text-blue-600 dark:bg-gray-500 bg-white focus:ring-blue-500 transition duration-250
                                                ease-in-out" x-model="checked"
                                                           onchange="enable_disable_btn(document.getElementsByClassName('checkuser'), document.getElementById('all_checked_btn'))">
                                                </td>
                                                <td
                                                    class="whitespace-nowrap py-4 text-sm font-medium text-gray-900 dark:text-white sm:pl-3">
                                                    @can('view', $user)
                                                        <a class="pl-3 flex items-center"
                                                           href="{{route('users.show', ['user' => $user])}}">
                                                            @else
                                                                <span class="pl-3 flex items-center">
                                                        @endcan

                                                        <img class="h-10 w-10 shadow flex-shrink-0 rounded-full"
                                                             src="@if($user->photo_url == null){{asset('img/default_img.png')}}@else{{asset('storage/photos/'.$user->photo_url)}}@endif"
                                                             alt="">
                                                        <p class="pl-3 truncate">{{$user->name}}</p>
                                                                @can('view', $user)
                                                        </a>
                                                        @else
                                                            </span>
                                                    @endcan

                                                </td>
                                                <td class="px-3 py-4 text-sm text-gray-500 dark:text-gray-300">
                                                    @if (isset($user->customer->nif))
                                                        {{$user->customer->nif}}
                                                    @else
                                                        <div class="dark:text-gray-500 text-gray-300 italic">
                                                            No NIF available
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="px-3 py-4 text-sm text-gray-500 dark:text-gray-300">
                                                    {{$user->created_at->format('d/m/Y')}}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4">
                                                    @include('layouts.partials.userTypeBadges', ['user', $user])</td>
                                                <td
                                                    class="whitespace-nowrap px-3 py-4">
                                                    <div class="flex items-center justify-end space-x-2">
                                                    <form method="POST" class="flex space-x-2" action="{{ route('users.update', ['user' => $user]) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        @if(Auth::user()->id != $user->id)
                                                            @if($user->blocked == 0)
                                                                <input type="submit" name="block"
                                                                       class="inline-flex items-center justify-center rounded-md border-transparent bg-orange-50 dark:bg-orange-950 dark:hover:bg-orange-900 border-orange-600 ring-1 ring-inset ring-orange-700/10 dark:ring-orange-600/25 px-4 py-1 text-sm font-medium text-orange-700 dark:text-orange-300 shadow-sm hover:bg-orange-100 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 sm:w-auto transition"
                                                                       value="Block User">
                                                            @else
                                                                <input type="submit" name="block"
                                                                       class="inline-flex items-center justify-center rounded-md border-transparent bg-green-50 dark:bg-green-950 dark:hover:bg-green-900 border-green-600 ring-1 ring-inset ring-green-700/10 dark:ring-green-600/25 px-4 py-1 text-sm font-medium text-green-700 dark:text-green-300 shadow-sm hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 sm:w-auto transition"
                                                                       value="Unlock User">
                                                            @endif
                                                        @endif
                                                        @if(Auth::user()->id == $user->id || $user->user_type != 'C')
                                                            <a href="{{route('users.edit', ['user' => $user])}}"
                                                               class="inline-flex items-center justify-center rounded-md border-transparent bg-yellow-50 dark:bg-yellow-950 dark:hover:bg-yellow-900 border-yellow-600 ring-1 ring-inset ring-yellow-700/10 dark:ring-yellow-600/25 px-4 py-1 text-sm font-medium text-yellow-700 dark:text-yellow-300 shadow-sm hover:bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 sm:w-auto transition">Edit
                                                                User</a>
                                                        @endif
                                                            <form hidden></form>
                                                            <form id="delete_{{$user->id}}"
                                                                  action="{{route('users.destroy', ['user' => $user])}}"
                                                                  method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <input type="submit" name="block"
                                                                       form="delete_{{$user->id}}"
                                                                       class="inline-flex items-center justify-center rounded-md border-transparent bg-red-50 dark:bg-red-950 dark:hover:bg-red-900 border-red-600 ring-1 ring-inset ring-red-700/10 dark:ring-red-600/25 px-4 py-1 text-sm font-medium text-red-700 dark:text-red-300 shadow-sm hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:w-auto transition"
                                                                       value="Delete User">
                                                            </form>

                                                    </form>
                                                </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- More people... -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pt-14 mx-auto">
                                    {{ $users->withQueryString()->links('pagination::tailwind') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /End replace -->
            </div>
        </div>
    </main>
    <script>

        @if ($errors->any())

            window.onload = function () {
            document.getElementById("add_new_user").click();
        }
        @endif

        function enable_disable_btn(checkboxes, btn) {
            var n = 0;
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    btn.hidden = false;
                    return;
                }
            }

            btn.hidden = true;
            return;
        }

        function block_unblock_user(checkboxes) {
            url = "{{route('users.index')}}/"
            const data = {
                block: 'block',
            };
            const options = {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            };
            var request = new XMLHttpRequest();
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    request.open('PUT', url + checkboxes[i].id, true);
                    request.setRequestHeader('Content-Type', 'application/json');
                    request.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}')
                    request.onload = function () {
                        if (request.status >= 200 && request.status < 400) {
                            var data = JSON.parse(request.responseText);
                            // Handle the response data here
                            console.log(data);
                        } else {
                            // Handle request errors here
                            console.error('Error:', request.statusText);
                        }
                    };
                    request.send(JSON.stringify({
                        // Request payload data
                        block: 'block user',
                        _token: '{{ csrf_token() }}',
                        method: 'PUT'
                        // Add more key-value pairs as needed
                    }));
                }
            }
            request.onloadend = function () {
                window.location.href = "{{route('users.index')}}";
            };

            request.onerror = function () {
                // There was a connection error of some sort
                window.location.href = "{{route('users.index')}}";
            };
        }
    </script>
@endsection
