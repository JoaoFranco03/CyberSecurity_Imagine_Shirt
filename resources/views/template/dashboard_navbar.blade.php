<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Dashboard</title>
    <script defer src=" https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/datepicker.min.js"></script>
</head>

<body class="bg-white dark:bg-gray-900">
<div>
    <!-- Static sidebar for desktop -->
    <div class="md:fixed md:inset-y-0 flex md:w-64 md:flex-col">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div
            class="flex flex-grow flex-col overflow-y-auto dark:bg-gray-800 dark:shadow-white/10 bg-gray-50 border-gray-200 shadow-sm m-2 ml-5 rounded-xl pt-5 mb-5 border dark:border-gray-700">
            <div class="flex flex-shrink-0 items-center px-4">
                <div class="h-8 w-auto">
                    <a href="{{ route('home') }}">
                        <span class="sr-only">Imagine Shirt</span>
                        <svg
                            class="h-8 w-auto dark:fill-gray-200 fill-gray-900 transition ease-in-out duration-500 text-red-700"
                            width="1000" height="1000" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path id="Preenchimento-de-cor" fill="#2e1c6a" stroke="none" visibility="hidden"
                                  d="M 0 0 L 1000 0 L 1000 1000 L 0 1000 Z"/>
                            <g>
                                <g id="Logo-Symbols">
                                    <path id="Symbol-4" fill-rule="evenodd" stroke="none" visibility="hidden"
                                          d="M -9.314716 1000.093567 C 63.002777 843.19873 190.830841 709.565186 361.075989 666.741882 C 181.12204 617.362305 30.451166 473.044922 -9.314716 277.831604 C -13.865477 254.508728 -7.608181 236.336182 -9.314716 213.013306 C -9.314716 213.013306 144.469131 247.144226 268.478333 213.013306 C 400.45163 177.17572 554.490784 72.756958 694.427673 27.817932 C 857.118713 -24.516357 972.220642 9.298401 972.220642 9.298401 C 979.615662 31.483582 995.449402 50.225586 999.999939 74.116699 C 1054.019043 339.301636 886.918823 596.317566 629.609253 666.741882 C 800.316589 709.464905 942.942871 840.6604 1009.259766 1000.093567 L -9.314716 1000.093567 Z"/>
                                    <path id="Symbol-3" fill="#8ee09c" fill-rule="evenodd" stroke="none"
                                          visibility="hidden"
                                          d="M -9.314716 0.038635 L 249.958786 703.781006 L 1000 0.038635 Z M -9.314716 1000.093567 L 249.958786 703.781006 L 1000 1000.093567 Z"/>
                                    <path id="Symbol-2" fill-rule="evenodd" stroke="none" visibility="hidden"
                                          d="M -0.054948 1000.093567 L -0.054948 500.066101 C 275.381042 500.066101 497.741791 725.118408 499.972504 1000.093567 C 502.150848 725.171143 724.563843 500.066101 1000 500.066101 L 1000 1000.093567 L 499.972504 1000.093567 L 499.972504 1000.093567 L -0.054948 1000.093567 Z M 1000 500.066101 C 722.064392 498.954651 499.972504 276.827087 499.972504 0.038635 L 1000 0.038635 L 1000 500.066101 Z M 499.972504 0.038635 C 499.999786 276.889771 276.73349 500.066101 -0.054948 500.066101 L -0.054948 0.038635 L 499.972504 0.038635 Z"/>
                                    <path id="Symbol-1" fill-rule="evenodd" stroke="none"
                                          d="M 495.412811 1000.093567 C 219.223709 997.828918 0 778.930847 0 504.680725 C 0 230.430664 221.162704 9.267883 495.412811 9.267883 C 769.662903 9.267883 1000 230.430664 1000 504.680725 C 1000 778.930847 769.662903 1000.093567 495.412811 1000.093567 Z M 403.669708 688.166931 C 337.590179 651.633911 293.577972 585.137329 293.577972 504.680725 C 293.577972 424.317322 336.825439 355.615173 403.669708 321.194458 C 180.449188 338.25354 9.174312 413.343567 9.174312 504.680725 C 9.174312 596.0495 180.335083 671.142578 403.669708 688.166931 Z M 587.155945 688.166931 C 805.736755 668.990112 981.651367 596.050903 981.651367 504.680725 C 981.651367 413.341919 810.381531 338.251831 587.155945 321.194458 C 654.000061 355.615173 706.421997 424.317322 706.421997 504.680725 C 706.421997 585.137329 654.12677 653.787903 587.155945 688.166931 Z"/>
                                </g>
                                <text id="Imagine" visibility="hidden" xml:space="preserve">
                                        <tspan x="-689.940901" y="1626" font-family="Archivo SemiExpanded"
                                               font-size="574.105609" font-weight="700" letter-spacing="-11.316707"
                                               xml:space="preserve">Imagine
                                        </tspan>
                                    <tspan x="-193.74825" y="2126" font-family="Archivo SemiExpanded"
                                           font-size="574.105609" font-weight="700" letter-spacing="-11.316707"
                                           xml:space="preserve">Shirt</tspan>
                                    </text>
                            </g>
                        </svg>

                    </a>
                </div>
            </div>
            <div class="flex flex-col h-full">
                {{-- Pages --}}
                <div class="mt-5 flex flex-grow flex-col">
                    <nav class="flex-1 space-y-1 px-2 pb-4">
                        <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:bg-neutral-700 hover:text-gray-900" -->
                        @if(Auth::user()->user_type == 'A')
                            <a href="{{ route('dashboard.index') }}"
                               class="{{ Str::startsWith(Request::route()->getName(), 'dashboard.') ? 'shadow bg-white dark:bg-gray-600 dark:text-white text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md' : 'text-gray-700 transition duration-300 active:bg-white hover:shadow hover:bg-neutral-100 dark:hover:bg-gray-700 group flex items-center px-2 py-2 text-sm font-medium rounded-md dark:text-gray-200' }}">
                                <!--
                        Heroicon name: outline/home

                        Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500"
                        -->
                                <svg class="w-6 h-6 dark:text-white text-gray-900 mr-3 flex-shrink-0 h-6 w-6"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>
                                </svg>

                                Statistics
                            </a>
                        @endif
                        @if(Auth::user()->user_type == 'A')
                            <a href="{{ route('users.index') }}"
                               class="{{ Str::startsWith(Request::route()->getName(), 'users.') ? 'shadow bg-white dark:bg-gray-600 dark:text-white text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md' : 'text-gray-700 transition duration-300 active:bg-white hover:shadow hover:bg-neutral-100 dark:hover:bg-gray-700 group flex items-center px-2 py-2 text-sm font-medium rounded-md dark:text-gray-200' }}"
                            >
                                <!-- Heroicon name: outline/users -->
                                <svg class="dark:text-gray-200 text-gray-900 mr-3 flex-shrink-0 h-6 w-6"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                                </svg>
                                Users
                            </a>
                        @endif
                        @if(Auth::user()->user_type != 'C')
                            <a href="{{ route('orders.index') }}"
                               class="{{ Str::startsWith(Request::route()->getName(), 'orders.') ? 'shadow bg-white dark:bg-gray-600 dark:text-white text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md' : 'text-gray-700 transition duration-300 active:bg-white hover:shadow hover:bg-neutral-100 dark:hover:bg-gray-700 group flex items-center px-2 py-2 text-sm font-medium rounded-md dark:text-gray-200' }}">
                                <!-- Heroicon name: outline/folder -->
                                <svg class="dark:text-gray-200 text-gray-900 mr-3 flex-shrink-0 h-6 w-6"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z"/>
                                </svg>
                                Orders
                            </a>
                        @endif
                        @if(Auth::user()->user_type == 'A')
                            <a href="{{ route('colors.index') }}"
                               class="{{ Str::startsWith(Request::route()->getName(), 'colors.') ? 'shadow bg-white dark:bg-gray-600 dark:text-white text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md' : 'text-gray-700 transition duration-300 active:bg-white hover:shadow hover:bg-neutral-100 dark:hover:bg-gray-700 group flex items-center px-2 py-2 text-sm font-medium rounded-md dark:text-gray-200' }}">
                                <svg class="dark:text-gray-200 text-gray-900 mr-3 flex-shrink-0 h-6 w-6"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.438-.439 1.15-.439 1.59 0l3.712 3.713c.44.44.44 1.152 0 1.59l-2.879 2.88M6.75 17.25h.008v.008H6.75v-.008z"/>
                                </svg>

                                Colors
                            </a>
                            <a href="{{route('categories.index')}}"
                               class="{{ Str::startsWith(Request::route()->getName(), 'categories') ? 'shadow bg-white dark:bg-gray-600 dark:text-white text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md' : 'text-gray-700 transition duration-300 active:bg-white hover:shadow hover:bg-neutral-100 dark:hover:bg-gray-700 group flex items-center px-2 py-2 text-sm font-medium rounded-md dark:text-gray-200' }}">
                                <svg class="w-6 h-6 dark:text-gray-200 text-gray-900 mr-3 flex-shrink-0 h-6 w-6"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M3 4.5h14.25M3 9h9.75M3 13.5h9.75m4.5-4.5v12m0 0l-3.75-3.75M17.25 21L21 17.25"/>
                                </svg>


                                Categories
                            </a>
                            <a href="{{ route('prints.index') }}"
                               class="{{ Str::startsWith(Request::route()->getName(), 'prints') ? 'shadow bg-white dark:bg-gray-600 dark:text-white text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md' : 'text-gray-700 transition duration-300 active:bg-white hover:shadow hover:bg-neutral-100 dark:hover:bg-gray-700 group flex items-center px-2 py-2 text-sm font-medium rounded-md dark:text-gray-200' }}">
                                <svg class="dark:text-gray-200 text-gray-900 mr-3 flex-shrink-0 h-6 w-6"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M14.5135 5.00008L17.1201 2.39348C17.5106 2.00295 18.1438 2.00295 18.5343 2.39348L22.777 6.63612C23.1675 7.02664 23.1675 7.65981 22.777 8.05033L18.9988 11.8285V21.0001C18.9988 21.5524 18.5511 22.0001 17.9988 22.0001H5.9988C5.44652 22.0001 4.9988 21.5524 4.9988 21.0001V11.8285L1.22063 8.05033C0.830103 7.65981 0.830103 7.02664 1.22063 6.63612L5.46327 2.39348C5.85379 2.00295 6.48696 2.00295 6.87748 2.39348L9.48408 5.00008H14.5135ZM15.3419 7.00008H8.65566L6.17037 4.5148L3.34195 7.34323L6.9988 11.0001V20.0001H16.9988V11.0001L20.6557 7.34323L17.8272 4.5148L15.3419 7.00008Z"></path>
                                </svg>


                                Prints
                            </a>

                            <a href="{{ route('prices.index') }}"
                               class="{{ Str::startsWith(Request::route()->getName(), 'prices.') ? 'shadow bg-white dark:bg-gray-600 dark:text-white text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md' : 'text-gray-700 transition duration-300 active:bg-white hover:shadow hover:bg-neutral-100 dark:hover:bg-gray-700 group flex items-center px-2 py-2 text-sm font-medium rounded-md dark:text-gray-200' }}">
                                <svg class="w-6 h-6 dark:text-gray-200 text-gray-900 mr-3 flex-shrink-0 h-6 w-6"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M14.25 7.756a4.5 4.5 0 100 8.488M7.5 10.5h5.25m-5.25 3h5.25M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>


                                Prices
                            </a>
                        @endif
                    </nav>
                </div>
                {{-- User --}}
                <nav class="px-2 pb-2 flex-shrink">
                    <div href="{{ url('/dashboard') }}"
                         class="shadow bg-white dark:bg-gray-700 dark:text-white text-gray-900 group items-center py-2 text-sm font-medium border border-gray-200 dark:border-gray-600 rounded-xl">
                        <div class="flex px-2">
                            <a href="" class="aspect-1 h-10 w-10">
                                <img
                                    src="@if(auth()->user()->photo_url == null){{asset('img/default_img.png')}}@else{{asset('storage/photos/'.auth()->user()->photo_url)}}@endif"
                                    alt="" class=" rounded-full h-10 w-10 object-cover aspect-1 p-1">
                            </a>
                            <div class="flex justify-between items-center w-full ml-1">
                                <div>
                                    @php
                                        $fullName = auth()->user()->name;
                                        $nameParts = explode(' ', $fullName);
                                        $firstName = head($nameParts);
                                        $lastName = count($nameParts) > 1 ? last($nameParts) : '';
                                    @endphp
                                    <a href="{{route("users.edit",["user"=>Auth::user()])}}">
                                        <p class="text-sm text-ellipsis"> {{ $firstName }} {{ $lastName }}
                                    </a>
                                    <p class="text-xs text-gray-500">
                                        @include('layouts.partials.dashboardUserTypeText')</p>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                    <button type="submit" value="Logout"
                                            class="p-1 mr-1 bg-gray-100 dark:bg-gray-700 rounded-md border border-gray-300 dark:border-gray-500 dark:hover:bg-gray-500 hover:bg-gray-200 transition ease-in-out duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="flex flex-1 flex-col md:pl-64">
        <div class="sticky top-0 z-10 flex h-16 flex-shrink-0 bg-white dark:bg-gray-900">
            <button type="button"
                    class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 md:hidden">
                <span class="sr-only">Open sidebar</span>
                <!-- Heroicon name: outline/bars-3-bottom-left -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12"/>
                </svg>
            </button>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8 flex flex-1 bg-white dark:bg-gray-900">
                <div class="justify-between flex flex-1 border-b dark:border-gray-700">
                    <div class="my-auto">
                        <p class="text-sm text-gray-400">{{Carbon\Carbon::now()->format('l, F j')}}</p>
                        <p class="text-black font-bold dark:text-white">Hello, {{ $firstName }}</p>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
</div>
</body>

</html>
