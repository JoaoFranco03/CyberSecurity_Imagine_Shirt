@extends('../template.settings_navbar')
@section('content_settings')
    @php
        $user = auth()->user();
        $customer = $user->customer;
    @endphp
    <form class="divide-y divide-gray-200 dark:divide-gray-600 lg:col-span-9"
          action="{{route('users.update', ['user' => $user])}}" method="POST">
        @method('PUT')
        @csrf
        <!-- Shipping section -->
        <div class="py-6 px-4 sm:p-6 lg:pb-8">
            <div>
                <h2 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-50">
                    Shipping</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">This information will
                    not be displayed publicly</p>
            </div>

            <div class="mt-6 flex flex-col lg:flex-row">
                <div class="flex-grow space-y-6">
                    <div>
                        <label for="reference"
                               class="block text-sm font-medium text-gray-700 dark:text-gray-200">Default
                            Shipping Address:</label>
                        <div class="mt-1">
                            <input name="customer" hidden value="Shipping">
                            <input type="text" name="address" id="address"
                                   autocomplete="address"
                                   class="block dark:bg-gray-800 w-full min-w-0 flex-grow rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                   value="{{$customer->address}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Privacy section -->
        <div>
            <div class="mt-4 flex justify-end py-4 px-4 sm:px-6">
                <button type="submit"
                        class="ml-5 inline-flex justify-center rounded-md border border-transparent bg-blue-700 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Save
                </button>
            </div>
        </div>
    </form>
@endsection
