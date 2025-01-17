@extends('../template.settings_navbar')
@section('content_settings')
    <form class="divide-y divide-gray-200 dark:divide-gray-600 lg:col-span-9" action="#"
          method="POST">
        <!-- Orders section -->
        <div class="py-6 px-4 sm:p-6 lg:pb-8">
            <div class="flex justify-between">
                <div>
                    <h2 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-50">My
                        Prints</h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">All prints</p>
                </div>
                <div class="pb-4">
                    <a href="{{route('my_prints.create_own')}}" type="button"
                    class="inline-flex items-center justify-center rounded-md border border-gray-800 text-white bg-black px-4 py-2 text-sm font-medium shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-neutral-500 dark:focus:ring-neutral-800 sm:w-auto transition dark:bg-gray-700 dark:text-white dark:border-gray-700 dark:hover:bg-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                Add New Print
            </a>
                </div>
            </div>
            <div class="mt-4 grid grid-cols-12 gap-4">
                @foreach($products as $product)
                    <div
                        class="rounded-lg items-center col-span-12 md:col-span-6 border shadow dark:bg-gray-700 border-gray-200 dark:border-gray-600 justify-between p-3 w-full flex">
                        <div class="ps-3 py-2">
                            <div>
                                <div class="flex space-x-3 justify-items-center">
                                    <p class="text-xl text-bold">{{$product->name}}</p>
                                    <form hidden></form>
                                    <form id="delete"
                                    action="{{route('my_prints.destroy', ['my_print' => $product])}}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="flow-root flex-shrink-0 mt-1">
                                        <button type="submit"
                                            class="-m-2.5 flex items-center justify-center bg-white dark:bg-gray-700 rounded-lg p-2.5 text-gray-400 hover:text-gray-500">
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
                                <p class="text-sm mt-1 text-gray-500">Print #{{$product->id}}</p>
                            </div>
                            <div class="mt-4 flex-1">
                                <a  href="{{  route('products.show', ['product' => $product]) }}"
                                   class="text-blue-500 pr-2 hover:text-blue-600 border-r-2 border-gray-200">View Print</a>
                                <a href="{{route('my_prints.edit', ['my_print' => $product])}}"
                                   class="pl-2 text-blue-500 hover:text-blue-600">Update Print</a>
                            </div>

                        </div>
                        <div class="flex items-end">
                            <div class="w-24 h-24 overflow-hidden rounded-lg border"
                                 style="background-color:#ffffff">
                                <div
                                    class="group h-30 aspect-w-1 aspect-h-1 overflow-hidden transition group-hover:opacity-90 animate-fade-in duration-500 transform group-hover:scale-110">
                                    <img src="{{asset('storage/tshirt_images/' . $product->image_url)}}"
                                         class="h-24 w-24 p-2 flex-none rounded-md object-scale-down object-center">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </form>
@endsection
