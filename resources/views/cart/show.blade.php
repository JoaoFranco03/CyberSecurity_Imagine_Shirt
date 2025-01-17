@extends('../template.store_navbar')
@section('content')
    <main class="mx-auto max-w-7xl px-4 mt-5">
        <div class="mx-auto max-w-2xl px-4 pt-16 pb-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="flex justify-between">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl">Shopping
                    Bag</h1>
                @if ($cart)
                    <form id="formClear" method="POST" action="{{ route('cart.destroy') }}" class="d-none">
                        @csrf
                        @method('DELETE')
                        <button id="Add_new_color" type="submit" data-modal-target="color-modal"
                                data-modal-toggle="color-modal"
                                class="inline-flex items-center justify-center rounded-md border border-gray-300 text-black bg-white px-4 py-2 text-sm font-medium shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-neutral-500 dark:focus:ring-neutral-800 sm:w-auto transition dark:bg-gray-800 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-6 h-6 mr-2" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Clear Cart
                        </button>
                    </form>
                @endif
            </div>
            @if ($cart)
                <form class="mt-12 lg:grid lg:grid-cols-12 lg:items-start lg:gap-x-12 xl:gap-x-16">
                    <section aria-labelledby="cart-heading" class="lg:col-span-7">
                        <h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>
                        @include('products.shared.table', [
                        'cart_products' => $cart,
                        'showCart' => true,
                        'showCartSuccess' => false,
                        'showCartNavbar' => false,
                        'showCartCheckout' => false,
                        'showDetail' => true,
                        'showRemoveCart' => true,
                        'showAddCart' => false,
                        ])
                    </section>
                    <!-- Order summary -->
                    <section aria-labelledby="summary-heading"
                             class="mt-16 rounded-lg bg-gray-50 dark:bg-gray-800 px-4 py-6 sm:p-6 lg:col-span-5 lg:mt-0 lg:p-8">
                        <h2 id="summary-heading" class="text-lg font-medium text-gray-900 dark:text-gray-100">Order
                            summary</h2>

                        <dl class="mt-6 space-y-4">
                            <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                                <dt class="flex text-sm text-gray-600 dark:text-gray-200">
                                    <span>Tax estimate (23%)</span>
                                </dt>
                                <dd class="text-sm font-medium text-gray-800 dark:text-white">{{ number_format(session('total_price', 0) * 0.23, 2) }}
                                    €
                                </dd>
                            </div>
                            <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                                <dt class="text-base font-medium text-gray-900 dark:text-gray-100">Order total</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">{{session('total_price', 0)}}
                                    €
                                </dd>
                            </div>
                        </dl>
                        @endif
                        <div class="mt-6">
                            @auth
                                @if($cart)
                                    <div class="mt-6">
                                        <a href="{{ route('orders.create')}}" type="button"
                                           class="w-full rounded-md border text-center border-transparent bg-blue-600 py-3 px-4 text-base font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-50">Checkout</a>
                                    </div>
                                @else
                                    <p class="mt-2 text-base text-gray-500">You have no products in your cart.</p>
                                @endif
                            @else
                                <a href="{{ route('login') }}"
                                   class="w-full rounded-md border border-transparent bg-blue-600 py-3 px-4 text-base font-medium text-white shadow-sm hover:bg-blue-700 text-center">
                                    Login to Checkout
                                </a>
                            @endauth
                        </div>
                    </section>
                </form>
        </div>
    </main>
@endsection
