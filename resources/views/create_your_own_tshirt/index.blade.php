@extends('../Template.store_navbar')
@section('content')
    <div id="prints-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="fixed inset-0 bg-gray-500 dark:bg-black dark:bg-opacity-50 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-xl bg-white dark:bg-gray-800 px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-6xl sm:p-6">
                    <div class="flex justify-between items-center justify-items-center mb-4">
                        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl">Store Prints:</h1>
                        <button type="button"  data-modal-hide="prints-modal"
                        class="flex items-center justify-center bg-white dark:bg-gray-800 rounded-lg p-2.5 text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Remove</span>
                            <!-- Heroicon name: mini/trash -->
                            <svg class="h-10 w-10"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="grid grid-cols-6 md:grid-cols-12 gap-4">
                        @foreach ($products as $product)
                            <a type="button"  data-modal-hide="prints-modal" class="col-span-2 border aspect-1 rounded bg-gray-200 dark:bg-gray-700 dark:border-gray-600"
                                 onclick="add_canvas(document.getElementById('img_{{$product->id}}'))">
                                <img id="img_{{$product->id}}"
                                     src="{{asset('storage/tshirt_images/' . $product->image_url)}}"
                                     class="p-3 h-full w-full object-contain">
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 mt-5">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 md:col-span-3 rounded-lg bg-gray-100 dark:bg-gray-800 p-4">
                <form id="own_tshirt_form" action="{{route("my_prints.store")}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="image" id="id_img">
                    <div class="justify-center justify-items-center items-center">
                        <div class="pb-4 border-b">
                            <div class="flex items-center justify-center w-full">
                                <label for="tshirt-custompicture"
                                       class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                             stroke="currentColor" viewBox="0 0 24 24"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 font-semibold">Click to
                                            upload your print</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">JPG or PNG (MAX. 5MB)</p>
                                    </div>
                                    <input id="tshirt-custompicture" name="image_url" type="file" class="hidden"/>
                                </label>
                            </div>
                            <p class="text-center my-2">Or</p>
                            <button type="button" data-modal-target="prints-modal" data-modal-toggle="prints-modal"
                                    class="inline-block w-full rounded-lg border border-transparent hover:shadow-lg hover:shadow-indigo-600/50 bg-indigo-600 py-3 px-8 text-center font-medium text-white hover:bg-indigo-700 transition duration-300">
                                Choose from Catalog
                            </button>
                        </div>
                        <div class="pt-4">
                            <label for="tshirt-color"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color
                                Preview:</label>
                            <select id="tshirt-color"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach($colors as $color)
                                    <option value="#{{$color->code}}" @if($color->code == $default_color->code) selected
                                        @endif>{{$color->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="pt-4">
                            <label for="name"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name:</label>
                            <input type="text" name="name" id="name"
                                   class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="pt-4">
                            <label for="description"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description:</label>
                            <textarea type="text" name="description" id="description"
                                      class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        </div>
                        <div class="pt-4">
                            <input type="hidden" name="canvas_image" id="canvas_image" value="">
                            <button type="button" onclick="submitForm()"
                                    class="inline-block w-full rounded-lg border border-transparent hover:shadow-lg hover:shadow-blue-600/50 bg-blue-600 py-3 px-8 text-center font-medium text-white hover:bg-blue-700 transition duration-300">
                                Add to My Prints
                            </button>

                        </div>
                    </div>
                </form>
            </div>
            <div class="col-span-12 md:col-span-9 rounded-lg">
                <div class="w-full py-7 rounded-t-lg flex justify-center bg-white">
                        <div class="tshirt-div" id="tshirt-div" style="background-color: #{{$default_color->code}}">
                            <img src="https://cdn.ourcodeworld.com/public-media/gallery/gallery-5d5afd3f1c7d6.png"
                                 alt="base shirt"/>
                            <div id="drawingArea"
                                 class="drawing-area absolute inset-0 flex items-center justify-center justify-items-center">
                                <div class=" w-full h-full relative "
                                     id="tshirt-canvas-container">
                                    <canvas id="tshirt-canvas"
                                    ></canvas>
                                    <input type="hidden" name="extra_info">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="w-full rounded-b-lg bg-white text-center flex space-x-2 justify-center p-2">
                    <button id="delete-button"
                            class="w-full inline-block rounded-lg border border-transparent hover:shadow-lg hover:shadow-red-600/50 bg-red-600 py-3 px-8 text-center font-medium text-white hover:bg-red-700 transition duration-300">
                        Delete
                        Selected Image
                    </button>
                </div>
            </div>
        </div>
        <!-- Include Fabric.js in the page -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/2.3.3/fabric.min.js"></script>
        <script src="https://purl.eligrey.com/github/canvas-toBlob.js/blob/master/canvas-toBlob.js"></script>
        <script>
            let canvas;
            (async function () {
                $(document).ready(function () {
                    try {
                        // Initialize the Fabric.js
                        canvas = new fabric.Canvas('tshirt-canvas');

                        // Preview with the selected color
                        document.getElementById("tshirt-color").addEventListener("change", function () {
                            document.getElementById("tshirt-div").style.backgroundColor = this.value;
                        }, false);

                        //Make Canvas Responsive
                        canvas.setHeight(document.getElementById("drawingArea").clientHeight);
                        canvas.setWidth(document.getElementById("drawingArea").clientWidth);

                        //Remove using delete key
                        document.addEventListener("keydown", function (e) {
                            var keyCode = e.keyCode;

                            if (keyCode == 46) {
                                console.log("Removing selected element on Fabric.js on DELETE key !");
                                canvas.remove(canvas.getActiveObject());
                            }
                        }, false);

                        //Remove using delete button on GUI
                        document.getElementById('delete-button').addEventListener("click", function () {
                            var activeObject = canvas.getActiveObject();

                            if (activeObject) {
                                console.log("Removing selected element on Fabric.js with delete button !");
                                canvas.remove(activeObject);
                            }
                        }, false);

                        // Add a picture
                        document.getElementById('tshirt-custompicture').addEventListener("change", function (e) {
            var reader = new FileReader();

            reader.onload = function (event) {
                var imgObj = new Image();
                imgObj.src = event.target.result;

                // When the picture loads, create the image in Fabric.js
                imgObj.onload = function () {
                    var img = new fabric.Image(imgObj);

                    img.scaleToHeight(300);
                    img.scaleToWidth(300);
                    canvas.centerObject(img);
                    canvas.add(img);
                    canvas.renderAll();
                };
            };

            // If the user selected a picture, load it
            if (e.target.files[0]) {
                reader.readAsDataURL(e.target.files[0]);
            }
        }, false);

                        canvas.on('object:moved', function (event) {
                            var obj = canvas.getActiveObject();
                            var data = {}
                            data['left'] = obj.left;
                            data['top'] = obj.top;
                            $('input[name=extra_info]').val(JSON.stringify(data));
                        });
                    } catch (e) {
                        console.log(e);
                    }
                })
            })();
        </script>
        <script>
            function add_canvas(x) {
                var reader = new FileReader();
                var img;
                var imgObj = new Image();
                imgObj.src = x.src;

                // When the picture loads, create the image in Fabric.js
                imgObj.onload = function () {
                    img = new fabric.Image(imgObj);

                        const targetWidth = document.getElementById("drawingArea").clientWidth;
                        img.scaleToWidth(targetWidth, true);
                        img.hasControls = true;
                        canvas.add(img);
                        canvas.renderAll();
                    }
            }

            function submitForm() {
                canvas.discardActiveObject().renderAll();
                var canvas_element = document.getElementById('tshirt-canvas');
                var input_img = document.getElementById("tshirt-custompicture");

                var dataURL = canvas_element.toDataURL({format: 'png'});
                document.getElementById('id_img').value = dataURL;

                input_img.src = dataURL

                // Create a new FormData object
                document.getElementById("own_tshirt_form").submit();
            }

            function dataURLToBlob(dataURL) {
                var parts = dataURL.split(';base64,');
                var contentType = parts[0].split(':')[1];
                var byteCharacters = atob(parts[1]);
                var byteNumbers = new Array(byteCharacters.length);
                for (var i = 0; i < byteCharacters.length; i++) {
                    byteNumbers[i] = byteCharacters.charCodeAt(i);
                }
                var byteArray = new Uint8Array(byteNumbers);
                return new Blob([byteArray], {type: contentType});
            }

        </script>

    </main>
    </form>
@endsection
