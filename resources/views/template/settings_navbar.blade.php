@if(Auth::user()->user_type == 'A')
    @php $pageToExtend = '../Template.dashboard_navbar'; @endphp
@else
    @php $pageToExtend = '../Template.store_navbar'; @endphp
@endif
@extends($pageToExtend)

@php
    if(!isset($page))
        {
            $page = 'Account';
        }
@endphp

@section('content')
    @include('layouts.partials.messages')

    <main class="overflow-x-hidden">
        <div>
            <div class="relative overflow-hidden bg-blue-700 pb-32">
                <!-- Menu open: "bottom-0", Menu closed: "inset-y-0" -->
                <div aria-hidden="true"
                     class="inset-y-0 absolute inset-x-0 left-1/2 w-full -translate-x-1/2 transform overflow-hidden lg:inset-y-0">
                    <div class="absolute inset-0 flex">
                        <div
                            class="h-full w-full bg-gradient-to-tl from-blue-100 via-blue-300 to-blue-500 dark:from-blue-700 dark:via-blue-800 dark:to-gray-900"></div>
                    </div>
                </div>
                <header class="relative py-10">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <h1 class="text-3xl font-bold tracking-tight text-white">Settings</h1>
                    </div>
                </header>
            </div>

            <main class="relative -mt-32">
                <div class="mx-auto max-w-screen-xl px-4 pb-6 sm:px-6 lg:px-8 lg:pb-16">
                    <div class="overflow-hidden rounded-lg bg-white dark:bg-gray-800 shadow-xl">
                        <div
                            class="divide-y divide-gray-200 dark:divide-gray-600 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
                            <aside class="py-6 lg:col-span-3">
                                <nav class="space-y-1">
                                    <!-- Current: "bg-blue-50 border-blue-500 text-blue-700 hover:bg-blue-50 hover:text-blue-700", Default: "border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900" -->
                                    <a href="{{ route('users.edit', ['user' => Auth::user()]) }}"
                                       class="@if($page == 'Account') bg-blue-50 dark:text-blue-300 dark:bg-blue-950 border-blue-500 text-blue-700 group border-l-4 px-3 py-2 flex items-center text-sm font-medium
                                        @else border-transparent text-gray-900 dark:text-gray-300 dark:hover:text-gray-50 hover:bg-gray-50 dark:hover:bg-gray-700/20 hover:text-gray-900 group border-l-4 px-3 py-2 flex items-center text-sm font-medium
                                       @endif"
                                       aria-current="page">
                                        <svg
                                            class="@if($page == 'Account')text-blue-500 group-hover:text-blue-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6 @else text-gray-400 dark:text-gray-300 group-hover:text-gray-500 dark:group-hover:text-gray-50 flex-shrink-0 -ml-1 mr-3 h-6 w-6 @endif"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <span class="truncate">Account</span>
                                    </a>
                                    @if(Auth::user()->user_type == 'C')
                                        <a href="{{route('settings.billing')}}"
                                           class="@if($page == 'Billing') bg-blue-50 dark:text-blue-300 dark:bg-blue-950 border-blue-500 text-blue-700 group border-l-4 px-3 py-2 flex items-center text-sm font-medium
                                        @else border-transparent text-gray-900 dark:text-gray-300 dark:hover:text-gray-50 hover:bg-gray-50 dark:hover:bg-gray-700/20 hover:text-gray-900 group border-l-4 px-3 py-2 flex items-center text-sm font-medium
                                       @endif">
                                            <!-- Heroicon name: outline/credit-card -->
                                            <svg
                                                class="@if($page == 'Billing')text-blue-500 group-hover:text-blue-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6 @else text-gray-400 dark:text-gray-300 group-hover:text-gray-500 dark:group-hover:text-gray-50 flex-shrink-0 -ml-1 mr-3 h-6 w-6 @endif"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"/>
                                            </svg>
                                            <span class="truncate">Billing</span>
                                        </a>

                                        <a href="{{route('settings.shipping')}}"
                                           class="@if($page == 'Shipping') bg-blue-50 dark:text-blue-300 dark:bg-blue-950 border-blue-500 text-blue-700 group border-l-4 px-3 py-2 flex items-center text-sm font-medium
                                        @else border-transparent text-gray-900 dark:text-gray-300 dark:hover:text-gray-50 hover:bg-gray-50 dark:hover:bg-gray-700/20 hover:text-gray-900 group border-l-4 px-3 py-2 flex items-center text-sm font-medium
                                       @endif">
                                            <!-- Heroicon name: outline/credit-card -->
                                            <svg
                                                class="@if($page == 'Shipping')text-blue-500 group-hover:text-blue-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6 @else text-gray-400 dark:text-gray-300 group-hover:text-gray-500 dark:group-hover:text-gray-50 flex-shrink-0 -ml-1 mr-3 h-6 w-6 @endif"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>
                                            </svg>
                                            <span class="truncate">Shipping</span>
                                        </a>


                                        <a href="{{route('orders.index')}}"
                                           class="@if($page == 'Orders') bg-blue-50 dark:text-blue-300 dark:bg-blue-950 border-blue-500 text-blue-700 group border-l-4 px-3 py-2 flex items-center text-sm font-medium
                                        @else border-transparent text-gray-900 dark:text-gray-300 dark:hover:text-gray-50 hover:bg-gray-50 dark:hover:bg-gray-700/20 hover:text-gray-900 group border-l-4 px-3 py-2 flex items-center text-sm font-medium
                                       @endif">
                                            <!-- Heroicon name: outline/credit-card -->
                                            <svg
                                                class="@if($page == 'Orders')text-blue-500 group-hover:text-blue-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6 @else text-gray-400 dark:text-gray-300 group-hover:text-gray-500 dark:group-hover:text-gray-50 flex-shrink-0 -ml-1 mr-3 h-6 w-6 @endif"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                                            </svg>
                                            <span class="truncate">My Orders</span>
                                        </a>

                                        <a href="{{route('my_prints.index')}}"
                                           class="@if($page == 'Prints') bg-blue-50 dark:text-blue-300 dark:bg-blue-950 border-blue-500 text-blue-700 group border-l-4 px-3 py-2 flex items-center text-sm font-medium
                                        @else border-transparent text-gray-900 dark:text-gray-300 dark:hover:text-gray-50 hover:bg-gray-50 dark:hover:bg-gray-700/20 hover:text-gray-900 group border-l-4 px-3 py-2 flex items-center text-sm font-medium
                                       @endif">
                                       <svg class="@if($page == 'Prints')text-blue-500 group-hover:text-blue-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6 @else text-gray-400 dark:text-gray-300 group-hover:text-gray-500 dark:group-hover:text-gray-50 flex-shrink-0 -ml-1 mr-3 h-6 w-6 @endif" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M14.5135 5.00008L17.1201 2.39348C17.5106 2.00295 18.1438 2.00295 18.5343 2.39348L22.777 6.63612C23.1675 7.02664 23.1675 7.65981 22.777 8.05033L18.9988 11.8285V21.0001C18.9988 21.5524 18.5511 22.0001 17.9988 22.0001H5.9988C5.44652 22.0001 4.9988 21.5524 4.9988 21.0001V11.8285L1.22063 8.05033C0.830103 7.65981 0.830103 7.02664 1.22063 6.63612L5.46327 2.39348C5.85379 2.00295 6.48696 2.00295 6.87748 2.39348L9.48408 5.00008H14.5135ZM15.3419 7.00008H8.65566L6.17037 4.5148L3.34195 7.34323L6.9988 11.0001V20.0001H16.9988V11.0001L20.6557 7.34323L17.8272 4.5148L15.3419 7.00008Z"></path></svg>
                                            <span class="truncate">My Prints</span>
                                        </a>
                                    @endif
                                </nav>
                            </aside>
                            @yield('content_settings')
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </main>
@endsection
