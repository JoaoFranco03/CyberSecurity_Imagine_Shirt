@extends('../template.settings_navbar')
@section('content_settings')

    <form class="divide-y divide-gray-200 dark:divide-gray-600 lg:col-span-9"
          action="{{route("users.update", ['user' => $user])}}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Account section -->
        <div class="py-6 px-4 sm:p-6 lg:pb-8">
            <div>
                <h2 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-50">
                    Account</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">This information will
                    not be displayed publicly</p>
            </div>

            <div class="mt-6 flex flex-col lg:flex-row">
                <div class="flex-grow space-y-6 dark:text-white">
                    <div>
                        <label for="name"
                               class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name:</label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="text" name="name" id="name" autocomplete="name" @if(Auth::user()->user_type == 'E') disabled @endif
                                   class="block dark:bg-gray-800 w-full min-w-0 flex-grow rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                   value="{{$user->name}}">
                        </div>
                    </div>

                    <div>
                        <label for="email"
                               class="block text-sm font-medium text-gray-700 dark:text-gray-200">E-mail:</label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email" autocomplete="input" @if(Auth::user()->user_type == 'E') disabled @endif
                                   class="block dark:bg-gray-800 w-full min-w-0 flex-grow rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                   value="{{$user->email}}">
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-shrink-0 lg:flex-grow-0">
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-200"
                       aria-hidden="true">Photo:</p>

                    <div
                        class="relative overflow-hidden rounded-full border shadow-sm block">
                        <img class="relative h-40 w-40 rounded-full" id="user_img"
                             src="@if(Auth::user()->photo_url == null){{asset('img/default_img.png')}}@else{{ asset('storage/photos/' . $user->photo_url) }}@endif"
                                                     alt="">
                                                <label for="desktop-user-photo"
                                                       class="absolute inset-0 flex h-40 w-40 rounded-full items-center text-white justify-center bg-black/30 bg-opacity-75 text-sm font-medium dark:text-white opacity-0 hover:opacity-100 backdrop-blur-md transition ease-in-out duration-300">
                                                    <span>Change</span>
                                                    <span class="sr-only"> user photo</span>
                                                    <input type="file" id="desktop-user-photo" name="user_photo" @if(Auth::user()->user_type == 'E') disabled @endif
                                                           class="absolute inset-0 h-full w-full cursor-pointer rounded-md border-gray-300 opacity-0">
                                                </label>
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
                                    @if(Auth::user()->id == $user->id)
                                        <div class="grid grid-cols-12 gap-6">
                                            <div class="col-span-12 sm:col-span-6">
                                                <label for="password"
                                                       class="block text-sm font-medium text-gray-700 dark:text-gray-200">Password:</label>
                                                <input type="password" name="password" id="password"
                                                       class="mt-1 block dark:bg-gray-800 w-full min-w-0 flex-grow rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                            </div>

                                            <div class="col-span-12 sm:col-span-6">
                                                <label for="confirm-password"
                                                       class="block text-sm font-medium text-gray-700 dark:text-gray-200">Confirm
                                                    Password:</label>
                                                <input type="password" name="confirm_password" id="confirm_password"
                                                       class="mt-1 block dark:bg-gray-800 w-full min-w-0 flex-grow rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <!-- Privacy section -->
                                <div>
                                    <div class="mt-4 flex justify-end py-4 px-4 sm:px-6">
                                        <button type="submit"
                                                class="ml-5 inline-flex justify-center rounded-md border border-transparent bg-blue-700 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
@endsection
