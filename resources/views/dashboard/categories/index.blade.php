@extends('../template.dashboard_navbar')

@section('content')
@include('layouts.partials.messages')
    <div id="color-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="fixed inset-0 bg-gray-500 dark:bg-black dark:bg-opacity-50 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0" x>
                <div
                    class="relative transform overflow-hidden rounded-xl bg-white dark:bg-gray-800 px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">

                    <form id="add_category_form" action="{{route('categories.store')}}" method="POST">
                        @csrf
                        <div class="">
                            <div class="mt-3 text-center sm:mt-0 sm:text-left">
                                <div>
                                    <label for="id"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Name:</label>
                                    <input type="text" name="name" id="name"
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
                            <button form="add_category_form" type="submit"
                                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-blue-600 px-8 py-2 text-base font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                                Add
                            </button>
                            <button type="button" data-modal-hide="color-modal"
                                    class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 sm:mt-0 sm:w-auto sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <main class="flex-1">
        <div>
            <div class="py-6 rounded-tl-xl">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-xl font-semibold text-gray-900 dark:text-white">Categories</h1>
                            <p class="mt-2 text-sm text-gray-700 dark:text-gray-400">A list of all the Categories of the
                                Store.
                            </p>
                        </div>
                        <div class="mt-4 flex items-center space-x-2">
                            <form id="filters_form" action="{{route('categories.index')}}" method="GET">
                                @csrf
                                <div class="flex w-full space-x-2">
                                    <div class="flex items-center w-80 my-4 border-r pr-2">
                                        <p
                                        class="whitespace-nowrap justify-center text-sm font-medium me-2 text-gray-700 dark:text-gray-100">
                                        Sort By:
                                    </p>
                                        <select type="text" id="table-search" name="sort" form="filters_form"
                                               class="block p-2 pl-4 text-sm text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="this.form.submit()">
                                               <option value="ID_1to2" @if($sort == "ID_1to2")selected @endif>ID: Lowest to Biggest</option>
                                               <option value="ID_2to1" @if($sort == "ID_2to1")selected @endif>ID: Biggest to Lowest</option>
                                               <option value="A_Z" @if($sort == "A_Z")selected @endif>Name: A to Z</option>
                                               <option value="Z_A" @if($sort == "Z_A")selected @endif>Name: Z to A</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <button id="Add_new_color" type="button" data-modal-target="color-modal"
                                    data-modal-toggle="color-modal"
                                    class="inline-flex items-center h-10  justify-center rounded-md border border-gray-800 text-white bg-black px-4 py-2 text-sm font-medium shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-neutral-500 dark:focus:ring-neutral-800 w-full transition dark:bg-gray-800 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                                </svg>
                                Add New Category
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div
                                    class="overflow-hidden shadow ring-1 ring-black dark:ring-white dark:ring-opacity-10 ring-opacity-5 md:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead class="bg-gray-50 dark:bg-gray-800 rounded-xl">
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                <input type="checkbox" name="" id="" class="h-4 w-4 rounded border-gray-300 dark:boder-gray-400 text-blue-600 dark:bg-gray-500 bg-white focus:ring-blue-500 transition duration-250
                                                ease-in-out">
                                            </th>
                                            <th scope="col"
                                                class="py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                                ID
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">
                                                Name
                                            </th>
                                            <th scope="col" class="relative py-3.5">
                                                <span class="sr-only">Delete</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach ($categories as $category)
                                            <tr x-data="{ checked: false }"
                                                :class="{ 'bg-blue-50 dark:bg-blue-950/50 transition duration-100': checked }">
                                                <td
                                                    class="whitespace-nowrap pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                    <input type="checkbox" name="" id="" class="h-4 w-4 rounded border-gray-300 dark:boder-gray-400 text-blue-600 dark:bg-gray-500 bg-white focus:ring-blue-500 transition duration-250
                                                ease-in-out" x-model="checked">
                                                </td>
                                                <td class="px-3 py-4 text-sm text-gray-900 dark:text-gray-300">
                                                    {{$category->id}}
                                                </td>
                                                <td class="px-3 py-4 text-sm text-gray-500 dark:text-gray-300">
                                                    {{$category->name}}</td>
                                                <td
                                                    class="px-3 py-4">
                                                    <div class=" space-x-2 flex justify-end">
                                                            <a href="{{route('categories.edit', ['category' => $category])}}" type="button"
                                                                    class="inline-flex items-center justify-center rounded-md border-transparent bg-yellow-50 dark:bg-yellow-950 dark:hover:bg-yellow-900 border-yellow-600 ring-1 ring-inset ring-yellow-700/10 dark:ring-yellow-600/25 px-4 py-1 text-sm font-medium text-yellow-700 dark:text-yellow-300 shadow-sm hover:bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 sm:w-auto transition">Edit</a>
                                                        <form action="{{ route('categories.destroy', ['category' => $category]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="inline-flex items-center justify-center rounded-md border-transparent bg-red-50 dark:bg-red-950 dark:hover:bg-red-900 border-red-600 ring-1 ring-inset ring-red-700/10 dark:ring-red-600/25 px-4 py-1 text-sm font-medium text-red-700 dark:text-red-300 shadow-sm hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:w-auto transition">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- More people... -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pt-14 mx-auto">
                                    {{ $categories->withQueryString()->links('pagination::tailwind') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /End replace -->
            </div>
        </div>
    </main>
    @if($errors->any()&&!$errors->error)
        <script>
            window.onload = function () {
                document.getElementById('Add_new_color').click()
            }
        </script>
    @endif
@endsection
