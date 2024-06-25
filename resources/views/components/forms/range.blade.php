@props(['minAmount', 'maxAmount'])

<style>
    input[type=range]::-webkit-slider-thumb {
        pointer-events: all;
        width: 24px;
        height: 24px;
        -webkit-appearance: none;
        /* @apply w-6 h-6 appearance-none pointer-events-auto; */
    }
</style>
<div class="flex justify-center items-center">
    <div
        x-data="{
            minamount: {{ $minAmount }},
            maxamount: {{ $maxAmount }},
            min: {{ $minAmount }},
            max: {{ $maxAmount }},
            minthumb: 0,
            maxthumb: 0,
            init() {
                const urlParams = new URLSearchParams(window.location.search);
                this.minamount = urlParams.has('min_amount') ? parseInt(urlParams.get('min_amount')) : this.minamount;
                this.maxamount = urlParams.has('max_amount') ? parseInt(urlParams.get('max_amount')) : this.maxamount;
                this.mintrigger();
                this.maxtrigger();
            },
            mintrigger() {
                this.minamount = Math.min(this.minamount, this.maxamount - 30);
                this.minthumb = ((this.minamount - this.min) / (this.max - this.min)) * 100;
            },
            maxtrigger() {
                this.maxamount = Math.max(this.maxamount, this.minamount + 30);
                this.maxthumb = 100 - (((this.maxamount - this.min) / (this.max - this.min)) * 100);
            }
        }"
        x-init="init"
        class="relative w-full"
    >
        <div>
            <input type="range"
                   step="1"
                   x-bind:min="min" x-bind:max="max"
                   x-on:input="mintrigger"
                   x-model="minamount"
                   class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

            <input type="range"
                   step="1"
                   x-bind:min="min" x-bind:max="max"
                   x-on:input="maxtrigger"
                   x-model="maxamount"
                   class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

            <div class="relative z-10 h-2">

                <div
                    class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200 dark:bg-gray-700"></div>

                <div class="absolute z-20 top-0 bottom-0 rounded-md bg-black dark:bg-white"
                     x-bind:style="'right:'+maxthumb+'%; left:'+minthumb+'%'"></div>

                <div
                    class="absolute z-30 w-6 h-6 top-0 left-0 bg-black dark:bg-white rounded-full -mt-2 -ml-1"
                    x-bind:style="'left: '+minthumb+'%'"></div>

                <div
                    class="absolute z-30 w-6 h-6 top-0 right-0 bg-black dark:bg-white rounded-full -mt-2 -mr-3"
                    x-bind:style="'right: '+maxthumb+'%'"></div>

            </div>

        </div>

        <div class="flex justify-between items-center py-5">
            <input type="hidden" name="min_amount" x-model="minamount">
            <input type="hidden" name="max_amount" x-model="maxamount">

            <x-forms.input type="text" disabled x-model="minamount" class="max-w-20"/>
            <x-forms.input type="text" disabled x-model="maxamount" class="max-w-20"/>
        </div>

    </div>


</div>
