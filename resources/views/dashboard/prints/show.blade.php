@extends('../Template.dashboard_navbar')
@section('content')
    <main>
        <!-- Product -->
        <div>
            <div
                class="mx-auto max-w-2xl px-4 pb-10 sm:px-6 pt-6 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8 w-full">
                <!-- Product details -->
                <div class="lg:max-w-lg lg:self-end">
                    <div class="mt-4">
                        <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl dark:text-white">{{$product->name}}</h1>
                        <h1 class=" text-gray-500 my-2 dark:text-white">Created at: {{ \Carbon\Carbon::parse($product->created_at)->format('d/m/Y')}}</h1>
                    </div>

                    <section aria-labelledby="information-heading" class="mt-4">
                        <h2 id="information-heading" class="sr-only">Product information</h2>
                        <div class="mt-4 space-y-6">
                            <p class="text-base text-gray-500 dark:text-gray-400">{{$product->description}} <br>
                                {{$product->extra_info}}</p>

                        </div>
                    </section>
                </div>

                <!-- Product image -->
                <div class="mt-10 lg:col-start-2 lg:row-span-2 lg:mt-0 lg:self-center">
                    <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg bg-white border">
                        <img src="{{asset('storage/tshirt_images/' . $product->image_url)}}"
                             alt="Light green canvas bag with black straps, handle, front zipper pouch, and drawstring top."
                             class="h-full w-full p-4 object-scale-down object-center">
                    </div>
                </div>

                <!-- Product form -->
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
