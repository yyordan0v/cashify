@props([
    'ref' => 'content',
    'text' => 'Tooltip Text',
    'position' => 'top',
    'arrow' => false
])

<div
    x-data="{
        tooltipVisible: false,
        tooltipText: '{{ $text }}',
        tooltipArrow: '{{ $arrow }}',
        tooltipPosition: '{{ $position }}',
        isMobile: window.innerWidth < 768,
        toggleTooltip(event) {
            if (this.isMobile) {
                event.preventDefault();
                event.stopPropagation();
                this.tooltipVisible = !this.tooltipVisible;
            }
        }
    }"
    x-init="
        $refs.{{ $ref }}.addEventListener('mouseenter', () => { if (!isMobile) tooltipVisible = true; });
        $refs.{{ $ref }}.addEventListener('mouseleave', () => { if (!isMobile) tooltipVisible = false; });
        $refs.{{ $ref }}.addEventListener('click', toggleTooltip);
        window.addEventListener('resize', () => { isMobile = window.innerWidth < 768; });
    "
    class="relative"
>
    <div x-ref="{{ $ref }}" class="cursor-pointer">
        {{ $slot }}
    </div>

    <div x-ref="tooltip" x-show="tooltipVisible"
         :class="{ 'top-0 left-1/2 -translate-x-1/2 -mt-0.5 -translate-y-full' : tooltipPosition == 'top', 'top-1/2 -translate-y-1/2 -ml-0.5 left-0 -translate-x-full' : tooltipPosition == 'left', 'bottom-0 left-1/2 -translate-x-1/2 -mb-0.5 translate-y-full' : tooltipPosition == 'bottom', 'top-1/2 -translate-y-1/2 -mr-0.5 right-0 translate-x-full' : tooltipPosition == 'right' }"
         class="absolute w-auto text-sm z-10" x-cloak>
        <div x-show="tooltipVisible" x-transition
             class="relative px-2 py-1 text-white dark:text-black bg-black dark:bg-white rounded bg-opacity-80">
            <p x-text="tooltipText" class="flex-shrink-0 block text-xs whitespace-nowrap"></p>
            <div x-ref="tooltipArrow" x-show="tooltipArrow"
                 :class="{ 'bottom-0 -translate-x-1/2 left-1/2 w-2.5 translate-y-full' : tooltipPosition == 'top', 'right-0 -translate-y-1/2 top-1/2 h-2.5 -mt-px translate-x-full' : tooltipPosition == 'left', 'top-0 -translate-x-1/2 left-1/2 w-2.5 -translate-y-full' : tooltipPosition == 'bottom', 'left-0 -translate-y-1/2 top-1/2 h-2.5 -mt-px -translate-x-full' : tooltipPosition == 'right' }"
                 class="absolute inline-flex items-center justify-center overflow-hidden">
                <div
                    :class="{ 'origin-top-left -rotate-45' : tooltipPosition == 'top', 'origin-top-left rotate-45' : tooltipPosition == 'left', 'origin-bottom-left rotate-45' : tooltipPosition == 'bottom', 'origin-top-right -rotate-45' : tooltipPosition == 'right' }"
                    class="w-1.5 h-1.5 transform bg-black dark:bg-white bg-opacity-80"></div>
            </div>
        </div>
    </div>
</div>
