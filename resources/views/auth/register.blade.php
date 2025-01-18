<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  @vite('resources/css/app.css')
  <script defer src=" https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js">
  </script>
</head>

<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
  @include('layouts.partials.messages')
  <div class="flex h-screen">
    <div class="flex flex-1 flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
      <a href="{{route('home')}}" class="mb-8 hidden text-sm font-semibold text-blue-600 hover:text-blue-500 sm:block">
        <span aria-hidden="true"> &larr;</span> Go Back to Store
      </a>
      <div class="mx-auto w-full max-w-sm lg:w-96">
        <div>
          <div>
            <svg class="h-8 w-auto fill-blue-600 hover:fill-blue-700 transition ease-in-out duration-500" width="1000"
              height="1000" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg"
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
                    font-weight="700" fill="#3662e3" letter-spacing="-11.316707" xml:space="preserve">Imagine</tspan>
                  <tspan x="-193.74825" y="2126" font-family="Archivo SemiExpanded" font-size="574.105609"
                    font-weight="700" fill="#3662e3" letter-spacing="-11.316707" xml:space="preserve">Shirt</tspan>
                </text>
              </g>
            </svg>
            <h2 class="mt-6 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Create an Account</h2>
          </div>

          <div class="mt-8">
            <div class="mt-6">
              <form action="{{route('register')}}" method="POST" class="space-y-6">
                @csrf
                <div>
                  <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Name')
                    }}</label>
                  <div class="mt-1">
                    <input id="name" type="text" name="name" autocomplete="name" value="{{ old('name') }}" required
                      class="@error('name') is-invalid @enderror block w-full dark:text-gray-100 appearance-none rounded-md border dark:bg-gray-900 border-gray-300 dark:border-gray-600 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                  </div>
                </div>
                <div>
                  <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Email
                    Address') }}</label>
                  <div class="mt-1">
                    <input id="email" value="{{ old('email') }}" name="email" type="email" autocomplete="email" required
                      class="@error('email') is-invalid @enderror block w-full dark:text-gray-100 appearance-none rounded-md border dark:bg-gray-900 border-gray-300 dark:border-gray-600 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                  </div>
                </div>

                <div class="space-y-1">
                  <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">{{
                    __('Password') }}</label>
                  <div class="mt-1">
                    <input id="password" name="password" type="password" autocomplete="new-password"
                      value="{{ old('password') }}" required onkeyup="checkPassword(this.value)"
                      class="@error('password') is-invalid @enderror block w-full dark:text-gray-100 appearance-none rounded-md border dark:bg-gray-900 border-gray-300 dark:border-gray-600 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                  </div>
                  <div class="mt-2 space-y-1">
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Password must contain:</p>
                    <ul class="text-xs text-gray-500 dark:text-gray-400 space-y-1 list-inside">
                      <li class="flex items-center" id="length-check">
                        <svg class="w-4 h-4 mr-1.5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        At least 8 characters
                      </li>
                      <li class="flex items-center" id="lowercase-check">
                        <svg class="w-4 h-4 mr-1.5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        One lowercase letter
                      </li>
                      <li class="flex items-center" id="uppercase-check">
                        <svg class="w-4 h-4 mr-1.5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        One uppercase letter
                      </li>
                      <li class="flex items-center" id="number-check">
                        <svg class="w-4 h-4 mr-1.5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        One number
                      </li>
                      <li class="flex items-center" id="special-check">
                        <svg class="w-4 h-4 mr-1.5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        One special character
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="space-y-1">
                  <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">{{
                    __('Confirm Password') }}</label>
                  <div class="mt-1">
                    <input id="password_confirmation" name="password_confirmation" type="password"
                      autocomplete="new-password" value="{{ old('password') }}" required
                      class="@error('password') is-invalid @enderror block w-full dark:text-gray-100 appearance-none rounded-md border dark:bg-gray-900 border-gray-300 dark:border-gray-600 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                  </div>
                </div>
                <div>
                  <button type="submit"
                    class="flex text-center items-center w-full justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">{{
                    __('Create an Account') }}</button>
                  <a href="{{route('login')}}"
                    class="mt-2 flex text-center items-center w-full justify-center text-sm text-gray-500 hover:text-blue-500">Already
                    have an Account? Sign in</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="relative hidden w-0 flex-1 lg:block">
      <img class="absolute inset-0 h-full w-full object-cover" src="/img/store2.jpg" alt="Store">
    </div>
</body>
<script>
function checkPassword(password) {
  // Check length
  const lengthCheck = document.querySelector('#length-check svg');
  if(password.length >= 8) {
    lengthCheck.classList.replace('text-gray-300', 'text-green-500');
  } else {
    lengthCheck.classList.replace('text-green-500', 'text-gray-300');
  }

  // Check lowercase
  const lowercaseCheck = document.querySelector('#lowercase-check svg');
  if(/[a-z]/.test(password)) {
    lowercaseCheck.classList.replace('text-gray-300', 'text-green-500');
  } else {
    lowercaseCheck.classList.replace('text-green-500', 'text-gray-300');
  }

  // Check uppercase
  const uppercaseCheck = document.querySelector('#uppercase-check svg');
  if(/[A-Z]/.test(password)) {
    uppercaseCheck.classList.replace('text-gray-300', 'text-green-500');
  } else {
    uppercaseCheck.classList.replace('text-green-500', 'text-gray-300');
  }

  // Check numbers
  const numberCheck = document.querySelector('#number-check svg');
  if(/[0-9]/.test(password)) {
    numberCheck.classList.replace('text-gray-300', 'text-green-500');
  } else {
    numberCheck.classList.replace('text-green-500', 'text-gray-300');
  }

  // Check special characters
  const specialCheck = document.querySelector('#special-check svg');
  if(/[@$!%*?&#]/.test(password)) {
    specialCheck.classList.replace('text-gray-300', 'text-green-500');
  } else {
    specialCheck.classList.replace('text-green-500', 'text-gray-300');
  }
}
</script>
</html>
