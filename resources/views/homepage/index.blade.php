@extends('../Template.store_navbar')

@section('content')
@include('layouts.partials.messages')
<main class="overflow-x-hidden">
    <!-- Hero section -->
    <div class="pt-16 pb-80 sm:pt-24 sm:pb-40 lg:pt-40 lg:pb-48">
        <div class="relative mx-auto max-w-7xl px-4 sm:static sm:px-6 lg:px-8">
            <div class="sm:max-w-lg">
                <h1 class="font text-4xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-6xl">Summer
                    styles are finally here</h1>
                <p class="mt-4 text-xl text-gray-500 dark:text-gray-400">This year, our new summer collection is all
                    about embracing vibrant colors, effortless styles, and sustainable fashion.</p>
            </div>
            <div>
                <div class="mt-10">
                    <!-- Decorative image grid -->
                    <div aria-hidden="true"
                        class="pointer-events-none lg:absolute lg:inset-y-0 lg:mx-auto lg:w-full lg:max-w-7xl">
                        <div
                            class="absolute sm:left-1/2 sm:top-0 sm:translate-x-8 lg:left-1/2 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-8">
                            <div class="flex items-center space-x-6 lg:space-x-8">
                                <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                    <div class="h-64 w-44 overflow-hidden rounded-lg sm:opacity-0 lg:opacity-100">
                                        <img src="{{asset('img/mockups/0f391aee013.png')}}" alt=""
                                            class="h-full w-full object-cover object-center">
                                    </div>
                                    <div class="h-64 w-44 overflow-hidden rounded-lg">
                                        <img src="{{asset('img/mockups/bPpcZZtYvR7.png')}}" alt=""
                                            class="h-full w-full object-cover object-center">
                                    </div>
                                </div>
                                <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                    <div class="h-64 w-44 overflow-hidden rounded-lg">
                                        <img src="{{asset('img/mockups/JJtJzSwEti9.png')}}" alt=""
                                            class="h-full w-full object-cover object-center">
                                    </div>
                                    <div class="h-64 w-44 overflow-hidden rounded-lg">
                                        <img src="{{asset('img/mockups/Ix5g9WUmBvP.png')}}" alt=""
                                            class="h-full w-full object-cover object-center">
                                    </div>
                                    <div class="h-64 w-44 overflow-hidden rounded-lg">
                                        <img src="{{asset('img/mockups/SnBXckcy1oG.png')}}" alt=""
                                            class="h-full w-full object-cover object-center">
                                    </div>
                                </div>
                                <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                    <div class="h-64 w-44 overflow-hidden rounded-lg">
                                        <img src="{{asset('img/mockups/IUoeQnQJWxF.png')}}" alt=""
                                            class="h-full w-full object-cover object-center">
                                    </div>
                                    <div class="h-64 w-44 overflow-hidden rounded-lg">
                                        <img src="{{asset('img/mockups/FRHrHEH9f14.png')}}" alt=""
                                            class="h-full w-full object-cover object-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ url('/products') }}"
                        class="inline-block rounded-lg border border-transparent hover:shadow-lg hover:shadow-blue-600/50 bg-blue-600 py-3 px-8 text-center font-medium text-white hover:bg-blue-700 transition duration-300">Shop
                        Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Category section -->
    <section aria-labelledby="category-heading" class="bg-gray-50 dark:bg-gray-800 relative">
        <div class="mx-auto max-w-7xl py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-baseline sm:justify-between">
                <h2 id="category-heading" class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    Shop</h2>
                <a href="{{ url('/products') }}"
                    class="hidden text-sm font-semibold text-blue-600 hover:text-blue-500 dark:text-blue-200 hover:dark:text-blue-300 sm:block transition">
                    Browse all categories
                    <span aria-hidden="true"> &rarr;</span>
                </a>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:grid-rows-2 sm:gap-x-6 lg:gap-8">
                <div
                    class="group aspect-w-2 aspect-h-1 overflow-hidden rounded-lg sm:aspect-h-1 sm:aspect-w-1 sm:row-span-2">
                    <img src="{{asset('img/mockups/IUoeQnQJWxF.png')}}"
                        class="object-cover object-center transition group-hover:opacity-75 sm:absolute sm:inset-0 sm:h-full sm:w-full animate-fade-in duration-500 transform scale-100 group-hover:scale-110"">
                        <div aria-hidden=" true" class="bg-gradient-to-b from-transparent to-black opacity-50">
                </div>
                <div class="flex items-end p-6">
                    <div>
                        <h3 class="font-semibold text-white">
                            <a href="{{route("products.index")}}">
                                <span class="absolute inset-0"></span>
                                New Arrivals
                            </a>
                        </h3>
                        <p aria-hidden="true" class="mt-1 text-sm text-white">Shop now</p>
                    </div>
                </div>
            </div>
            <div
                class="group aspect-w-2 aspect-h-1 overflow-hidden rounded-lg sm:aspect-h-1 sm:aspect-w-1 sm:row-span-2">
                <img src="{{asset('img/mockups/B1Mn9xDOMzp.png')}}"
                    class="object-cover object-center transition group-hover:opacity-75 sm:absolute sm:inset-0 sm:h-full sm:w-full animate-fade-in duration-500 transform scale-100 group-hover:scale-110"">
                        <div aria-hidden=" true"
                    class="bg-gradient-to-b from-transparent to-black opacity-50 sm:absolute sm:inset-0">
            </div>
            <div class="flex items-end p-6 sm:absolute sm:inset-0">
                <div>
                    <h3 class="font-semibold text-white">
                        <a href="{{route("products.index")}}?sort=Popularity&search=&color=fafafa">
                            <span class="absolute inset-0"></span>
                            Best Sellers
                        </a>
                    </h3>
                    <p aria-hidden="true" class="mt-1 text-sm text-white">Shop now</p>
                </div>
            </div>
        </div>
        </div>

        <div class="mt-6 sm:hidden">
            <a href="{{ url('/products') }}"
                class="hidden text-sm font-semibold text-blue-600 hover:text-blue-500 dark:text-blue-200 hover:dark:text-blue-300 sm:block transition">
                Browse all categories
                <span aria-hidden="true"> &rarr;</span>
            </a>
        </div>
        </div>
    </section>
    <!-- Favorites section -->
    <section aria-labelledby="favorites-heading">
        <div class="mx-auto max-w-7xl py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-baseline sm:justify-between">
                <h2 id="favorites-heading" class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    Our Favorites</h2>
                <a href="{{ url('/products') }}"
                    class="hidden text-sm font-semibold text-blue-600 hover:text-blue-500 dark:text-blue-200 hover:dark:text-blue-300 sm:block transition">
                    Browse all favorites
                </a>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-y-10 sm:grid-cols-3 sm:gap-y-0 sm:gap-x-6 lg:gap-x-8">
                @foreach($products as $product)
                <a href="{{  route('products.show', ['product' => $product]) }}"
                    class="group">
                    <div
                        class="w-full overflow-hidden rounded-lg bg-white border aspect-h-8 aspect-w-7">
                        <div
                            class="group w-full bg-white overflow-hidden transition group-hover:opacity-90 animate-fade-in duration-500 transform scale-100 group-hover:scale-110">
                            <div class="tshirt_img h-full w-full object-scale-down object-center relative">
                                <img src="/img/transparent_tshirt.png" alt="Model wearing women's black cotton crewneck tee." class="h-full w-full object-fit object-center">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-3/6 h-4/6">
                                        <img src="{{asset('storage/tshirt_images/' . $product->image_url)}}" class="h-full w-full object-contain">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="mt-4 text-sm text-gray-700 dark:text-gray-100">{{$product->name}}
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">{{$price}}
                        €</p>
                </a>
                @endforeach
            </div>

            <div class="mt-6 sm:hidden">
                <a href="{{ url('/products') }}"
                    class="hidden text-sm font-semibold text-blue-600 hover:text-blue-500 dark:text-blue-200 hover:dark:text-blue-300 sm:block transition">
                    Browse all favorites
                    <span aria-hidden="true"> &rarr;</span>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA section -->
    <section aria-labelledby="sale-heading">
        <div class="overflow-hidden pt-32 sm:pt-14">
            <div class="bg-gray-800">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="relative pt-48 pb-16 sm:pb-24">
                        <div>
                            <h2 id="sale-heading" class="text-4xl font-bold tracking-tight text-white md:text-5xl">
                                Final Stock.
                                <br>
                                Up to 50% off.
                            </h2>
                            <div class="mt-6 text-base">
                                <a href="{{ url('/products') }}"
                                    class="font-semibold text-white hover:text-gray-300 transition">
                                    Shop the sale
                                    <span aria-hidden="true"> &rarr;</span>
                                </a>
                            </div>
                        </div>

                        <div class="absolute -top-32 left-1/2 -translate-x-1/2 transform sm:top-6 sm:translate-x-0">
                            <div class="ml-24 flex min-w-max space-x-6 sm:ml-3 lg:space-x-8">
                                <div class="flex space-x-6 sm:flex-col sm:space-x-0 sm:space-y-6 lg:space-y-8">
                                    <div class="flex-shrink-0">
                                        <img class="h-64 w-64 rounded-lg object-cover md:h-72 md:w-72"
                                            src="{{asset('img/mockups/0f391aee013.png')}}"
                                            alt="">
                                    </div>

                                    <div class=" mt-6 flex-shrink-0 sm:mt-0">
                                        <img class="h-64 w-64 rounded-lg object-cover md:h-72 md:w-72"
                                            src="{{asset('img/mockups/bPpcZZtYvR7.png')}}"
                                            alt="">
                                    </div>
                                </div>
                                <div
                                    class="flex space-x-6 sm:-mt-20 sm:flex-col sm:space-x-0 sm:space-y-6 lg:space-y-8">
                                    <div class="flex-shrink-0">
                                        <img class="h-64 w-64 rounded-lg object-cover md:h-72 md:w-72"
                                            src="{{asset('img/mockups/JJtJzSwEti9.png')}}"
                                            alt="">
                                    </div>

                                    <div class="mt-6 flex-shrink-0 sm:mt-0">
                                        <img class="h-64 w-64 rounded-lg object-cover md:h-72 md:w-72"
                                            src="{{asset('img/mockups/Ix5g9WUmBvP.png')}}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="flex space-x-6 sm:flex-col sm:space-x-0 sm:space-y-6 lg:space-y-8">
                                    <div class="flex-shrink-0">
                                        <img class="h-64 w-64 rounded-lg object-cover md:h-72 md:w-72"
                                            src="{{asset('img/mockups/SnBXckcy1oG.png')}}"
                                            alt="">
                                    </div>

                                    <div class="mt-6 flex-shrink-0 sm:mt-0">
                                        <img class="h-64 w-64 rounded-lg object-cover md:h-72 md:w-72"
                                            src="{{asset('img/mockups/IUoeQnQJWxF.png')}}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection