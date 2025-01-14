@extends('../Template.dashboard_navbar')

@section('content')
    <main class="flex-1">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8 pb-4">
            <!-- Replace with your content -->
            <div class="pb-4">
                <div>
                    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                        <div
                            class="bg-gradient-to-br from-indigo-300 to-purple-400 dark:from-indigo-700 dark:to-purple-800 relative overflow-hidden rounded-lg dark:bg-gray-900 shadow px-6 pt-6">
                            <dt>
                                <div class="absolute rounded-md bg-white p-3">
                                    <!-- Heroicon name: outline/users -->
                                    <svg class="h-6 w-6 text-indigo-400 dark:text-indigo-600"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z"
                                              clip-rule="evenodd"/>
                                        <path
                                            d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z"/>
                                    </svg>
                                </div>
                                <p class="ml-16 truncate text-sm font-medium text-blue-50">Total Customers</p>
                            </dt>
                            <div class="ml-16 flex items-baseline pb-6">
                                <p class="text-2xl font-semibold text-white dark:text-white">{{$num_clients}}</p>
                            </div>
                        </div>

                        <div
                            class="relative overflow-hidden rounded-lg bg-gradient-to-br from-sky-400 to-indigo-600 dark:from-sky-700 dark:to-indigo-900 dark:bg-gray-900 shadow px-6 pt-6">
                            <dt>
                                <div class="absolute rounded-md bg-white p-3">
                                    <!-- Heroicon name: outline/envelope-open -->
                                    <svg class="h-6 w-6 text-sky-600 dark:text-sky-800"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M12 1.5c-1.921 0-3.816.111-5.68.327-1.497.174-2.57 1.46-2.57 2.93V21.75a.75.75 0 001.029.696l3.471-1.388 3.472 1.388a.75.75 0 00.556 0l3.472-1.388 3.471 1.388a.75.75 0 001.029-.696V4.757c0-1.47-1.073-2.756-2.57-2.93A49.255 49.255 0 0012 1.5zm3.53 7.28a.75.75 0 00-1.06-1.06l-6 6a.75.75 0 101.06 1.06l6-6zM8.625 9a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm5.625 3.375a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <p class="ml-16 truncate text-sm font-medium text-green-50">Total Orders</p>
                            </dt>
                            <div class="ml-16 flex items-baseline pb-6">
                                <p class="text-2xl font-semibold text-white dark:text-white">{{$num_orders}}</p>
                            </div>
                        </div>

                        <div
                            class="relative overflow-hidden rounded-lg bg-gradient-to-br from-emerald-500 to-lime-600 dark:from-emerald-700 dark:to-lime-800 shadow px-6 pt-6">
                            <dt>
                                <div class="absolute rounded-md bg-white p-3">
                                    <!-- Heroicon name: outline/cursor-arrow-rays -->
                                    <svg class="h-6 w-6 text-green-500 dark:text-green-700"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.902 7.098a3.75 3.75 0 013.903-.884.75.75 0 10.498-1.415A5.25 5.25 0 008.005 9.75H7.5a.75.75 0 000 1.5h.054a5.281 5.281 0 000 1.5H7.5a.75.75 0 000 1.5h.505a5.25 5.25 0 006.494 2.701.75.75 0 00-.498-1.415 3.75 3.75 0 01-4.252-1.286h3.001a.75.75 0 000-1.5H9.075a3.77 3.77 0 010-1.5h3.675a.75.75 0 000-1.5h-3c.105-.14.221-.274.348-.402z"
                                              clip-rule="evenodd"/>
                                    </svg>


                                </div>
                                <p class="ml-16 truncate text-sm font-medium text-green-50">Total Profits</p>
                            </dt>
                            <div class="ml-16 flex items-baseline pb-6">
                                <p class="text-2xl font-semibold text-white dark:text-white">{{number_format($profit, 0, ',', '.')}}
                                    €</p>
                            </div>
                        </div>
                    </dl>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <div
                    class="col-span-3 sm:col-span-2  bg-gray-50 dark:bg-gray-800 dark:text-white dark:border-gray-700 rounded-xl p-5 border border-gray-200 shadow-sm">
                    <form action="{{route('dashboard.index')}}" method="GET" id="filters_form">
                        @csrf
                        <div class="my-3 flex items-center">
                            <p class="text-base:">Sales from &nbsp;</p>
                            <input type="month" name="start_date" id="start_date" placeholder="Start"
                                   value="{{$start_date}}"
                                   form="filters_form" onchange="this.form.submit()"
                                   class="inline-flex items-center justify-center rounded-md border border-gray-200 text-black bg-white px-4 py-2 text-sm font-medium shadow-sm hover:bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-neutral-500 focus:ring-offset-2 sm:w-auto transition dark:bg-gray-700 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700">
                            <p class="dark:text-white mx-2">to</p>
                            <input type="month" name="end_date" id="end_date" placeholder="End" form="filters_form"
                                   value="{{$end_date}}"
                                   onchange="this.form.submit()"
                                   class="inline-flex items-center justify-center rounded-md border border-gray-200 text-black bg-white px-4 py-2 text-sm font-medium shadow-sm hover:bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-neutral-500 focus:ring-offset-2 sm:w-auto transition dark:bg-gray-700 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700">
                            <p>&nbsp;:</p>
                        </div>
                    </form>

                    <canvas id="acquisitions" class="h-50"></canvas>
                </div>
                <div
                    class="bg-gray-50 dark:bg-gray-800 dark:text-white dark:border-gray-700 rounded-xl p-5 border border-gray-200 shadow-sm col-span-3 sm:col-span-1">
                    <p class="text-base pb-2 ps-1">Most Valuable Consumers:</p>


                    <div class="max-h-80 overflow-y-auto space-y-2">
                        @foreach($most_valuable_customers as $valuable_user)
                            <div
                                class="rounded-xl bg-white dark:bg-gray-700 dark:border-gray-600 border border-gray-300 p-3 w-full flex">
                                <img
                                    src="@if($valuable_user->user->photo_url == null){{asset('img/default_img.png')}}@else{{asset('storage/photos/'.$valuable_user->user->photo_url)}}@endif"
                                    class="rounded-full aspect-1 h-12 mr-2" alt="">
                                <div>
                                    @php
                                        $fullName = $valuable_user->user->name;
                                        $nameParts = explode(' ', $fullName);
                                        $firstName = head($nameParts);
                                        $lastName = count($nameParts) > 1 ? last($nameParts) : '';
                                    @endphp
                                    <p class="text-bold">{{$firstName}} {{$lastName}}</p>
                                    <div class="flex">
                                        <p class="text-xs text-gray-600 dark:text-gray-400">Spent
                                            <u>{{ $valuable_user->orders->sum('total_price') }}€</u> on the Store</p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
                <div
                    class="bg-gray-50 dark:bg-gray-800 dark:text-white dark:border-gray-700 rounded-xl p-5 border border-gray-200 shadow-sm col-span-3 sm:col-span-1">
                    {{-- To-Do- Add Filters (Such as View based in Dates, like the best sellers of 2021) --}}
                    <p class="text-base pb-2 ps-1">Best Sellers:</p>
                    <div class="max-h-80 overflow-y-auto space-y-2">
                        @foreach($best_sellers as $best_seller)
                            <div
                                class="rounded-xl bg-white dark:bg-gray-700 dark:border-gray-600 border border-gray-300 p-3 w-full flex">
                                <img
                                    src="{{asset("storage/tshirt_images/".$best_seller->image_url)}}"
                                    class="border rounded-full w-12 h-12 mr-2 p-0.5 object-scale-down aspect-1">
                                <div>
                                    <p>{{$best_seller->name}}</p>
                                    <div class="flex">
                                        <p class="text-xs text-gray-600 dark:text-gray-400">Sold
                                            <u>{{$best_seller->order_items->sum('qty')}}</u> Times</p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div
                    class="bg-gray-50 dark:bg-gray-800 dark:text-white dark:border-gray-700 rounded-xl p-5 border border-gray-200 shadow-sm col-span-2">
                    <p class="text-base mb-1">Products by Categories:</p>
                    <canvas id="products_categories" class="h-50"></canvas>
                </div>
            </div>
        </div>
    </main>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        charset="utf-8"
    ></script>
    <script>
        (async function () {
            const data = [
                    @foreach($chart_data as $data)
                {
                    month: "{{$data->formatted_date}}", count: {{$data->total}}, avg: {{$data->mean}}
                },
                @endforeach
            ];


            const ctx = document.getElementById('acquisitions').getContext('2d');

            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgb(16, 132, 244, 0.5)');   // Starting color
            gradient.addColorStop(1, 'rgb(16, 132, 244, 0.1)');     // Ending color

            const gradient2 = ctx.createLinearGradient(0, 0, 0, 400);
            gradient2.addColorStop(0, 'rgb(160, 132, 244, 0.5)');   // Starting color
            gradient2.addColorStop(1, 'rgb(160, 132, 244, 0.1)');     // Ending color
            console.log(data.map((row => row.avg)))
            new Chart(
                ctx,
                {
                    type: 'line',
                    data: {
                        labels: data.map(row => row.month),
                        datasets: [
                            {
                                label: 'Mean',
                                data: data.map(row => row.avg),
                                borderColor: gradient2,
                                backgroundColor: gradient2,
                                borderWidth: 2,
                                yAxisID: "y-axis-1"
                            },
                            {
                                label: 'Total',
                                data: data.map(row => row.count),
                                borderColor: gradient,
                                backgroundColor: gradient,
                                borderWidth: 2,
                                yAxisID: "y-axis-2"
                            }
                        ]
                    },
                    options: {
                        scales: {
                            yAxes: [
                                {
                                    id: 'y-axis-1',
                                    type: 'linear',
                                    position: 'left',
                                    ticks: {
                                        beginAtZero: true,
                                    },
                                },
                                {
                                    id: 'y-axis-2',
                                    type: 'linear',
                                    position: 'right',
                                    ticks: {
                                        beginAtZero: true,
                                    }
                                }
                            ]
                        }
                    }
                }
            );
        })
        ();

    </script>
    <script>

        (async function () {

            var colors = [];
            @for($i = 0; $i <= $categories->count(); $i++)
            colors.push('rgba({{rand(0,255)}}, {{rand(0,255)}}, {{rand(0,255)}}, 0.5)');
            @endfor

            var ctxCategories = document.getElementById("products_categories");
            var myChart = new Chart(ctxCategories, {
                    type: 'doughnut',
                    data: {

                        labels: [@foreach($categories as $cat) "{{$cat->name}}", @endforeach "Without Category"],
                        datasets: [{

                            label: 'Categories',
                            data: [@foreach($categories as $cat) {{$cat->products->count()}}, @endforeach {{$nProductsWithoutCategory}}],

                            backgroundColor: colors,
                            borderColor: colors,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        //cutoutPercentage: 40,
                        responsive: true,

                    }
                })
            ;
        })();
    </script>
@endsection

