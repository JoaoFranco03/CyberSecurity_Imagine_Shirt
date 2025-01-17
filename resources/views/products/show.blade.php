@extends('../template.store_navbar')
@section('content')
    <main>
        <!-- Product -->
        <div>
            <div
                class="mx-auto max-w-2xl px-4 pt-16 pb-10 sm:px-6 sm:pt-24 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8 w-full">
                <!-- Product details -->
                <div class="lg:max-w-lg lg:self-end">
                    <nav aria-label="Breadcrumb">
                        <ol role="list" class="flex items-center space-x-2">
                            <li>
                                <div class="flex items-center text-sm">
                                    <a href="/"
                                       class="font-medium text-gray-500 hover:text-gray-900 dark:hover:text-gray-100 transition ease-in-out duration-z0">Home</a>

                                    <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                         aria-hidden="true" class="ml-2 h-5 w-5 flex-shrink-0 text-gray-300">
                                        <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z"/>
                                    </svg>
                                </div>
                            </li>

                            <li>
                                <div class="flex items-center text-sm">
                                    <a href="{{route('products.index')}}"
                                       class="font-medium text-gray-500 hover:text-gray-900 dark:hover:text-gray-100 transition ease-in-out duration-200">All
                                        T-Shirts</a>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    <div class="mt-4">
                        <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                            {{$product->name}}</h1>
                    </div>

                    <section aria-labelledby="information-heading" class="mt-4">
                        <h2 id="information-heading" class="sr-only">Product information</h2>

                        <div class="flex items-center">
                            <p class="text-lg text-gray-900 sm:text-xl dark:text-white">{{$price}} €</p>
                        </div>

                        <div class="mt-4 space-y-6">
                            <p class="text-base text-gray-500 dark:text-gray-400">{{$product->description}} <br>
                                {{$product->extra_info}}</p>
                        </div>

                        <div class="mt-6 flex items-center">
                            <!-- Heroicon name: mini/check -->
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <p class="ml-2 text-sm text-gray-500 dark:text-gray-400">In stock and ready to ship</p>
                        </div>
                    </section>
                </div>

                <!-- Product image -->
                <div class="mt-10 lg:col-start-2 lg:row-span-2 lg:mt-0 lg:self-center">
                    <div id="tshirt_div"
                         class="rounded-lg tshirt_img h-full w-full object-scale-down object-center relative"
                         style="background-color: #{{$color}}">
                        <img src="/img/transparent_tshirt.png" alt="Model wearing women's black cotton crewneck tee."
                             class="rounded-lg h-full w-full object-fit object-center">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-3/6 h-4/6">
                                <img src="{{asset('storage/tshirt_images/' . $product->image_url)}}"
                                     class="h-full w-full object-contain">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product form -->
                <div class="mt-10 lg:col-start-1 lg:row-start-2 lg:max-w-lg lg:self-start">
                    <section aria-labelledby="options-heading">
                        <h2 id="options-heading" class="sr-only">Product options</h2>
                        <form hidden></form>
                        <form method="POST" action="{{ route('cart.add', ['t_shirt' => $product]) }}">
                            @csrf
                            <div class=" sm:flex sm:justify-between pb-5">
                                <!-- Color selector -->
                                <fieldset>
                                    <legend class="block text-sm font-medium text-gray-700 dark:text-gray-400">Color:
                                    </legend>
                                    <ul class="mt-1 grid grid-cols-7 gap-4 sm:grid-cols-10">
                                        @foreach($colors as $tshirt_color)
                                            <li>
                                                <input type="radio" id="{{$tshirt_color->code}}" name="color"
                                                       value="{{$tshirt_color->code}}" class="hidden peer"
                                                       onclick="changeBackgroundColor(this)">
                                                <label for="{{$tshirt_color->code}}"
                                                       style="background-color:#{{$tshirt_color->code}}"
                                                       class="inline-flex items-center justify-center w-full p-4 text-gray-500 bg-white border-2
                                              border-gray-200 rounded-full cursor-pointer dark:hover:text-gray-300 dark:border-gray-700
                                              dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600
                                              hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @error('color')
                                    <div class="text-red-600 mt-1 text-md font-bold">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="sm:flex sm:justify-between">
                                <!-- Size selector -->
                                <fieldset class="w-full">
                                    <legend class="block text-sm font-medium text-gray-700 dark:text-gray-400">Size:
                                    </legend>
                                    <ul class="mt-1 grid grid-cols-5 gap-4 sm:grid-cols-5">
                                        <li>
                                            <input type="radio" id="xs" name="size" value="XS" class="hidden peer">
                                            <label for="xs"
                                                   class="inline-flex items-center justify-center w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="block">
                                                    <p id="size-choice-0-label"
                                                       class="text-base font-medium text-gray-900 dark:text-gray-200">XS
                                                    </p>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="s" name="size" value="S" class="hidden peer">
                                            <label for="s"
                                                   class="inline-flex items-center justify-center w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="block">
                                                    <p id="size-choice-0-label"
                                                       class="text-base font-medium text-gray-900 dark:text-gray-200">S
                                                    </p>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="m" name="size" value="M" class="hidden peer">
                                            <label for="m"
                                                   class="inline-flex items-center justify-center w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="block">
                                                    <p id="size-choice-0-label"
                                                       class="text-base font-medium text-gray-900 dark:text-gray-200">M
                                                    </p>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="l" name="size" value="L" class="hidden peer">
                                            <label for="l"
                                                   class="inline-flex items-center justify-center w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="block">
                                                    <p id="size-choice-0-label"
                                                       class="text-base font-medium text-gray-900 dark:text-gray-200">L
                                                    </p>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="xl" name="size" value="XL" class="hidden peer">
                                            <label for="xl"
                                                   class="inline-flex items-center justify-center w-full p-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="block">
                                                    <p id="size-choice-0-label"
                                                       class="text-base font-medium text-gray-900 dark:text-gray-200">XL
                                                    </p>
                                                </div>
                                            </label>
                                        </li>
                                    </ul>
                                    @error('size')
                                    <div class="text-red-600 mt-1 text-md font-bold">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="sm:flex sm:justify-between w-full mt-5">
                                <!-- Size selector -->
                                <fieldset class="w-full">
                                    <legend class="block text-sm font-medium text-gray-700 dark:text-gray-400">Quantity:
                                    </legend>
                                    <input type="number"
                                           class="mt-1 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           id="qty" name="qty" value="1" min="1">
                                </fieldset>
                            </div>
                            <div class="mt-10">
                                <button type="submit" name="addToCart"
                                        class="flex w-full items-center justify-center transition rounded-md border border-transparent bg-blue-600 py-3 px-8 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-50">
                                    Add
                                    to bag
                                </button>
                                <div class="mt-6 text-center">
                                    <div class="group inline-flex text-base font-medium">
                                        <!-- Heroicon name: outline/shield-check -->
                                        <svg class="mr-2 h-6 w-6 flex-shrink-0 text-gray-400"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                                        </svg>
                                        <span class="text-gray-500 ">Lifetime Guarantee</span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>


        <div class="mx-auto mt-8 max-w-2xl px-4 pb-16 sm:px-6 sm:pb-24 lg:max-w-7xl lg:px-8">
            <hr class="h-px my-8 border-gray-200 dark:border-gray-800">
            <!-- Related products -->
            <section aria-labelledby="related-heading">
                <h2 id="related-heading" class="text-lg font-medium text-gray-900 dark:text-gray-200">Customers also
                    purchased:
                </h2>
                <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    @foreach ($suggestions as $suggestion)
                        <div class="group relative">
                            <a href="{{  route('products.show', ['product' => $suggestion]) }}">
                                <div class="w-full overflow-hidden rounded-lg bg-white border aspect-h-8 aspect-w-7">
                                    <div
                                        class="group aspect-w-2 aspect-h-1 overflow-hidden transition group-hover:opacity-90 animate-fade-in duration-500 transform scale-100 group-hover:scale-110">
                                        <img src="/img/transparent_tshirt.png"
                                             alt="Model wearing women's black cotton crewneck tee."
                                             class="rounded-lg h-full w-full object-fit object-center">
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <div class="w-3/6 h-4/6">
                                                <img src="{{asset('storage/tshirt_images/' . $suggestion->image_url)}}"
                                                     class="h-full w-full object-contain">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="mt-4 text-sm text-gray-700 dark:text-gray-100">{{$suggestion->name}}</h3>
                                <p class="mt-1 text-sm text-gray-500">{{ $price }} €</p>
                            </a>
                        </div>
                    @endforeach
                </div>
        </div>
        </section>
        </div>

        </div>
        <script>
            // Get all radio buttons with the name "size-choice"
            const radioButtons = document.querySelectorAll('input[name="size-choice"]');

            // Add an event listener to each radio button
            radioButtons.forEach(function (radioButton) {
                radioButton.addEventListener('change', function () {
                    // Get the parent div of the radio button
                    const parentDiv = this.parentElement;

                    // Check if the radio button is checked
                    if (this.checked) {
                        // Add the class to the div
                        parentDiv.querySelector('div.pointer-events-none').classList.add('absolute', '-inset-px', 'rounded-full', 'border-2', 'border-blue-500');
                    } else {
                        // Remove the class from the div
                        parentDiv.querySelector('div.pointer-events-none').classList.remove('absolute', '-inset-px', 'rounded-full', 'border-2', 'border-blue-500');
                    }
                });
            });

            window.addEventListener('DOMContentLoaded', function () {
                var radioButtons = document.querySelectorAll('input[type="radio"]');

                radioButtons.forEach(function (radioButton) {
                    radioButton.addEventListener("click", submit);
                    if (radioButton.value == "{{$color}}") {
                        radioButton.checked = true;
                    }
                });
            });

            function changeBackgroundColor(input) {
                // Get the value of the selected color
                var color = input.value;
                // Update the background color of the <div> element
                var divElement = document.getElementById("tshirt_div");
                divElement.style.backgroundColor = "#" + color;
            }

            window.onload = function () {
                document.getElementById('{{$color}}').click();
            }
        </script>
    </main>
@endsection
