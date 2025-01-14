@if($admin)
@php $pageToExtend = '../Template.dashboard_navbar'; @endphp
@else
@php $pageToExtend = '../Template.store_navbar'; @endphp
@endif
@extends($pageToExtend)
@section('content')
<main class="flex-1">
    <div class="">
        <div class="min-h-full">
            <main class="py-10">
                <!-- Page header -->
                <div
                    class="max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl lg:px-8">
                    <div class="flex items-center space-x-5">

                        <div class="flex-shrink-0">
                            <div class="relative">
                                <div
                                    class="flex justify-center bg-white items-center h-16 w-16 rounded-full border text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-9 h-9">
                                        <path
                                            d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375z" />
                                        <path fill-rule="evenodd"
                                            d="M3.087 9l.54 9.176A3 3 0 006.62 21h10.757a3 3 0 002.995-2.824L20.913 9H3.087zm6.163 3.75A.75.75 0 0110 12h4a.75.75 0 010 1.5h-4a.75.75 0 01-.75-.75z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Order
                                Num.{{$order->id}}</h1>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-200">
                                Date: {{$order->date}}</p>
                        </div>
                    </div>

                </div>

                <div
                    class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
                    <div class="space-y-6 lg:col-start-1 lg:col-span-2">
                        <!-- Description list-->
                        <section aria-labelledby="applicant-information-title">
                            <div
                                class="bg-white dark:bg-gray-800 shadow border border-gray-100 dark:border-gray-800 sm:rounded-lg">
                                <div class="px-4 py-5 sm:px-6">
                                    <h2 id="applicant-information-title"
                                        class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Invoice
                                    </h2>
                                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                        <div class="sm:col-span-1 flex mt-2">
                                            <dt class="text-sm text-gray-500 dark:text-gray-300">Created at&nbsp;
                                            </dt>
                                            <dd class="text-sm text-gray-900 dark:text-gray-50">{{$order->created_at}}
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1 flex mt-2">
                                            <dt class="text-sm text-gray-500 dark:text-gray-300">Updated at&nbsp;
                                            </dt>
                                            <dd class="text-sm text-gray-900 dark:text-gray-50">{{$order->updated_at}}
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                                <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                                    <dl>
                                        <div>
                                            <dt class="text-sm font-medium text-gray-900 dark:text-white">Adress:
                                            </dt>
                                            <dd class="mt-3 text-sm text-gray-900 dark:text-gray-50">{{$order->address}}
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                                @if ($order->notes)
                                <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                                    <dl>
                                        <div>
                                            <dt class="text-sm font-medium text-gray-900 dark:text-white">Description:
                                            </dt>
                                            <dd class="mt-3 text-sm text-gray-900 dark:text-gray-50">{{$order->notes}}
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                                @endif
                                <div class="overflow-x-auto border-t border-gray-200 px-4 py-5 sm:px-6">
                                    <dt class="text-sm font-medium mb-4 text-gray-900 dark:text-white">Receipt:</dt>
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-200">
                                        <thead class="text-xs text-gray-700 border-y border-gray-300 dark:text-gray-50">
                                            <tr>
                                                <th scope="col" class="pe-6 py-3">
                                                    T-Shirt Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Preview
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
                                        <tbody>
                                            @foreach($order->orderItems as $item)
                                            <tr class="border-b dark:border-gray-700">
                                                <th scope="row"
                                                    class="pe-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$item->tshirtImage->name}}
                                                </th>
                                                <td class="px-6 py-4">
                                                    <div id="tshirt_div"
                                                        class="rounded-lg tshirt_img h-40 w-32 object-scale-down object-center relative"
                                                        style="background-color: #{{$item->color->code}}">
                                                        <img src="/img/transparent_tshirt.png"
                                                            alt="Model wearing women's black cotton crewneck tee."
                                                            class="rounded-lg h-full w-full object-fit object-center">
                                                        <div class="absolute inset-0 flex items-center justify-center">
                                                            <div class="w-3/6 h-4/6">
                                                                <img src="{{asset('storage/tshirt_images/' . $item->tshirtImage->image_url)}}"
                                                                    class="h-full w-full object-contain">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
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
                                                    {{$item->sub_total}} €
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="px-4 pb-5 sm:px-6">
                                    <dl>
                                        <div class="flex space-x-8 justify-end">
                                            <div class="text-right space-y-3">
                                                <dt class="text-sm font-bold dark:text-gray-200">Total</dt>
                                            </div>
                                            <div class="text-right space-y-3">
                                                <dd class="text-sm font-semibold text-gray-900 dark:text-white">
                                                    {{$order->total_price}}
                                                    €
                                                </dd>
                                            </div>
                                        </div>
                                    </dl>
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
                            <div class="mt-2 -mb-8 flow-root" role="list">
                                <div class="relative pb-4">
                                    <div class="relative flex space-x-3">
                                        <div class="min-w-0 flex-1 flex justify-between space-x-4">
                                            <div>
                                                <p class="text-sm text-gray-900 dark:text-gray-50 font-semibold">
                                                    {{$order->total_price}}€</p>
                                            </div>
                                            <div class="text-right text-sm whitespace-nowrap">
                                                @include('layouts.partials.statusBadges', ['order', $order])
                                            </div>
                                        </div>
                                        <hr class="mt-3">
                                    </div>
                                </div>


                                <div class="relative pb-4">
                                    <div class="items-center relative flex m-auto space-x-2">
                                        <span class="h-5 w-5 text-gray-400 dark:text-gray-200 flex">
                                            <!-- Heroicon name: solid/thumb-up -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        <div class="min-w-0 flex-1 flex justify-between space-x-9">
                                            <div>
                                                <p class="text-xs font-medium dark:text-gray-50 text-gray-900">
                                                    {{$order->customer->user->name}} (NIF:
                                                    {{$order->nif}})
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative pb-4">
                                    <div class="items-center relative flex m-auto space-x-2">
                                        <span class="h-5 w-5 text-gray-400 dark:text-gray-200 flex">
                                            <!-- Heroicon name: solid/thumb-up -->
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-5 h-5">
                                                <path
                                                    d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                                                <path fill-rule="evenodd"
                                                    d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        <div class="min-w-0 flex-1 flex justify-between space-x-9">
                                            <div>
                                                <p class="text-xs font-medium text-gray-500 dark:text-gray-200">
                                                    {{$order->date}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative pb-4">
                                    <div class="items-center relative flex m-auto space-x-2">
                                        <span class="h-5 w-5 text-gray-400 dark:text-gray-200 flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-5 h-5">
                                                <path d="M4.5 3.75a3 3 0 00-3 3v.75h21v-.75a3 3 0 00-3-3h-15z" />
                                                <path fill-rule="evenodd"
                                                    d="M22.5 9.75h-21v7.5a3 3 0 003 3h15a3 3 0 003-3v-7.5zm-18 3.75a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        <div class="min-w-0 flex-1 flex justify-between space-x-9">
                                            <div>
                                                <p class="text-xs font-medium text-gray-500 dark:text-gray-200">
                                                    Paid with {{$order->
                                                    payment_type}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @can ('viewInvoice', $order)
                            <div class="mt-10 flex flex-col justify-stretch">
                                <a href="{{asset('storage/pdf_receipts/' . $order->receipt_url)}}"
                                    class="inline-flex items-center justify-center px-4 py-2 border border-transparent
                                    text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700
                                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6 mr-2">
                                        <path fill-rule="evenodd"
                                            d="M12 2.25a.75.75 0 01.75.75v11.69l3.22-3.22a.75.75 0 111.06 1.06l-4.5 4.5a.75.75 0 01-1.06 0l-4.5-4.5a.75.75 0 111.06-1.06l3.22 3.22V3a.75.75 0 01.75-.75zm-9 13.5a.75.75 0 01.75.75v2.25a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5V16.5a.75.75 0 011.5 0v2.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V16.5a.75.75 0 01.75-.75z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Download
                                    Receipt
                                </a>
                            </div>
                            @endcan
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>
</main>
@endsection
