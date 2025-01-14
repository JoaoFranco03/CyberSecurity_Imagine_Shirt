@extends('../Template.store_navbar')
@section('content')

<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->
<main class="relative lg:min-h-full">
  <div class="h-80 overflow-hidden lg:absolute lg:h-full lg:w-1/2 lg:pr-4 xl:pr-12">
    <img src="https://tailwindui.com/img/ecommerce-images/confirmation-page-06-hero.jpg" alt="TODO" class="h-full w-full object-cover object-center">
  </div>
  <div>
    <div class="mx-auto max-w-2xl py-16 px-4 sm:px-6 sm:py-24 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8 lg:py-32 xl:gap-x-24">
      <div class="lg:col-start-2">
        <h1 class="text-sm font-medium text-blue-600">Payment successful</h1>
        <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-5xl">Thanks for ordering</p>
        <p class="mt-2 text-base text-gray-500 dark:text-gray-200">We appreciate your order, we’re currently processing it. So hang tight and we’ll send you confirmation very soon!</p>

        <dl class="mt-16 text-sm font-medium">
          <dt class="text-gray-900 dark:text-white">NIF</dt>
          <dd class="mt-2 text-blue-600">{{$order->nif}}</dd>
        </dl>

          @if ($cart)
              @include('products.shared.table', [
                  'cart_products' => $cart,
                  'showCart' => false,
                  'showCartSuccess' => true,
                  'showCartNavbar' => false,
                  'showCartCheckout' => false,
                  'showDetail' => false,
                  'showRemoveCart' => true,
                  'showAddCart' => false,
                  ])

            <dl class="space-y-6 border-t border-gray-200 pt-6 text-sm font-medium text-gray-500">
              <div class="flex justify-between">
                <dt class="text-gray-900 dark:text-white">Taxes</dt>
                <dd class="text-gray-900 dark:text-white">{{ number_format($total_price * 0.23, 2) }}€</dd>
              </div>

              <div class="flex items-center justify-between border-t border-gray-200 pt-6 text-gray-900 dark:text-white">
                <dt class="text-base">Total</dt>
                <dd class="text-base">{{$total_price}}€</dd>
              </div>
            </dl>

            <dl class="mt-16 grid grid-cols-2 gap-x-4 text-sm text-gray-600">
              <div>
                <dt class="font-medium text-gray-900 dark:text-white">Payment Information</dt>
                <dd class="mt-2 space-y-2 sm:flex sm:space-y-0 sm:space-x-4">
                  <div class="flex-none">
                    @include('layouts.partials.payment', $order)
                    <p class="sr-only">{{$order['payment_type']}}</p>
                  </div>
                </dd>
              </div>
            </dl>
          @else
            <p class="mt-2 text-base text-gray-500">You have no products in your cart.</p>
          @endif
        <div class="mt-16 border-t border-gray-200 py-6 text-right">
          <a href="{{ route('home') }}" class="text-sm font-medium text-blue-600 hover:text-blue-500">
            Continue Shopping
            <span aria-hidden="true"> &rarr;</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
