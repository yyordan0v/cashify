<ul class="grid w-full gap-2 md:grid-cols-2 mt-2">
    <li>
        <input type="radio" id="hosting-small" name="hosting" value="hosting-small" class="hidden peer" required/>
        <label for="hosting-small"
               class="inline-flex items-center justify-center w-full p-2 shadow-sm border rounded-lg cursor-pointer transition-colors duration-200 text-gray-500 dark:text-gray-400 bg-transparent dark:dark:bg-neutral-900/50 border-gray-300 dark:border-gray-500 peer-checked:text-gray-600 dark:peer-checked:text-gray-200 peer-checked:bg-white/60 dark:peer-checked:bg-gray-700 peer-checked:border-gray-600 dark:peer-checked:border-gray-700 hover:text-gray-600 dark:hover:text-gray-200 hover:border-gray-400 hover:bg-white/40 hover:dark:bg-gray-700/50">
            <div class="block">
                <div class="w-full">Expense</div>
            </div>
            <x-icon class="text-red-500 mt-1">
                arrow_drop_down
            </x-icon>
        </label>
    </li>
    <li>
        <input type="radio" id="hosting-big" name="hosting" value="hosting-big" class="hidden peer">
        <label for="hosting-big"
               class="inline-flex items-center justify-center w-full p-2 shadow-sm border rounded-lg cursor-pointer transition-colors duration-200 text-gray-500 dark:text-gray-400 bg-transparent dark:dark:bg-neutral-900/50 border-gray-300 dark:border-gray-500 peer-checked:text-gray-600 dark:peer-checked:text-gray-200 peer-checked:bg-white/60 dark:peer-checked:bg-gray-700 peer-checked:border-gray-600 dark:peer-checked:border-gray-700 hover:text-gray-600 dark:hover:text-gray-200 hover:border-gray-400 hover:bg-white/40 hover:dark:bg-gray-700/50">
            <div class="block">
                <div class="w-full">Income</div>
            </div>
            <x-icon class="text-emerald-500 mt-1">
                arrow_drop_up
            </x-icon>
        </label>
    </li>
</ul>
