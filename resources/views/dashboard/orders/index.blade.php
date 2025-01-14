@extends('../Template.dashboard_navbar')

@section('content')

    @php
        if(!isset($order_status))
            {
                $order_status = 'all';
            }
        if(!isset($name_email))
            {
                $name_email = '';
            }
        if(!isset($start_date))
            {
                $start_date = '';
            }
        if(!isset($end_date))
            {
                $end_date = '';
            }
    @endphp

    <main class="flex-1">
        <div x-data="{ modelOpen: false}">
            <div x-show="modelOpen" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true"
                 x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" role="dialog"
                 aria-modal="true">>
                <!--
                Background backdrop, show/hide based on modal state.

                Entering: "ease-out duration-300"
                  From: "opacity-0"
                  To: "opacity-100"
                Leaving: "ease-in duration-200"
                  From: "opacity-100"
                  To: "opacity-0"
              -->
                <div
                    class="fixed inset-0 bg-gray-500 dark:bg-black dark:bg-opacity-50 bg-opacity-75 transition-opacity"></div>
                <div class="fixed inset-0 z-10 overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <!--
                        Modal panel, show/hide based on modal state.

                        Entering: "ease-out duration-300"
                          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                          To: "opacity-100 translate-y-0 sm:scale-100"
                        Leaving: "ease-in duration-200"
                          From: "opacity-100 translate-y-0 sm:scale-100"
                          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                      -->
                        <div
                            class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <!-- Heroicon name: outline/exclamation-triangle -->
                                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Are you
                                        sure you want to cancel
                                        the order?</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">This action cannot be reversed</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                <button type="button" @click="cancelOrder(form_id)"
                                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-8 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                                    Cancel
                                </button>
                                <button type="button" @click="modelOpen =!modelOpen"
                                        class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 sm:mt-0 sm:w-auto sm:text-sm">
                                    Back
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{route('orders.index')}}" id="filters_form" method="GET">
                @csrf
                <div class="py-6 rounded-tl-xl">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                        <!-- Replace with your content -->
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-xl font-semibold text-gray-900 dark:text-white">Orders</h1>
                                <p class="mt-2 text-sm text-gray-700 dark:text-gray-400">A list of all the orders of the
                                    Store.</p>
                            </div>
                            <div class="mt-4 flex sm:mt-0 sm:ml-16 sm:flex-none space-x-2">
                                <div class="flex items-center pr-4 border-r dark:border-gray-700 border-gray-500">
                                    <p
                                        class="whitespace-nowrap justify-center text-sm font-medium me-2 text-gray-700 dark:text-gray-100">
                                        Order Status:
                                    </p>
                                <select form="filters_form" name="order_status" id="order_status"
                                        onchange="this.form.submit()"
                                        class="inline-flex items-center justify-center rounded-md border border-gray-200 text-black bg-neutral-50 px-4 py-2 text-sm font-medium shadow-sm hover:bg-neutral-100focus:outline-none focus:ring-2 focus:ring-neutral-500 focus:ring-offset-2 w-28 transition dark:bg-gray-800 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700">
                                    <option @if($order_status == 'all') selected @endif value="all">All</option>
                                    <option @if($order_status == 'pending') selected @endif value="pending">Pending
                                    </option>
                                    <option @if($order_status == 'paid') selected @endif value="paid">Paid</option>
                                    @if(Auth::user()->user_type == 'A')
                                        <option @if($order_status == 'closed') selected @endif value="closed">Closed
                                        </option>
                                        <option @if($order_status == 'canceled') selected @endif value="canceled">
                                            Canceled
                                        </option>
                                    @endif
                                </select>
                                </div>
                                <div class="flex items-center pl-2">

                                <input type="date" name="start_date" id="start_date" placeholder="Start" value="{{$start_date}}"
                                       form="filters_form" onchange="this.form.submit()"
                                       class="inline-flex items-center justify-center rounded-md border border-gray-200 text-black bg-neutral-50 px-4 py-2 text-sm font-medium shadow-sm hover:bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-neutral-500 focus:ring-offset-2 sm:w-auto transition dark:bg-gray-800 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700">
                                       <p class="dark:text-white mx-3">to</p>
                                <input type="date" name="end_date" id="end_date" placeholder="End" form="filters_form" value="{{$end_date}}"
                                       onchange="this.form.submit()"
                                       class="inline-flex items-center justify-center rounded-md border border-gray-200 text-black bg-neutral-50 px-4 py-2 text-sm font-medium shadow-sm hover:bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-neutral-500 focus:ring-offset-2 sm:w-auto transition dark:bg-gray-800 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700">
                            </div>
                        </div>

                        </div>
                        <div class="flex w-full space-x-2">
                        <div class="flex items-center w-96 my-4 border-r pr-2">
                            <p
                            class="whitespace-nowrap justify-center text-sm font-medium me-2 text-gray-700 dark:text-gray-100">
                            Sort By:
                        </p>
                            <select type="text" id="sort" form="filters_form" name="sort" onchange="this.form.submit()"
                                   class="block p-2 pl-4 text-sm text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option @if($sort == "Newest")selected @endif>Newest Orders</option>
                                    <option @if($sort == "Oldest")selected @endif>Oldest Orders</option>
                            </select>
                        </div>
                        <div class="relative my-4 w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            type="text" name="name_email" id="name_email" placeholder="Search for Name or E-mail"
                                       value="{{$name_email}}" form="filters_form" onchange="this.form.submit()">
                        </div>
                        </div>
                        <div class="flex flex-col">
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                    <div
                                        class="overflow-hidden shadow ring-1 ring-black dark:ring-white dark:ring-opacity-10 ring-opacity-5 md:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
                                            <thead class="bg-gray-50 dark:bg-gray-800 rounded-xl">
                                            <tr>
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                    <input type="checkbox" name="" id="" class="h-4 w-4 rounded border-gray-300 dark:boder-gray-400 text-blue-600 dark:bg-gray-500 bg-white focus:ring-blue-500 transition duration-250
                        ease-in-out">
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                                    Order
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                                    Notes
                                                </th>
                                                <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                                Date
                                            </th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                                    Client
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                                    Status
                                                </th>
                                                <th scope="col" class="relative py-3.5">
                                                    <span class="sr-only">Mark as Paid</span>
                                                    <span class="sr-only">Mark as Closed</span>
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                            @foreach ($orders as $order)
                                                <tr x-data="{ checked: false }"
                                                    :class="{ 'bg-blue-50 dark:bg-blue-950/50 transition duration-100': checked }">
                                                    <td class="whitespace-nowrap pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                        <input type="checkbox" name="" id="" class="h-4 w-4 rounded border-gray-300 dark:boder-gray-400 text-blue-600 dark:bg-gray-500 bg-white focus:ring-blue-500 transition duration-250
                        ease-in-out" x-model="checked">
                                                    </td>
                                                    <td class="whitespace-nowrap py-4 pl-3 pr-3 text-sm font-medium text-gray-900 dark:text-white">
                                                        <a href="{{route('orders.show', ['order' => $order])}}">Order
                                                            Nº{{$order->id}}</a>
                                                    </td>
                                                    <td class="px-3 py-4 text-sm text-gray-500 dark:text-gray-300">
                                                        @if ($order->notes)
                                                            <div class="truncate w-40">
                                                                {{$order->notes}}
                                                            </div>
                                                        @else
                                                            <div class="dark:text-gray-500 text-gray-300 italic">
                                                                No notes available
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td class="px-3 py-4 text-sm text-gray-500 dark:text-gray-300">
                                                        {{date('d/m/Y', strtotime($order->created_at))}}
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4">
                                                        @php
                                                            $fullName = $order->customer->user->name;
                                                            $nameParts = explode(' ', $fullName);
                                                            $firstName = head($nameParts);
                                                            $lastName = count($nameParts) > 1 ? last($nameParts) : '';
                                                        @endphp
                                                        <div class="flex items-center">
                                                            <img class="h-6 w-6 shadow flex-shrink-0 rounded-full"
                                                                 src="@if($order->customer->user->photo_url == null){{asset('img/default_img.png')}}@else{{asset('storage/photos/'.$order->customer->user->photo_url)}}@endif"
                                                                 alt="">
                                                            <p class="ml-2 dark:text-gray-300 text-sm">{{$firstName}} {{$lastName}}</p>
                                                        </div>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4">@include('layouts.partials.statusBadges', ['order', $order])
                                                    </td>
                                                    <td
                                                        class="relative whitespace-nowrap py-4 space-x-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                        <form method="POST" id="update_form_{{$order->id}}"
                                                              action="{{ route('orders.update', ['order' => $order]) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            @can('markAsPaid', $order)
                                                                <input type="submit" name="action"
                                                                       class="inline-flex items-center justify-center rounded-md border-transparent bg-green-50 dark:bg-green-950 border-green-600 ring-1 ring-inset ring-green-700/10 dark:ring-green-600/25 px-4 py-1 text-sm font-medium text-green-700 dark:text-green-300 shadow-sm hover:bg-green-100 dark:hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 sm:w-auto transition"
                                                                       value="Mark as Paid">
                                                            @endcan
                                                            @can('markAsClosed', $order)
                                                                <input type="submit" name="action"
                                                                       class="inline-flex items-center justify-center rounded-md border-transparent bg-blue-50 dark:bg-blue-950 border-blue-600 ring-1 ring-inset ring-blue-700/10 dark:ring-blue-600/25 px-4 py-1 text-sm font-medium text-blue-700 dark:text-blue-300 shadow-sm hover:bg-blue-100 focus:outline-none focus:ring-2 dark:hover:bg-blue-900 focus:ring-blue-500 focus:ring-offset-2 sm:w-auto transition"
                                                                       value="Mark as Closed">
                                                            @endcan
                                                            @can('edit', $order)
                                                                <a href="{{route('orders.show', ['order' => $order])}}"
                                                                   class="inline-flex items-center justify-center rounded-md border-transparent bg-yellow-50 dark:bg-yellow-950 border-yellow-600 ring-1 ring-inset ring-yellow-700/10 dark:ring-yellow-600/25 px-4 py-1 text-sm font-medium text-yellow-700 dark:text-yellow-300 shadow-sm hover:bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 sm:w-auto transition">Edit</a>
                                                            @endcan
                                                            @can('cancel', $order)
                                                                <button type="button"
                                                                        @click="modelOpen =!modelOpen; form_id = {{$order->id}}"
                                                                        class="inline-flex items-center justify-center rounded-md border-transparent bg-red-50 dark:bg-red-950 border-red-600 ring-1 ring-inset ring-red-700/10 dark:ring-red-600/25 px-4 py-1 text-sm font-medium text-red-700 dark:text-red-300 shadow-sm hover:bg-red-100 focus:outline-none focus:ring-2 dark:hover:bg-red-900 focus:ring-red-500 focus:ring-offset-2 sm:w-auto transition">
                                                                    Cancel
                                                                </button>
                                                            @endcan
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <!-- More people... -->
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="pt-14 mx-auto">
                                        {{ $orders->withQueryString()->links('pagination::tailwind') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /End replace -->

                </div>
            </form>
        </div>
    </main>
    <script>
        var form_id = null;

        function cancelOrder(id) {
            var inp = document.createElement('input');
            inp.hidden = true;
            inp.name = 'action';
            inp.value = 'Cancel';
            var form = document.getElementById('update_form_' + id);
            form.appendChild(inp);
            form.submit();
        }
    </script>
@endsection
