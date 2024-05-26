<x-app-layout>
    <form action="{{ route('categories.store') }}" method="POST"
          x-data="{ icon: 'image.png' }" @icon-changed.window="icon = $event.detail.icon"
    >
        @csrf
        <x-modal name="category-image-change">
            <div class="p-6">

                <x-panels.heading>
                    {{ __('Select Icon') }}
                </x-panels.heading>

                <div class="relative mt-6 w-full">
                    <div class="absolute inset-y-2 end-2 top-4 flex items-center pointer-events-none">
                        <x-icon class="text-gray-500 dark:text-gray-400">
                            search
                        </x-icon>
                    </div>
                    <x-forms.input class="w-full" placeholder="Search..."/>
                </div>

                <div>
                    <x-forms.radio.group type="icon">
                        @foreach($icons as $icon)
                            <x-forms.radio.icon
                                name="icon"
                                id="{{  $icon->getBasename('.png') }}"
                                icon="{{ $icon->getFilename() }}"
                                :checked="$icon === $selectedIcon"/>
                        @endforeach
                    </x-forms.radio.group>
                </div>
            </div>
        </x-modal>


        <x-panels.panel padding="4">

            <div class="flex flex-col items-start w-full"
                 x-data="{ color: '' }" @color-changed.window="color = $event.detail.color">

                <div class=" flex items-start w-full
                    ">

                    <x-category-image-change x-data=""
                                             x-on:click.prevent="$dispatch('open-modal', 'category-image-change')"
                    />


                    <div class="flex items-center justify-between w-full">
                        <div class="flex flex-col items-start justify-center w-full">
                            <x-forms.input class="w-full mt-0" value="Shopping"></x-forms.input>

                            <x-forms.radio.group>
                                <x-forms.radio.button name="type" id="expense" value="expense">
                                    <div class="block">
                                        <div class="w-full">Expense</div>
                                    </div>
                                    <x-icon class="text-red-500 mt-1">
                                        arrow_drop_down
                                    </x-icon>
                                </x-forms.radio.button>

                                <x-forms.radio.button name="type" id="income" value="income">
                                    <div class="block">
                                        <div class="w-full">Income</div>
                                    </div>
                                    <x-icon class="text-emerald-500 mt-1">
                                        arrow_drop_up
                                    </x-icon>
                                </x-forms.radio.button>
                            </x-forms.radio.group>
                        </div>
                    </div>
                </div>

                <x-forms.radio.group type="color" class="pl-24">
                    @foreach($availableColors as $color)
                        <x-forms.radio.color
                            name="color"
                            color="{{ $color }}"
                            id="{{ $color }}"
                            :checked="$color === $selectedColor"/>
                    @endforeach
                </x-forms.radio.group>

                <x-forms.form-actions>
                    <a href="{{ route('categories.index') }}">
                        <x-buttons.secondary>
                            Cancel
                        </x-buttons.secondary>
                    </a>
                    <x-buttons.form type="submit">
                        Save
                    </x-buttons.form>
                </x-forms.form-actions>

            </div>

        </x-panels.panel>
    </form>

</x-app-layout>
