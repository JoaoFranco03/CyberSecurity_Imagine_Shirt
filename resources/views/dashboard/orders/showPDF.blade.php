@extends('../Template.pdf_navbar')
@section('content')
<main class="flex-1">
    <div class="">
        <div class="min-h-full">
            <img width="50" height="50" src="{{url('img/Logo/logo.png')}}" alt="">
            <main class="py-10">
                <!-- Page header -->
                <div class="mt-8 mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:grid-flow-col-dense lg:grid-cols-3">
                    <div class="space-y-6 lg:col-start-1 lg:col-span-2">
                        <!-- Description list-->
                        <section aria-labelledby="applicant-information-title">
                            <h1 class="pl-5 text-xl leading-6 font-medium text-gray-900 dark:text-white">
                                Order Number: {{$order->id}}
                            </h1>
                            <div
                                class="bg-white dark:bg-gray-800 shadow border border-gray-100 dark:border-gray-800 sm:rounded-lg">
                                <div class="px-4 py-5 sm:px-6">
                                    <h2 id="applicant-information-title"
                                        class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Invoice
                                    </h2>
                                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                        <div class="sm:col-span-1 flex mt-2">
                                            <dt class="text-sm text-gray-500 dark:text-gray-300">Client:&nbsp;
                                            </dt>
                                            <dd class="text-sm text-gray-500 dark:text-gray-300">{{$order->customer->user->name}} (NIF:{{$order->nif}})
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1 flex mt-2">
                                            <dt class="text-sm text-gray-500 dark:text-gray-300">Date:&nbsp;
                                            </dt>
                                            <dd class="text-sm text-gray-900 dark:text-gray-50">{{$order->date}}
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
                                <div class="overflow-x-auto border-t border-gray-200 px-4 py-5 sm:px-6">
                                    <dt class="text-sm font-medium mb-4 text-gray-900 dark:text-white">Receipt:</dt>
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-200">
                                        <thead class="text-xs text-gray-700 border-y border-gray-300 dark:text-gray-50">
                                            <tr>
                                                <th scope="col" class="pe-6 py-3">
                                                    T-Shirt Name
                                                </th>
                                                <th scope="col" class="pe-6 py-3">
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
                                                        <img src="{{asset('/img/transparent_tshirt.png')}}"
                                                            alt="Model wearing women's black cotton crewneck tee."
                                                            class="rounded-lg h-full w-full object-fit object-center">
                                                        <div class="absolute p-10 inset-0 z-20 flex items-center justify-center">
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
                                                    {{$item->sub_total}}€
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
                </div>
            </main>
        </div>
    </div>
</main>
@endsection
