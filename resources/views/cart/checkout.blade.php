@extends('../Template.store_navbar')
@section('content')

    <div class="bg-gray-50 dark:bg-gray-900">
        <main class="mx-auto max-w-7xl px-4 pt-16 pb-24 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:max-w-none">
                <h1 class="sr-only">Checkout</h1>
                <form hidden></form>
                <form method="POST" action="{{ route('orders.store')}}" class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
                    @csrf
                    <div>
                        <div>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-white">Contact information</h2>

                            <div class="mt-4">
                                <div class="sm:col-span-2">
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                                    <div class="mt-1">
                                        <input type="text" value="{{auth()->user()->name}}" id="first-name"
                                               name="first-name" autocomplete="given-name" disabled
                                               class="block w-full dark:bg-gray-800 rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="email-address" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email
                                    address</label>
                                <div class="mt-1">
                                    <input type="email" value="{{auth()->user()->email}}" id="email"
                                           name="email" autocomplete="email"
                                           class="block w-full dark:bg-gray-800 rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                </div>
                            </div>
                        </div>

                        <div class="mt-10 border-t border-gray-200 dark:border-gray-600 pt-10">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-white">Shipping information</h2>

                            <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                <div class="sm:col-span-2">
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                                    <div class="mt-1">
                                        <input type="text" value="{{auth()->user()->name}}" id="first-name"
                                               name="first-name" autocomplete="given-name" disabled
                                               class="block w-full dark:bg-gray-800 rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="nif" class="block text-sm font-medium text-gray-700 dark:text-gray-200">NIF</label>
                                    <div class="mt-1">
                                        <input type="text" value="@if(auth()->user()->customer->nif) {{auth()->user()->customer->nif}} @endif" id="nif"
                                               name="nif" autocomplete="given-name"
                                               class="block w-full dark:bg-gray-800 rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                    </div>
                                </div>
                                @error('nif')
                                <div class="text-red-600 mt-1 text-md font-bold">
                                    {{ $message }}
                                </div>
                                @enderror

                                <div class="sm:col-span-2">
                                    <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Address</label>
                                    <div class="mt-1">
                                        <input type="text" value="{{auth()->user()->customer->address}}" name="address"
                                               id="address" autocomplete="street-address"
                                               class="block w-full dark:bg-gray-800 rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                    </div>
                                </div>
                                @error('address')
                                <div class="text-red-600 mt-1 text-md font-bold">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>


                        <div class="mt-10 border-t border-gray-200 dark:border-gray-600 pt-10">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-white">Aditional information</h2>

                            <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                <div class="sm:col-span-2">
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Notes</label>
                                    <div class="mt-1">
                                        <textarea type="text" id="first-name" rows="4" cols="50"
                                               name="notes" autocomplete="given-name"
                                               class="block w-full dark:bg-gray-800 rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment -->
                        <div class="mt-10 border-t border-gray-200 dark:border-gray-600 pt-10">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-white">Payment</h2>

                            <fieldset class="mt-4">
                                <legend class="sr-only">Payment type</legend>
                                <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                                    <div class="flex items-center">
                                        <input id="mastercard" name="payment_type" type="radio" checked value="MC" {{ (auth()->user()->customer->default_payment_type === 'MC') ? 'checked' : '' }}
                                               class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-800">
                                        <label for="mastercard" class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-200">MasterCard</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="visa" name="payment_type" type="radio" value="VISA" {{ (auth()->user()->customer->default_payment_type === 'VISA') ? 'checked' : '' }}
                                               class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-800">
                                        <label for="visa" class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-200">Visa</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="paypal" name="payment_type" type="radio" value="PAYPAL" {{ (auth()->user()->customer->default_payment_type === 'PAYPAL') ? 'checked' : '' }}
                                               class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-800">
                                        <label for="paypal" class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-200">PayPal</label>
                                    </div>
                                </div>
                                @error('payment_type')
                                <div class="text-red-600 mt-1 text-md font-bold">
                                    {{ $message }}
                                </div>
                                @enderror
                            </fieldset>

                            <div class="mt-6 grid grid-cols-4 gap-y-6 gap-x-4">
                                <div class="col-span-4">
                                    <label for="payment-ref" id="payment-ref-label" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Card Number:</label>
                                    <div class="mt-1">
                                        <input type="text" id="payment-ref"
                                               value="{{auth()->user()->customer->default_payment_ref}}"
                                               name="payment_ref" autocomplete="cc-number"
                                               class="block w-full dark:bg-gray-800 rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                    </div>
                                </div>
                            </div>
                            @error('payment_ref')
                            <div class="text-red-600 mt-1 text-md font-bold">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Order summary -->
                    <div class="mt-10 lg:mt-0">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-white">Order summary</h2>

                        <div class="mt-4 rounded-lg border border-gray-200 dark:border-gray-600 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm">
                            <h3 class="sr-only">Items in your cart</h3>
                            @if ($cart)
                                @include('products.shared.table', [
                                    'cart_products' => $cart,
                                    'showCart' => false,
                                    'showCartNavbar' => false,
                                    'showCartCheckout' => true,
                                    'showCartSuccess' => false,
                                    'showDetail' => true,
                                    'showRemoveCart' => true,
                                    'showAddCart' => false,
                                    ])

                            <dl class="space-y-6 border-t border-gray-200 py-6 px-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <dt class="text-sm">Taxes</dt>
                                    <dd class="text-sm font-medium text-gray-900 dark:text-white">{{ number_format(session('total_price', 0) * 0.23, 2) }}€</dd>
                                </div>
                                <div class="flex items-center justify-between border-t border-gray-200 dark:border-gray-600 pt-6">
                                    <dt class="text-base font-medium">Total</dt>
                                    <dd class="text-base font-medium text-gray-90 dark:text-white">{{$total_price}}€</dd>
                                </div>
                            </dl>

                            <div class="border-t border-gray-200 dark:border-gray-600 py-6 px-4 sm:px-6">
                                <button type="submit"
                                   class="w-full text-center rounded-md border border-transparent bg-blue-600 py-3 px-4 text-base font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-50">Confirm
                                    order</button>
                            </div>

                            @else
                                <p class="text-center">No items in your cart</p>
                            @endif

                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <script>
        const paymentTypeRadios = document.querySelectorAll('input[name="payment_type"]');
        const paymentRefLabel = document.getElementById('payment-ref-label');

        paymentTypeRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                if (this.value === 'PAYPAL') {
                    paymentRefLabel.innerText = 'PayPal E-mail:';
                } else {
                    paymentRefLabel.innerText = 'Card Number:';
                }
            });
        });
    </script>
@endsection
