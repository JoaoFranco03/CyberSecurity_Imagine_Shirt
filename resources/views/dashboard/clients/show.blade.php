@extends('../Template.dashboard_navbar')

@section('content')
<main class="flex-1">
    <div class="rounded-tl-xl">
        <div class="min-h-full">
            <main class="py-10">
                <!-- Page header -->
                @include('dashboard.users.partials.showFields' , ['user' => $client->user])
                <div
                    class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
                    <div class="space-y-6 lg:col-start-1 lg:col-span-2">
                        <!-- Description list-->
                        <section aria-labelledby="applicant-information-title">
                            <div class="bg-white dark:bg-gray-900 shadow sm:rounded-lg">
                                <div class="border-gray-200 px-4 py-5 sm:px-6">
                                    <dl>
                                        <div>
                                            <dt class="text-sm font-medium text-gray-900 dark:text-white">Adress:</dt>
                                            <dd class="mt-3 text-sm text-gray-900 dark:text-gray-50">
                                                {{$client->address}}</dd>
                                        </div>
                                    </dl>
                                </div>
                                <div class="overflow-x-auto border-t border-gray-200 px-4 py-5 sm:px-6">
                                    <dt class="text-sm font-medium mb-4 text-gray-900 dark:text-white">Products Bought:
                                    </dt>

                                    @if(count($client->orders) != 0)
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-200">
                                        <thead class="text-xs text-gray-700 border-y border-gray-300 dark:text-gray-50">
                                            <tr>
                                                <th scope="col" class="pe-6 py-3">
                                                    T-Shirt Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Color
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Size
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Quantity
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Price
                                                </th>
                                            </tr>
                                        </thead>
                                        @foreach($client->orders as $order)
                                        @foreach($order->orderItems as $item)
                                        <tbody>
                                            <tr class="border-b dark:border-gray-700">
                                                <th scope="row"
                                                    class="pe-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$item->tshirtImage->name}}
                                                </th>
                                                <td class="px-6 py-4">

                                                    {{$item->color->name}}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{$item->size}}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{$item->qty}}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{$item->sub_total}}€
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                        @endforeach
                                    </table>
                                    <div class="px-4 pb-5 pt-5 sm:px-6">
                                        <dl>
                                            <div class="flex space-x-8 justify-end">
                                                <div class="text-right space-y-3">
                                                    <dt class="text-sm font-bold dark:text-gray-200">Total</dt>
                                                </div>
                                                <div class="text-right space-y-3">
                                                    <dd class="text-sm font-semibold text-gray-900 dark:text-white">
                                                        {{$total}}€
                                                    </dd>
                                                </div>
                                            </div>
                                        </dl>
                                    </div>
                                    @else
                                    <div class="text-center rounded-lg py-5">
                                        <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium border-gray-300 dark:border-gray-300">No
                                            Orders</h3>
                                    </div>
                                    @endif
                                </div>

                            </div>
                        </section>
                    </div>

                    <section aria-labelledby="amount-title" class="lg:col-start-3 lg:col-span-1">
                        <div
                            class="bg-gray-50 dark:bg-gray-800 border border-gray-100 dark:border-gray-800 px-4 py-5 shadow sm:rounded-lg sm:px-6">
                            <h2 id="amount-title" class="text-sm font-semibold text-gray-900 dark:text-white">
                                Informations:</h2>

                            <!-- Activity Feed -->
                            <div class="mt-2 flow-root">
                                <ul role="list" class="-mb-8">
                                    <li>
                                        <div class="relative pb-4">
                                            <div class="relative flex space-x-3">
                                                <div class="min-w-0 flex-1 flex justify-between space-x-4">
                                                    <div>
                                                        <p
                                                            class="text-sm text-gray-900 dark:text-gray-50 font-semibold">
                                                            Total Paid: {{$total}}€</p>
                                                    </div>
                                                    <div class="text-right text-sm whitespace-nowrap">
                                                        @include('layouts.partials.userTypeBadges', ['user'=>
                                                        $client->user])
                                                    </div>
                                                </div>
                                                <hr class="mt-3">
                                            </div>
                                    </li>
                                    <li>
                                        <div class="relative pb-4">
                                            <div class="relative flex m-auto space-x-2 items-center">
                                                <span class="h-7 w-5 text-gray-400 dark:text-gray-200 flex">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                                    </svg>
                                                </span>
                                                <div class="min-w-0 flex-1 flex justify-between space-x-9">
                                                    <div>
                                                        <p class="text-xs font-medium text-gray-500 dark:text-gray-200">
                                                            Default Adress: {{$address}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="relative pb-4">
                                            <div class="items-center relative flex m-auto space-x-2">
                                                <span class="h-5 w-5 text-gray-400 dark:text-gray-200 flex">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-5 h-5">
                                                        <path
                                                            d="M4.5 3.75a3 3 0 00-3 3v.75h21v-.75a3 3 0 00-3-3h-15z" />
                                                        <path fill-rule="evenodd"
                                                            d="M22.5 9.75h-21v7.5a3 3 0 003 3h15a3 3 0 003-3v-7.5zm-18 3.75a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                                <div class="min-w-0 flex-1 flex justify-between space-x-9">
                                                    <div>
                                                        <p class="text-xs font-medium text-gray-500 dark:text-gray-200">
                                                            Preferred Payment Method: {{$paymentType}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-10 flex flex-col justify-stretch">
                                <button type="button"
                                    class="inline-flex items-center justify-center px-3 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6 mr-2">
                                        <path fill-rule="evenodd"
                                            d="M12 2.25a.75.75 0 01.75.75v11.69l3.22-3.22a.75.75 0 111.06 1.06l-4.5 4.5a.75.75 0 01-1.06 0l-4.5-4.5a.75.75 0 111.06-1.06l3.22 3.22V3a.75.75 0 01.75-.75zm-9 13.5a.75.75 0 01.75.75v2.25a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5V16.5a.75.75 0 011.5 0v2.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V16.5a.75.75 0 01.75-.75z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Download
                                    Receipt with All the Orders
                                </button>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>
</main>
@endsection
