<div
    x-data="{
        text: '',
        textArray : ['Wealth, like a tree, grows from a tiny seed.', 'A part of all you earn is yours to keep.'],
        textIndex: 0,
        charIndex: 0,
        typeSpeed: 110,
        cursorSpeed: 550,
        pauseEnd: 1500,
        pauseStart: 20,
        direction: 'forward',
        typingInterval: null,
        cursorInterval: null
    }"
    x-init="$nextTick(() => {
        function startTyping(){
            let current = $data.textArray[ $data.textIndex ];
            if($data.charIndex > current.length){
                $data.direction = 'backward';
                clearInterval($data.typingInterval);
                $data.typingInterval = setTimeout(() => {
                    $data.typingInterval = setInterval(startTyping, $data.typeSpeed);
                }, $data.pauseEnd);
            }
            $data.text = current.substring(0, $data.charIndex);
            if($data.direction == 'forward') {
                $data.charIndex += 1;
            } else {
                if($data.charIndex == 0) {
                    $data.direction = 'forward';
                    clearInterval($data.typingInterval);
                    $data.typingInterval = setTimeout(() => {
                        $data.textIndex += 1;
                        if($data.textIndex >= $data.textArray.length) {
                            $data.textIndex = 0;
                        }
                        $data.typingInterval = setInterval(startTyping, $data.typeSpeed);
                    }, $data.pauseStart);
                }
                $data.charIndex -= 1;
            }
        }
        $data.typingInterval = setInterval(startTyping, $data.typeSpeed);
        $data.cursorInterval = setInterval(() => {
            $refs.cursor.classList.toggle('hidden');
        }, $data.cursorSpeed);

        document.body.addEventListener('htmx:beforeSwap', () => {
            clearInterval($data.typingInterval);
            clearInterval($data.cursorInterval);
        });
    })"
    x-on:before-destroy="clearInterval(typingInterval); clearInterval(cursorInterval)"
    class="flex items-center justify-center mx-auto text-center max-w-7xl">
    <div class="relative hidden xl:flex items-center justify-center h-auto">
        <h1 class="text-5xl font-black text-black dark:text-white leading-tight" x-text="text"
            x-show="text !== ''"></h1>
        <p class="text-5xl font-black text-black dark:text-white leading-tight invisible" x-show="text === ''">'</p>
        <span class="absolute right-0 w-5 -mr-5 bg-black dark:bg-white h-3/4" x-ref="cursor"></span>
    </div>
    <div class="relative flex xl:hidden items-center justify-center h-auto">
        <h1 class="text-5xl font-black text-black dark:text-white leading-tight">
            Wealth, like a tree, grows from a tiny seed.
        </h1>
    </div>
</div>
