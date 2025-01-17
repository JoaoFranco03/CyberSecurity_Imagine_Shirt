@extends('../template.store_navbar')

@section('content')
    <main>
        <div class="flex flex-col h-screen bg-white dark:bg-gray-900">
            <img
                src="https://images.unsplash.com/photo-1489987707025-afc232f7ea0f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2940&q=80"
                alt="" class="object-cover w-full h-64" />

            <div class="flex items-center justify-center flex-1">
                <div class="max-w-xl px-4 py-8 mx-auto text-center">
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-50 sm:text-4xl">
                        We can't find that page.
                    </h1>

                    <p class="mt-4 text-gray-500">
                        Try searching again, or return home to start from the beginning.
                    </p>

                    <a href="{{route('home')}}}"
                       class="inline-block px-5 py-3 mt-6 text-sm font-medium text-white bg-blue-600 rounded transition duration-300 ease-in-out hover:bg-blue-700  hover:-translate-y-0.5 hover:scale-105 hover:shadow-lg hover:shadow-blue-800/50 ">
                        Go Back Home
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
