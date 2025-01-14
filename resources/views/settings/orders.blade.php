@extends('../Template.settings_navbar')
@section('content_settings')

    <form class="divide-y divide-gray-200 dark:divide-gray-600 lg:col-span-9" action="#"
          method="POST">
        <!-- Orders section -->
        <div class="py-6 px-4 sm:p-6 lg:pb-8">
            <div>
                <h2 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-50">My
                    Orders</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">All orders</p>
            </div>
            <div class="mt-4 grid grid-cols-12 gap-4">
                @foreach($orders as $order)
                    <div
                        class="rounded-lg col-span-12 md:col-span-6 border shadow dark:bg-gray-700 border-gray-200 dark:border-gray-600 p-3 w-full flex">
                        <div class="ps-3 py-2">
                            <div>
                                <div class="flex space-x-3">
                                    <p class="text-xl text-bold">Order #{{$order->id}}</p>
                                    @include('layouts.partials.statusBadges', ['order', $order])
                                </div>
                                <p class="text-sm mt-1 text-gray-500">{{$order->date}}</p>
                            </div>
                            <div class="mt-4 flex-1">
                                <a href="{{route('orders.show', ['order' => $order])}}"
                                   class="text-blue-500 hover:text-blue-600">View Order</a>
                            </div>

                        </div>
                        <div class="flex items-end">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </form>
@endsection
