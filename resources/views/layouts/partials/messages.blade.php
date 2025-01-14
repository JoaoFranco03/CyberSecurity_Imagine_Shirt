@if (isset($errors) && count($errors) > 0)
    <div class="flex fixed top-5 right-5 z-20 items-center w-full max-w-xs p-4 mb-4 text-red-800 bg-red-50 rounded-lg shadow dark:text-red-200 dark:bg-red-950 transition"
        role="alert" id="error-container">
        <div
            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg dark:bg-red-950 dark:text-red-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="sr-only">Error icon</span>
        </div>
        @foreach ($errors->all() as $error)
            <div class="ml-3 text-sm font-normal">{{ $error }}</div>
        @endforeach
        <div class="ml-auto pl-3">
            <div class="-mx-1.5 -my-1.5">
                <button type="button" onclick="hideErrorContainer()"
                    class="inline-flex rounded-md dark:bg-red-950 p-1.5 text-red-500 hover:bg-red-100 dark:hover:bg-red-900 transition focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">
                    <span class="sr-only">Dismiss</span>
                    <!-- Heroicon name: mini/x-mark -->
                    <div class="text-red-900 dark:text-red-200">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path
                                d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </div>
@endif

<script>
  function hideErrorContainer() {
      var container = document.getElementById("error-container");
      container.classList.toggle("invisible");
  }
</script>
