<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <meta name="theme-color" content="#3661E2" />
  @vite('resources/css/app.css')
  <script defer src=" https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js">
  </script>
  <!-- Start - Fancybox Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <!-- End - Fancybox Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
  <style>
    .drawing-area {
      position: absolute;
      top: 60px;
      left: 122px;
      z-index: 10;
      width: 200px;
      height: 400px;
      border: 2px dashed #ccc;

    }

    .canvas-container {
      width: 200px;
      height: 400px;
      position: relative;
      user-select: none;
    }

    #tshirt-div {
      width: 452px;
      height: 548px;
      position: relative;
      background-color: #fff;
    }

    #canvas {
      position: absolute;
      width: 200px;
      height: 400px;
      left: 0px;
      top: 0px;
      user-select: none;
      cursor: default;
    }
  </style>
</head>

<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
  <div>
    <header class="z-20 relative bg-white dark:bg-gray-900">
      <a href="{{ url('/products') }}"
        class="flex h-10 items-center justify-center bg-blue-600 px-4 text-sm font-medium text-white sm:px-6 lg:px-8">
        Get free delivery on all orders!</a>

      <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="border-b border-gray-200 dark:border-gray-800">
          <div class="flex h-16 justify-between items-center">
            <div class="flex justify-center items-center">
            <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
            <button type="button" class="rounded-md p-2 text-gray-400 hidden">
              <!-- Heroicon name: outline/bars-3 -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
            </button>

            <!-- Logo -->
            <div class="ml-4 flex lg:ml-0">
              <a href="/">
                <span class="sr-only">Imagine Shirt</span>
                <?xml version="1.0" encoding="UTF-8"?>
                <svg class="h-8 w-auto fill-blue-600 hover:fill-blue-700 transition ease-in-out duration-500"
                  width="1000" height="1000" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink">
                  <path id="Preenchimento-de-cor" fill="#2e1c6a" stroke="none" visibility="hidden"
                    d="M 0 0 L 1000 0 L 1000 1000 L 0 1000 Z" />
                  <g id="Logo-Placeholder-Replace-With-Your-Logo">
                    <g id="Logo-Symbols">
                      <path id="Symbol-4" fill="#3662e3" fill-rule="evenodd" stroke="none" visibility="hidden"
                        d="M -9.314716 1000.093567 C 63.002777 843.19873 190.830841 709.565186 361.075989 666.741882 C 181.12204 617.362305 30.451166 473.044922 -9.314716 277.831604 C -13.865477 254.508728 -7.608181 236.336182 -9.314716 213.013306 C -9.314716 213.013306 144.469131 247.144226 268.478333 213.013306 C 400.45163 177.17572 554.490784 72.756958 694.427673 27.817932 C 857.118713 -24.516357 972.220642 9.298401 972.220642 9.298401 C 979.615662 31.483582 995.449402 50.225586 999.999939 74.116699 C 1054.019043 339.301636 886.918823 596.317566 629.609253 666.741882 C 800.316589 709.464905 942.942871 840.6604 1009.259766 1000.093567 L -9.314716 1000.093567 Z" />
                      <path id="Symbol-3" fill="#8ee09c" fill-rule="evenodd" stroke="none" visibility="hidden"
                        d="M -9.314716 0.038635 L 249.958786 703.781006 L 1000 0.038635 Z M -9.314716 1000.093567 L 249.958786 703.781006 L 1000 1000.093567 Z" />
                      <path id="Symbol-2" fill="#3662e3" fill-rule="evenodd" stroke="none" visibility="hidden"
                        d="M -0.054948 1000.093567 L -0.054948 500.066101 C 275.381042 500.066101 497.741791 725.118408 499.972504 1000.093567 C 502.150848 725.171143 724.563843 500.066101 1000 500.066101 L 1000 1000.093567 L 499.972504 1000.093567 L 499.972504 1000.093567 L -0.054948 1000.093567 Z M 1000 500.066101 C 722.064392 498.954651 499.972504 276.827087 499.972504 0.038635 L 1000 0.038635 L 1000 500.066101 Z M 499.972504 0.038635 C 499.999786 276.889771 276.73349 500.066101 -0.054948 500.066101 L -0.054948 0.038635 L 499.972504 0.038635 Z" />
                      <path id="Symbol-1" fill="#3662e3" fill-rule="evenodd" stroke="none"
                        d="M 495.412811 1000.093567 C 219.223709 997.828918 0 778.930847 0 504.680725 C 0 230.430664 221.162704 9.267883 495.412811 9.267883 C 769.662903 9.267883 1000 230.430664 1000 504.680725 C 1000 778.930847 769.662903 1000.093567 495.412811 1000.093567 Z M 403.669708 688.166931 C 337.590179 651.633911 293.577972 585.137329 293.577972 504.680725 C 293.577972 424.317322 336.825439 355.615173 403.669708 321.194458 C 180.449188 338.25354 9.174312 413.343567 9.174312 504.680725 C 9.174312 596.0495 180.335083 671.142578 403.669708 688.166931 Z M 587.155945 688.166931 C 805.736755 668.990112 981.651367 596.050903 981.651367 504.680725 C 981.651367 413.341919 810.381531 338.251831 587.155945 321.194458 C 654.000061 355.615173 706.421997 424.317322 706.421997 504.680725 C 706.421997 585.137329 654.12677 653.787903 587.155945 688.166931 Z" />
                    </g>
                    <text id="Imagine" visibility="hidden" xml:space="preserve">
                      <tspan x="-689.940901" y="1626" font-family="Archivo SemiExpanded" font-size="574.105609"
                        font-weight="700" fill="#3662e3" letter-spacing="-11.316707" xml:space="preserve">Imagine
                      </tspan>
                      <tspan x="-193.74825" y="2126" font-family="Archivo SemiExpanded" font-size="574.105609"
                        font-weight="700" fill="#3662e3" letter-spacing="-11.316707" xml:space="preserve">Shirt</tspan>
                    </text>
                  </g>
                </svg>
              </a>
            </div>

            <!-- Flyout menus -->
            <div class="hidden lg:ml-8 lg:block lg:self-stretch">
              <div class="flex h-full space-x-8">
                <div class="flex">
                  <div class="relative flex">
                    <a href="{{ url('/products') }}"
                      class="flex items-center text-sm font-medium text-gray-700 hover:text-black transition duration-300 ease-in-out dark:text-gray-200 dark:hover:text-white"
                      aria-expanded="false">T-Shirts</a>
                  </div>
                </div>

                <a href="{{route("products.index")}}?sort=Popularity&search=&color=fafafa"
                  class="flex items-center text-sm font-medium text-gray-700 hover:text-black transition duration-300 ease-in-out dark:text-gray-200 dark:hover:text-white">Best
                  Sellers</a>

                <a href="{{route('my_prints.create_own')}}"
                  class="flex items-center text-sm font-medium text-gray-700 hover:text-black transition duration-300 ease-in-out dark:text-gray-200 dark:hover:text-white">Make
                  your Own T-Shirt</a>
              </div>
            </div>
          </div>

            <div class="flex justify-center items-center">
            @guest
            <div class="ml-auto flex items-center">
              <div class="flex items-center lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                <a href="{{route('login')}}"
                  class="text-sm mr-2 font-medium text-gray-700 hover:text-black transition duration-300 ease-in-out dark:text-gray-200 dark:hover:text-white">Login</a>
                <span class="h-6 w-px dark:bg-gray-200 bg-gray-500" aria-hidden="true"></span>
                <a href="{{route('register')}}"
                  class="text-sm ml-2 font-medium text-gray-700 hover:text-black transition duration-300 ease-in-out dark:text-gray-200 dark:hover:text-white">Register</a>
              </div>
              @endguest

              @auth
              <div class="flex items-center lg:flex-1 lg:items-center lg:justify-end lg:space-x-2 mr-4 md:mr-0">
                <a href="{{route("account.index")}}" class="flex items-center">
                <img
                  src="@if(auth()->user()->photo_url == null){{asset('img/default_img.png')}}@else{{ asset('storage/photos/' . auth()->user()->photo_url) }}@endif"
                  class="rounded-full h-8 mr-2" alt="">
                @php
                $fullName = auth()->user()->name;
                $nameParts = explode(' ', $fullName);
                $firstName = head($nameParts);
                $lastName = count($nameParts) > 1 ? last($nameParts) : '';
                @endphp
                <p
                  class="hidden md:flex text-sm font-medium text-gray-700 hover:text-black transition duration-300 ease-in-out dark:text-gray-200 dark:hover:text-white">
                  {{ $firstName }} {{ $lastName }} </p>
                </a>

                <span class="h-6 w-px bg-gray-200 flex" aria-hidden="true"></span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                  <input type="submit" value="Logout"
                    class="pl-2 md:pl-0 cursor-pointer text-sm font-medium text-gray-700 hover:text-black transition duration-300 ease-in-out dark:text-gray-200 dark:hover:text-white">
                </form>
              </div>
              @endauth

              <!-- Bag -->
              <div class="ml-4 flow-root text-sm lg:relative lg:ml-8">
                <a href="{{ route('cart.show') }}" type="button" class="group -m-2 flex items-center p-2"
                  aria-expanded="false">
                  <!-- Heroicon name: outline/shopping-bag -->
                  <span
                    class="mr-2 text-sm font-medium text-gray-700 dark:text-gray-400 group-hover:text-black dark:group-hover:text-gray-200">{{session('total',
                    0)}}</span>
                  <svg class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-black dark:group-hover:text-gray-200"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                  </svg>
                </a>
              </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>
    @yield('content')
    <footer class="border-t border-gray-200 dark:border-gray-800 dark:bg-gray-900">
      <div class="max-w-screen-xl px-4 py-16 mx-auto space-y-8 sm:px-6 lg:space-y-16 lg:px-8">
        <div class="flex justify-content-center items-center justify-center">
          <div class="flex flex-col items-center justify-center">
            <?xml version="1.0" encoding="UTF-8"?>
            <svg class="h-8 w-auto fill-blue-600 transition ease-in-out duration-500" width="1000" height="1000"
              viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <path id="Preenchimento-de-cor" fill="#2e1c6a" stroke="none" visibility="hidden"
                d="M 0 0 L 1000 0 L 1000 1000 L 0 1000 Z" />
              <g id="Logo-Placeholder-Replace-With-Your-Logo">
                <g id="Logo-Symbols">
                  <path id="Symbol-4" fill="#3662e3" fill-rule="evenodd" stroke="none" visibility="hidden"
                    d="M -9.314716 1000.093567 C 63.002777 843.19873 190.830841 709.565186 361.075989 666.741882 C 181.12204 617.362305 30.451166 473.044922 -9.314716 277.831604 C -13.865477 254.508728 -7.608181 236.336182 -9.314716 213.013306 C -9.314716 213.013306 144.469131 247.144226 268.478333 213.013306 C 400.45163 177.17572 554.490784 72.756958 694.427673 27.817932 C 857.118713 -24.516357 972.220642 9.298401 972.220642 9.298401 C 979.615662 31.483582 995.449402 50.225586 999.999939 74.116699 C 1054.019043 339.301636 886.918823 596.317566 629.609253 666.741882 C 800.316589 709.464905 942.942871 840.6604 1009.259766 1000.093567 L -9.314716 1000.093567 Z" />
                  <path id="Symbol-3" fill="#8ee09c" fill-rule="evenodd" stroke="none" visibility="hidden"
                    d="M -9.314716 0.038635 L 249.958786 703.781006 L 1000 0.038635 Z M -9.314716 1000.093567 L 249.958786 703.781006 L 1000 1000.093567 Z" />
                  <path id="Symbol-2" fill="#3662e3" fill-rule="evenodd" stroke="none" visibility="hidden"
                    d="M -0.054948 1000.093567 L -0.054948 500.066101 C 275.381042 500.066101 497.741791 725.118408 499.972504 1000.093567 C 502.150848 725.171143 724.563843 500.066101 1000 500.066101 L 1000 1000.093567 L 499.972504 1000.093567 L 499.972504 1000.093567 L -0.054948 1000.093567 Z M 1000 500.066101 C 722.064392 498.954651 499.972504 276.827087 499.972504 0.038635 L 1000 0.038635 L 1000 500.066101 Z M 499.972504 0.038635 C 499.999786 276.889771 276.73349 500.066101 -0.054948 500.066101 L -0.054948 0.038635 L 499.972504 0.038635 Z" />
                  <path id="Symbol-1" fill="#3662e3" fill-rule="evenodd" stroke="none"
                    d="M 495.412811 1000.093567 C 219.223709 997.828918 0 778.930847 0 504.680725 C 0 230.430664 221.162704 9.267883 495.412811 9.267883 C 769.662903 9.267883 1000 230.430664 1000 504.680725 C 1000 778.930847 769.662903 1000.093567 495.412811 1000.093567 Z M 403.669708 688.166931 C 337.590179 651.633911 293.577972 585.137329 293.577972 504.680725 C 293.577972 424.317322 336.825439 355.615173 403.669708 321.194458 C 180.449188 338.25354 9.174312 413.343567 9.174312 504.680725 C 9.174312 596.0495 180.335083 671.142578 403.669708 688.166931 Z M 587.155945 688.166931 C 805.736755 668.990112 981.651367 596.050903 981.651367 504.680725 C 981.651367 413.341919 810.381531 338.251831 587.155945 321.194458 C 654.000061 355.615173 706.421997 424.317322 706.421997 504.680725 C 706.421997 585.137329 654.12677 653.787903 587.155945 688.166931 Z" />
                </g>
                <text id="Imagine" visibility="hidden" xml:space="preserve">
                  <tspan x="-689.940901" y="1626" font-family="Archivo SemiExpanded" font-size="574.105609"
                    font-weight="700" fill="#3662e3" letter-spacing="-11.316707" xml:space="preserve">Imagine</tspan>
                  <tspan x="-193.74825" y="2126" font-family="Archivo SemiExpanded" font-size="574.105609"
                    font-weight="700" fill="#3662e3" letter-spacing="-11.316707" xml:space="preserve">Shirt</tspan>
                </text>
              </g>
            </svg>
            <p class="max-w-xs mt-4 dark:text-gray-100 text-gray-700">
              Dream it, design it, wear it
            </p>

            <ul class="flex gap-6 mt-8">
              <li>
                <a href="https://www.facebook.com" rel="noreferrer" target="_blank"
                  class="dark:text-gray-400 text-gray-700 transition hover:opacity-75">
                  <span class="sr-only">Facebook</span>

                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd"
                      d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                      clip-rule="evenodd" />
                  </svg>
                </a>
              </li>

              <li>
                <a href="https://www.instagram.com" rel="noreferrer" target="_blank"
                  class="dark:text-gray-400 text-gray-700 transition hover:opacity-75">
                  <span class="sr-only">Instagram</span>

                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd"
                      d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                      clip-rule="evenodd" />
                  </svg>
                </a>
              </li>

              <li>
                <a href="https://www.twitter.com" rel="noreferrer" target="_blank"
                  class="dark:text-gray-400 text-gray-700 transition hover:opacity-75">
                  <span class="sr-only">Twitter</span>

                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path
                      d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                  </svg>
                </a>
              </li>
            </ul>

            <div class="mt-8 text-center">
              <p class="text-sm text-gray-600 dark:text-gray-400">
                &copy; 2025. All rights reserved.
              </p>
              
              <button data-popover-target="credits-popover" type="button" 
                class="mt-2 text-xs font-medium text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 transition">
                View Credits
              </button>

              <div data-popover id="credits-popover" role="tooltip" 
                class="absolute z-10 invisible inline-block w-72 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                <div class="p-3">
                  <!-- Header -->
                  <div class="flex items-center justify-center pb-3 border-b border-gray-200 dark:border-gray-600">
                    <p class="font-semibold text-gray-800 dark:text-gray-200 flex items-center">
                      <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                      </svg>
                      Project Credits
                    </p>
                  </div>

                  <!-- Original Project Section -->
                  <div class="py-2 text-center">
                    <div class="flex items-center justify-center text-gray-700 dark:text-gray-300 mb-2">
                      <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                      </svg>
                      <span class="font-medium">Original Project</span>
                    </div>
                    <div class="space-y-1">
                      <p>João Franco</p>
                      <p>Miguel Gameiro</p>
                      <p>Pedro Vicente</p>
                    </div>
                  </div>

                  <!-- Cybersecurity Section -->
                  <div class="py-2 border-t border-gray-200 dark:border-gray-600 text-center">
                    <div class="flex items-center justify-center text-gray-700 dark:text-gray-300 mb-2">
                      <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                      </svg>
                      <span class="font-medium">Cybersecurity Project</span>
                    </div>
                    <div class="space-y-1">
                      <p>Francisco Marques</p>
                      <p>João Franco</p>
                      <p>Miguel Susano</p>
                    </div>
                  </div>
                <div data-popper-arrow></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</body>

</html>
