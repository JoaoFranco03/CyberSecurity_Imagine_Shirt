@extends('../Template.settings_navbar')
@section('content_settings')
                            @php
                                $user = auth()->user();
                                $customer = $user->customer;
                            @endphp
                            <form class="divide-y divide-gray-200 dark:divide-gray-600 lg:col-span-9"
                                  action="{{route('users.update', ['user' => $user])}}" method="POST">
                                @method('PUT')
                                @csrf
                                <!-- Billing section -->
                                <input name="customer" hidden value="Billing">
                                <div class="py-6 px-4 sm:p-6 lg:pb-8">
                                    <div>
                                        <h2 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-50">
                                            Billing</h2>
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">This information will
                                            not be displayed publicly</p>
                                    </div>

                                    <div class="mt-6 flex flex-col lg:flex-row">
                                        <div class="flex-grow space-y-6">
                                            <div>
                                                <label for="default_payment_type"
                                                       class="block text-sm font-medium text-gray-700 dark:text-gray-200">Default
                                                    Payment Type:</label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <select type="text" name="default_payment_type"
                                                            id="default_payment_type" autocomplete="input"
                                                            class="block dark:bg-gray-800 w-full min-w-0 flex-grow rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                                            value="123456789">
                                                        <option @if ($customer->default_payment_type == 'VISA') selected
                                                                @endif value="VISA">VISA
                                                        </option>
                                                        <option @if ($customer->default_payment_type == 'MC') selected
                                                                @endif value="MC">Mastercard
                                                        </option>
                                                        <option
                                                            @if ($customer->customer?->default_payment_type == 'PAYPAL') selected
                                                            @endif value="PAYPAL">PAYPAL
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="reference"
                                                       class="block text-sm font-medium text-gray-700 dark:text-gray-200">Reference:</label>
                                                <div class="mt-1">
                                                    <input type="text" name="default_payment_ref" id="reference"
                                                           autocomplete="name"
                                                           class="block dark:bg-gray-800 w-full min-w-0 flex-grow rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                                           value="{{$customer->default_payment_ref}}">
                                                </div>
                                            </div>
                                            <div>
                                                <label for="reference"
                                                       class="block text-sm font-medium text-gray-700 dark:text-gray-200">NIF:</label>
                                                <div class="mt-1">
                                                    <input type="text" name="nif" id="nif" autocomplete="name"
                                                           class="block dark:bg-gray-800 w-full min-w-0 flex-grow rounded-md border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                                           value="{{$customer->nif}}">
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
    <script>
        function handlePaymentTypeChange(selectElement) {
            const inputElement = document.getElementById('name');
            const selectedOption = selectElement.value;

            if (selectedOption === 'PAYPAL') {
                inputElement.type = 'email';
                inputElement.setAttribute('required', 'required');
                inputElement.removeAttribute('pattern');
            } else if (selectedOption === 'VISA') {
                inputElement.type = 'text';
                inputElement.setAttribute('required', 'required');
                inputElement.setAttribute('pattern', '^4\\d{12}(\\d{3})?$');
            } else if (selectedOption === 'MC') {
                inputElement.type = 'text';
                inputElement.setAttribute('required', 'required');
                inputElement.setAttribute('pattern', '^5[1-5]\\d{14}$');
            } else {
                inputElement.type = 'text';
                inputElement.removeAttribute('required');
                inputElement.removeAttribute('pattern');
            }
        }
    </script>
@endsection
