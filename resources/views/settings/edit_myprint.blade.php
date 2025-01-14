@extends('../Template.settings_navbar')
@section('content_settings')
    <main class="col-span-9 px-6 pb-8">
        <!-- Product -->
        <div>
            <form id="edit_product"  action="{{route('my_prints.update', ['my_print' => $product])}}" method="POST" enctype="multipart/form-data">
                <div class="grid-cols-12 grid gap-4">                 @csrf
                    @method('PUT')
                    @csrf
                    <!-- Product details -->
                    <div class="w-full col-span-8">
                        <div class="mt-4">
                            <div class="w-full">
                                <label for="name"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name:</label>
                                <input type="text" name="name" id="name" value="{{$product->name}}"
                                       class="bg-gray-50 border w-full border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                       required>
                            </div>
                        </div>
                        <div class="w-full mt-2">
                            <label for="description"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description:</label>
                            <textarea type="text" name="description" id="description"
                                      class="bg-gray-50 border w-full border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                      requiredcols="10" rows="3">{{$product->description}}</textarea>
                        </div>
                        <div class="w-full mt-2">
                            <label for="category"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category:</label>
                            <select style="max-height: 200px" name="category" id="category" class="max-h-20 overflow-y-auto bg-gray-50 border w-full border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <option value="0" selected>None</option>
                                @foreach($categories as $cat)
                                    <option @if($product->category_id == $cat->id) selected @endif value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{route('my_prints.index')}}" type="button"
                               class="inline-block mt-4 w-full rounded-lg border border-transparent bg-gray-200 text-black py-3 px-8 text-center font-medium hover:bg-gray-300 transition duration-300">
                                Cancel
                            </a>
                            <button form="edit_product" type="submit"
                                    class="inline-block mt-4 w-full rounded-lg border border-transparent bg-blue-600 py-3 px-8 text-center font-medium text-white hover:bg-blue-700 transition duration-300">
                                Edit
                            </button>
                        </div>
                    </div>

                    <!-- Product image -->
                    <div class="mt-10 col-span-4">
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-200" aria-hidden="true">
                            Photo:</p>
                         <img class="relative h-full w-full p-1 object-center rounded object-scale-down"
                                 id="user_img"
                                 src="{{asset('storage/tshirt_images/' . $product->image_url)}}"
                                 alt="{{$product->name}}">
                        @error('image_url')
                        <div class="text-red-600 mt-1 text-md font-bold">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </form>
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