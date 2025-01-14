@extends('../Template.store_navbar')


@section('content')

<main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 mt-5">
    <div class="text-black dark:text-white">
        <div>
            <main>
                <div class="flex items-center justify-between border-b border-gray-200 dark:border-gray-700 pb-6 pt-12">
                    <h1 class="text-4xl font-bold tracking-tight">Select a Print:</h1>
                    <div class="flex items-center">
                        <div class="relative flex items-center justify-center">
                            <p class="justify-center text-sm font-medium me-2 text-gray-700 dark:text-gray-100">
                                Sort by:
                            </p>
                            <select form="form-category" onchange="this.form.submit();" id="sort" name="sort"
                                class="dark:bg-gray-800 mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                                <option @if($sort_method=='Alphabetical' ) selected @endif>Alphabetical</option>
                                <option @if($sort_method=='Newest' ) selected @endif>Newest</option>
                                <option @if($sort_method=='Popularity' ) selected @endif>Popularity</option>
                            </select>
                        </div>
                        <!-- <button type="button" class="-m-2 ml-5 p-2 text-gray-400 hover:text-gray-500 sm:ml-7">
                                    <span class="sr-only">View grid</span>
                                    <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd"
                                        d="M4.25 2A2.25 2.25 0 002 4.25v2.5A2.25 2.25 0 004.25 9h2.5A2.25 2.25 0 009 6.75v-2.5A2.25 2.25 0 006.75 2h-2.5zm0 9A2.25 2.25 0 002 13.25v2.5A2.25 2.25 0 004.25 18h2.5A2.25 2.25 0 009 15.75v-2.5A2.25 2.25 0 006.75 11h-2.5zm9-9A2.25 2.25 0 0011 4.25v2.5A2.25 2.25 0 0013.25 9h2.5A2.25 2.25 0 0018 6.75v-2.5A2.25 2.25 0 0015.75 2h-2.5zm0 9A2.25 2.25 0 0011 13.25v2.5A2.25 2.25 0 0013.25 18h2.5A2.25 2.25 0 0018 15.75v-2.5A2.25 2.25 0 0015.75 11h-2.5z"
                                        clip-rule="evenodd" />
                                    </svg>
                                  </button> -->
                    </div>
                </div>

                <section aria-labelledby="products-heading" class="pb-24 pt-6">
                    <h2 id="products-heading" class="sr-only">Products</h2>

                    <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                        <!-- Filters -->
                        <form class="hidden"></form>
                        <!-- Warning!!! do not remove the empty form or the form-category (form bellow) will not be recognized by DOM, so the js event listeners wont work!!! -->
                        <form id="form-category" class="block" method="GET"
                            action="{{route('products.index')}}">
                            <a href="/create_your_own_tshirt" class="group">
                                <div
                                    class="bg-gradient-to-tl from-blue-300/90 via-blue-400/90 to-blue-700/90 dark:group-hover:bg-blue-900 group-hover:from-blue-300 group-hover:via-blue-400 group-hover:to-blue-700 transition duration-500 mb-4 rounded-md p-2 h-32 flex items-center">
                                    <img src="img/add_your_design.png"
                                        class="h-full aspect-1 object-cover object-center transition duration-500 ease-in-out">
                                    <div class="ml-2">
                                        <p class="font-semibold text-white">Use Your <br> Own Print</p>
                                        <p class="mt-1 text-xs font-medium text-gray-100">Just for 15.00€</p>
                                    </div>
                                </div>
                            </a>
                            <div class="pb-6 border-b mb-4 border-gray-300 dark:border-gray-700">
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <!-- Heroicon name: mini/magnifying-glass -->
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input id="search" form="form-category" onchange="this.form.submit();" name="search"
                                        class="block w-full dark:bg-gray-800 rounded-md border border-gray-300 dark:border-gray-700 py-2 pl-10 pr-3 leading-5 placeholder-gray-500 dark:placeholder-gray-400 focus:border-blue-500 focus:placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm"
                                        placeholder="Search a Product" value="{{$search_filter}}" type="search">
                                </div>
                            </div>
                            <div x-data="{open:false}" class="border-b border-gray-200 dark:border-gray-700 pt-2 pb-6">
                                <h3 class="-my-3 flow-root">
                                    <!-- Expand/collapse section button -->
                                    <button type="button" @click="open=!open"
                                        class="flex w-full items-center justify-between py-3 text-sm text-gray-400 hover:text-gray-500"
                                        aria-controls="filter-section-1" aria-expanded="false">
                                        <span class="font-medium text-gray-900 dark:text-white">Category</span>
                                        <span class="ml-6 flex items-center">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <!-- <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                          d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                                                          clip-rule="evenodd" />
                                                      </svg> -->
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div x-show="open" x-transition.opacity.duration.500ms class="pt-6"
                                    id="filter-section-1">
                                    @foreach($categories as $category)
                                    <div class="space-y-4">
                                        <div class="flex items-center mb-2">
                                            <input id="{{$category->name}}" name='category[]' value='{{$category->id}}'
                                                type="checkbox" @if(in_array($category->id, $select_categories)) checked  @endif
                                            class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500
                                            transition duration-250
                                            ease-in-out" onclick="document.querySelector('#form-category').submit()">

                                            <label for="{{$category->name}}"
                                                class="ml-3 text-sm dark:text-gray-200 text-black">{{$category->name}}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>


                            <div x-data="{open:false}" class="border-b border-gray-200 dark:border-gray-700 py-6">
                                <h3 class="-my-3 flow-root">
                                    <!-- Expand/collapse section button -->
                                    <button type="button" @click="open=!open"
                                        class="flex w-full items-center justify-between py-3 text-sm text-gray-400 hover:text-gray-500"
                                        aria-controls="filter-section-1" aria-expanded="false">
                                        <span class="font-medium text-gray-900 dark:text-white">Color</span>
                                        <span class="ml-6 flex items-center">
                                            <!-- Expand icon, show/hide based on section open state. -->
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                            </svg>
                                            <!-- Collapse icon, show/hide based on section open state. -->
                                            <!-- <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                          d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                                                          clip-rule="evenodd" />
                                                      </svg> -->
                                        </span>
                                    </button>
                                </h3>
                                <!-- Filter section, show/hide based on section state. -->
                                <div x-show="open" x-transition.opacity.duration.500ms class="pt-6"
                                    id="filter-section-1">
                                    @foreach($colors as $color)
                                    <div class="space-y-4">
                                        <div class="flex items-center mb-2">
                                            <input id="{{$color->name}}" name='color' value='{{$color->code}}'
                                                type="radio"
                                                class="h-4 w-4 rounded-full border-gray-300 text-blue-600 focus:ring-blue-500 transition duration-250 ease-in-out"
                                                onclick="this.form.submit()">
                                            <label for="{{$color->name}}"
                                                class="w-4 h-4 ml-3 rounded-full border border-gray-100 dark:border-gray-500"
                                                style="background-color:#{{$color->code}}"></label>
                                            <label for="{{$color->name}}"
                                                class="ml-3 text-sm dark:text-gray-200 text-black">{{$color->name}}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </form>

                        <!-- Product grid -->
                        <div class="lg:col-span-3">
                            <div>
                                <div
                                    class="grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 xl:gap-x-8">
                                    @foreach ($products as $product)
                                    <!--TODO change the way how the route is done-->
                                    <a href="{{  route('products.show', ['product' => $product]) }}?color_choice={{$current_color->code}}"
                                        class="group">
                                        <div
                                            class="w-full overflow-hidden rounded-lg bg-white border aspect-h-8 aspect-w-7">
                                            <div
                                                class="group w-full bg-white overflow-hidden transition group-hover:opacity-90 animate-fade-in duration-500 transform scale-100 group-hover:scale-110">
                                                <div class="tshirt_img h-full w-full object-scale-down object-center relative" style="background-color: #{{$current_color->code}}">
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
                                        <p class="mt-1 text-sm text-gray-500">{{$prices->unit_price_catalog}}
                                            €</p>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="pt-14 mx-auto">
                                {{ $products->withQueryString()->links('pagination::tailwind') }}
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</main>
<script>
    function submit() {
        document.getElementById("form-category").submit();
    }

    window.addEventListener('DOMContentLoaded', function () {
        var radioButtons = document.querySelectorAll('input[type="radio"]');

        radioButtons.forEach(function (radioButton) {
            radioButton.addEventListener("click", submit);
            if (radioButton.value == "{{$color->code}}") {
                radioButton.checked = true;
            }
        });

        document.getElementById("{{$current_color->name}}").checked = true;
    });

</script>

@endsection
