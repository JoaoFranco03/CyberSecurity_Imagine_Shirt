@if ($user->user_type == "A")
<span
  class="inline-flex items-center rounded-md bg-yellow-50 dark:bg-yellow-950 px-2 py-1 text-xs font-medium text-yellow-700 dark:text-amber-200 ring-1 ring-inset ring-yellow-700/10 dark:ring-yellow-600/25">
  <span class="relative flex h-3 w-3 mr-2">
    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
    <span class="relative inline-flex rounded-full h-3 w-3 bg-yellow-500"></span>
  </span>Admin</span>
@elseif ($user->user_type == "E")
<span
  class="inline-flex items-center rounded-md bg-green-50 dark:bg-green-950 px-2 py-1 text-xs font-medium text-green-700 dark:text-green-300 ring-1 ring-inset ring-green-700/10 dark:ring-green-600/25">
  <span class="relative flex h-3 w-3 mr-2">
    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
    <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
  </span>Employee</span>
@elseif ($user->user_type == "C")
<span
  class="inline-flex items-center rounded-md bg-blue-50 dark:bg-blue-950 px-2 py-1 text-xs font-medium text-blue-700 dark:text-blue-300 ring-1 ring-inset ring-blue-700/10 dark:ring-blue-600/25">
  <span class="relative flex h-3 w-3 mr-2">
    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
    <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-500"></span>
  </span>
  Client
</span>
@endif