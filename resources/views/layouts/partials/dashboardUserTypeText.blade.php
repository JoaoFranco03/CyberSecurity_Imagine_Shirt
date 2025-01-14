@if (auth()->user()->user_type == "A")
<p class="text-xs text-gray-500 dark:text-gray-300">Administrator</p>
@elseif (auth()->user()->user_type == "E")
<p class="text-xs text-gray-500 dark:text-gray-300">Employee</p>
@endif
