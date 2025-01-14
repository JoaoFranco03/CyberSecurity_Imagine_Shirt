@extends('../Template.dashboard_navbar')

@section('content')
<main class="flex-1">
    <div class="py-6 rounded-tl-xl">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
        <!-- Replace with your content -->
        <div class="sm:flex sm:items-center">
          <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900 dark:text-white">Prices</h1>
            <p class="mt-2 text-sm text-gray-700 dark:text-gray-400">A list of all the Prices of the Store.
            </p>
          </div>
        </div>
        <div class="mt-8 flex flex-col">
          <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

              <div class="grid grid-cols-12 gap-6">
                <form class="col-span-12 space-y-3" action="{{route("prices.update", ['price'=> $price])}}"
                  method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="col-span-12">
                    <label for="unit_price_catalog"
                      class="block text-sm font-medium text-gray-700 dark:text-gray-200">Unit price catalog:</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <input type="number" min="0" step="any" name="unit_price_catalog" id="unit_price_catalog"
                        class="block dark:bg-gray-800 w-full min-w-0 flex-grow rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:text-white"
                        value="{{$price->unit_price_catalog}}">
                    </div>
                  </div>
                  @error('unit_price_catalog')
                  <div class="text-red-600 mt-1 text-md font-bold">
                    {{ $message }}
                  </div>
                  @enderror

                  <div class="col-span-12">
                    <label for="unit_price_own" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Unit
                      price own:</label>
                    <input type="number" min="0" step="any" name="unit_price_own" id="unit_price_own"
                      autocomplete="input"
                      class="mt-1 block dark:bg-gray-800 w-full min-w-0 flex-grow rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:text-white"
                      value="{{$price->unit_price_own}}">
                  </div>
                  @error('unit_price_own')
                  <div class="text-red-600 mt-1 text-md font-bold">
                    {{ $message }}
                  </div>
                  @enderror

                  <div class="col-span-12">
                    <label for="unit_price_catalog_discount"
                      class="block text-sm font-medium text-gray-700 dark:text-gray-200">Unit price catalog
                      discount:</label>
                    <input min="0" step="any" type="number" name="unit_price_catalog_discount"
                      id="unit_price_catalog_discount"
                      class="mt-1 block dark:bg-gray-800 w-full min-w-0 flex-grow rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:text-white"
                      value="{{$price->unit_price_catalog_discount}}">
                  </div>
                  @error('unit_price_catalog_discount')
                  <div class="text-red-600 mt-1 text-md font-bold">
                    {{ $message }}
                  </div>
                  @enderror

                  <div class="col-span-12">
                    <label for="unit_price_own_discount"
                      class="block text-sm font-medium text-gray-700 dark:text-gray-200">Unit price own
                      discount:</label>
                    <input type="number" min="0" step="any" name="unit_price_own_discount" id="unit_price_own_discount"
                      class="mt-1 block dark:bg-gray-800 w-full min-w-0 flex-grow rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:text-white"
                      value="{{$price->unit_price_own_discount}}">
                  </div>
                  @error('unit_price_own_discount')
                  <div class="text-red-600 mt-1 text-md font-bold">
                    {{ $message }}
                  </div>
                  @enderror


                  <div class="col-span-12">
                    <label for="unit_price_own_discount"
                      class="block text-sm font-medium text-gray-700 dark:text-gray-200">Quantity
                      discount:</label>
                    <input type="number" min="1" step="any" name="qty_discount" id="qty_discount"
                      class="block mt-1 dark:bg-gray-800 w-full min-w-0 flex-grow rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:text-white"
                      value="{{$price->qty_discount}}">
                  </div>
                  @error('qty_discount')
                  <div class="text-red-600 mt-1 text-md font-bold">
                    {{ $message }}
                  </div>
                  @enderror
                  <!-- Privacy section -->
                  <div>
                    <div class="mt-4 flex justify-end py-4">
                      <button type="submit"
                        class="ml-5 inline-flex justify-center rounded-md border border-transparent bg-blue-700 py-2 px-8 text-sm font-medium text-white shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Save
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /End replace -->
    </div>
</main>
@endsection