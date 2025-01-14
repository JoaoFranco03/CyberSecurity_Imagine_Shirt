@extends('../Template.dashboard_navbar')
@section('content')
    <main>
        <!-- Product -->
        <div>
            <div
                class="mx-auto max-w-2xl px-4 pb-10 sm:px-6 pt-6 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8 w-full">
                <form id="add_color_form" action="{{route('categories.update', ['category' => $category])}}"
                      method="POST">
                    @csrf
                    @method('PUT')
                    <div class="">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left">
                            <div>
                                <label for="id"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                                    Name:</label>
                                <input type="text" name="name" id="name" placeholder="{{$category->name}}"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                       required>
                                @error('name')
                                <div class="text-red-600 mt-1 text-md font-bold">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                        <button type="submit"
                                class="inline-flex w-full justify-center rounded-md border border-transparent bg-blue-600 px-8 py-2 text-base font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                            Save
                        </button>
                        <a href="{{route('categories.index')}}" type="button" data-modal-hide="color-modal"
                           class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 sm:mt-0 sm:w-auto sm:text-sm">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>


        <script>
            // Get all radio buttons with the name "size-choice"
            const radioButtons = document.querySelectorAll('input[name="size-choice"]');

            // Add an event listener to each radio button
            radioButtons.forEach(function (radioButton) {
                radioButton.addEventListener('change', function () {
                    // Get the parent div of the radio button
                    const parentDiv = this.parentElement;

                    // Check if the radio button is checked
                    if (this.checked) {
                        // Add the class to the div
                        parentDiv.querySelector('div.pointer-events-none').classList.add('absolute', '-inset-px', 'rounded-full', 'border-2', 'border-blue-500');
                    } else {
                        // Remove the class from the div
                        parentDiv.querySelector('div.pointer-events-none').classList.remove('absolute', '-inset-px', 'rounded-full', 'border-2', 'border-blue-500');
                    }
                });
            });
        </script>
        <script>
            function changeImage(input) {
                // Get the value of the selected color
                var color = input.value;
                // Update the image source based on the selected color
                var image = document.getElementById("tshirt_image");
                image.src = "/storage/tshirt_base/" + color + ".jpg";
                image.alt = "T-Shirt in " + color;
            }
        </script>
    </main>
@endsection
