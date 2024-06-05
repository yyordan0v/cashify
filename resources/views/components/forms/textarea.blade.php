<textarea x-data="{
                    resize () {
                        $el.style.height = '0px';
                        $el.style.height = $el.scrollHeight + 'px'
                    }
                }"
          x-init="resize()"
          @input="resize()"
          type="text"
      {{ $attributes->merge(['class' => 'flex w-full h-auto min-h-[80px] px-3 py-2 text-sm bg-white border rounded-lg placeholder:text-neutral-400 disabled:cursor-not-allowed disabled:opacity-50 shadow-sm mt-2 border-gray-300 dark:border-gray-500 dark:bg-neutral-900/50 dark:text-white focus:border-gray-500 focus:ring-gray-500']) }}
>{{ $slot }}</textarea>
