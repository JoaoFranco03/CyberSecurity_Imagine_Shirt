<table class="table">
    <thead class="table-dark">
        <tr>
            @if ($showDetail)
            <th class="button-icon-col"></th>
            @endif
            @if ($showAddCart ?? false)
            <th class="button-icon-col"></th>
            @endif
            @if ($showRemoveCart ?? false)
            <th class="button-icon-col"></th>
            @endif
        </tr>
    </thead>
    <tbody>
        @if($showCart)
        @foreach ($cart_products as $cart_product)
        <tr>
            <form hidden></form>
            <form id="form_update_{{$cart_product['unique_id']}}"
                action="{{  route('cart.update', ['id' => $cart_product['unique_id']]) }}" method="POST">
                @csrf
                @method('PUT')
                <ul role="list"
                    class="divide-y divide-gray-300 dark:divide-gray-600 border-t border-b border-gray-300 dark:border-gray-600">
                    <li class="block md:flex py-6 px-4 sm:px-6">
                        <div class="w-full md:w-32 h-36 mb-5 md:mb-0 overflow-hidden rounded-lg bg-white border">
                            <div class="flex justify-center">
                            <div id="tshirt_div"
                                class="rounded-lg tshirt_img h-full w-32 md:w-full object-scale-down object-center relative"
                                style="background-color: #{{$cart_product['color']}}">
                                <img src="/img/transparent_tshirt.png"
                                    alt="Model wearing women's black cotton crewneck tee."
                                    class="rounded-lg h-full w-full object-fit object-center">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-3/6 h-4/6">
                                        <img src="{{asset('storage/tshirt_images/' . $cart_product['image_url'])}}"
                                            class="h-full w-full object-contain">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="ml-6 flex flex-1 flex-col">
                            <div class="flex">
                                <div class="min-w-0 flex-1">
                                    <h4 class="font-medium text-gray-700 dark:text-white text-sm">
                                        {{$cart_product['name']}}
                                    </h4>
                                    <div class="mt-1 flex text-gray-500 dark:text-gray-200 text-sm items-center">
                                        <select name="color"
                                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-32 px-2 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            id="color"
                                            onchange="document.querySelector('#form_update_{{$cart_product['unique_id']}}').submit()">
                                            @foreach ($colors as $color)
                                            <option value="{{$color->code}}" @if($cart_product['color']==$color->code )
                                                selected @endif>{{$color->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('color')
                                        <div class="text-red-600 mt-1 text-md font-bold">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <p class="px-2">|</p>
                                        <select name="size"
                                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-16 px-2 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            id="size"
                                            onclick="document.querySelector('#form_update_{{$cart_product['unique_id']}}').submit()">
                                            <option value="XS" @if($cart_product['size']==='XS' ) selected @endif>XS
                                            </option>
                                            <option value="S" @if($cart_product['size']==='S' ) selected @endif>S
                                            </option>
                                            <option value="M" @if($cart_product['size']==='M' ) selected @endif>M
                                            </option>
                                            <option value="L" @if($cart_product['size']==='L' ) selected @endif>L
                                            </option>
                                            <option value="XL" @if($cart_product['size']==='XL' ) selected @endif>XL
                                            </option>
                                        </select>
                                        @error('size')
                                        <div class="text-red-600 mt-1 text-md font-bold">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <input hidden name="qty" value="{{$cart_product['qty']}}"
                                    id="quantity_{{$cart_product['unique_id']}}">
                                <form hidden></form>
                                <form id="delete"
                                    action="{{  route('cart.remove', ['id' => $cart_product['unique_id']]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="ml-4 flow-root flex-shrink-0">
                                        <button type="submit"
                                            class="-m-2.5 flex items-center justify-center bg-white dark:bg-gray-900 rounded-lg p-2.5 text-gray-400 hover:text-gray-500">
                                            <span class="sr-only">Remove</span>
                                            <!-- Heroicon name: mini/trash -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="flex flex-1 items-end justify-between pt-2">
                                <div>
                                    <p class="mt-1 text-xs font-medium text-gray-500 dark:text-white">
                                        {{$cart_product['qty']}} X {{$cart_product['price']}}€</p>
                                    <p class="mt-1 text-sm font-medium text-gray-900 dark:text-white">
                                        {{$cart_product['subtotal']}}€</p>
                                </div>
                                <div class="ml-4 flex items-center">
                                    <p class="mt-1 mr-2 text-sm text-gray-500 dark:text-gray-200 flex">
                                        Quantity:
                                    </p>
                                    <input type="number"
                                        class="mt-1 w-14 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        name="qty" value="{{$cart_product['qty']}}" min="0"
                                        id="view_{{$cart_product['unique_id']}}"
                                        onchange="document.getElementById('quantity_{{$cart_product['unique_id']}}').value=document.getElementById('view_{{$cart_product['unique_id']}}').value;document.querySelector('#form_update_{{$cart_product['unique_id']}}').submit()">
                                </div>
                                @error('qty')
                                <div class="text-red-600 mt-1 text-md font-bold">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </li>
                </ul>
            </form>
        </tr>
        @endforeach
        @endif
            @if($showCartCheckout)
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-600">
                @foreach ($cart_products as $cart_product)
                <li class="flex py-6 px-4 sm:px-6">
                    <div class="w-32 h-36 overflow-hidden rounded-lg bg-white border">
                        <div id="tshirt_div"
                            class="rounded-lg tshirt_img h-full w-full object-scale-down object-center relative"
                            style="background-color: #{{$cart_product['color']}}">
                            <img src="/img/transparent_tshirt.png"
                                alt="Model wearing women's black cotton crewneck tee."
                                class="rounded-lg h-full w-full object-fit object-center">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-3/6 h-4/6">
                                    <img src="{{asset('storage/tshirt_images/' . $cart_product['image_url'])}}"
                                        class="h-full w-full object-contain">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ml-6 flex flex-1 flex-col">
                        <div class="flex">
                            <div class="min-w-0 flex-1">
                                <h4 class="text-sm">
                                    <p class="font-medium text-gray-700 dark:text-white">{{$cart_product['name']}}</p>
                                </h4>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-200">{{$cart_product['color_name']}}
                                    | {{$cart_product['size']}}</p>
                            </div>
                        </div>
                        <div class="flex flex-1 items-end justify-between pt-2">
                            <div>
                                <p class="mt-1 text-xs font-medium text-gray-500 dark:text-white">
                                    {{$cart_product['qty']}} X {{$cart_product['price']}}€</p>
                                <p class="mt-1 text-sm font-medium text-gray-900 dark:text-white">
                                    {{$cart_product['subtotal']}}€</p>
                            </div>

                            <div class="ml-4">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-200">
                                    Quantity: {{$cart_product['qty']}}</p>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            @endif
            @if($showCartSuccess)
            <ul role="list"
                class="mt-6 divide-y divide-gray-200 border-t border-gray-200 text-sm font-medium text-gray-500">
                @foreach ($cart_products as $cart_product)
                <li class="flex space-x-6 py-6">
                    <div class="w-32 h-32 overflow-hidden rounded-lg bg-white border">
                        <div
                            class="group aspect-w-1 aspect-h-1 overflow-hidden transition group-hover:opacity-90 animate-fade-in duration-500 transform group-hover:scale-110">
                            <img src="{{asset('storage/tshirt_base/'.$cart_product['color'].'.jpg')}}"
                                class="h-34  h-34 p-2 w-full object-scale-down object-center">
                            <img src="{{asset('storage/tshirt_images/' . $cart_product['image_url'])}}"
                                class="h-34 w-34 object-scale-down p-10 object-center">
                        </div>
                    </div>
                    <div class="flex-auto space-y-1">
                        <h3 class="text-gray-900 dark:text-white">
                          {{$cart_product['name']}}
                        </h3>
                        <p class="text-gray-700 dark:text-gray-400">{{$cart_product['color_name']}}</p>
                        <p class="text-gray-700 dark:text-gray-400">{{$cart_product['size']}}</p>
                    </div>
                    <p class="flex-none font-medium text-gray-700 dark:text-gray-400">{{$cart_product['qty']}}
                        X {{$cart_product['price']}}€</p>
                    <p class="flex-none font-medium text-gray-900 dark:text-white">{{$cart_product['subtotal']}}€</p>
                </li>
                @endforeach
            </ul>
            @endif
        </form>
    </tbody>
</table>
