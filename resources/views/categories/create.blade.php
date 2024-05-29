<x-app-layout>
    @fragment('form')
        <form
            hx-post="{{ route('categories.store') }}"
            hx-target="body"
            hx-params="not icon-search"
            hx-push-url="true"
            x-data="{ icon: '{{ old('icon') ? old('icon').'.png' : 'image.png' }}' }"
            @icon-changed.window="icon = $event.detail.icon">
            @csrf

            <x-modal name="category-image-change">
                <div class="p-6">
                    <x-panels.heading>
                        {{'Select Icon' }}
                    </x-panels.heading>

                    <x-forms.search class="mt-6" position="top-4">
                        <x-forms.input class="w-full" placeholder="Search..."
                                       name="icon-search" id="icon-search" autofocus
                                       hx-post="{{ route('categories.searchIcons') }}"
                                       hx-params="icon-search,_token"
                                       hx-trigger="input changed delay:300ms, search"
                                       hx-target="#icon-list"/>
                    </x-forms.search>

                    <div>
                        <x-forms.radio.group type="icon" id="icon-list">
                            @foreach($icons as $icon)
                                <x-forms.radio.icon
                                    name="icon"
                                    id="{{  $icon->getBasename('.png') }}"
                                    icon="{{ $icon->getFilename() }}"
                                    :checked="old('icon', $selectedIcon) === $icon->getBasename('.png')"/>
                            @endforeach
                        </x-forms.radio.group>
                    </div>
                </div>
            </x-modal>


            <x-panels.panel>

                <x-panels.heading class="mb-7">
                    Add Category
                </x-panels.heading>

                <div class="flex flex-col items-start w-full"
                     x-data="{ color: '{{ old('color') ? 'bg-'.old('color').'-300' : '' }}' }"
                     @color-changed.window="color = $event.detail.color">

                    <div class=" flex items-start w-full">

                        <x-category-image-change x-data=""
                                                 x-on:click.prevent="$dispatch('open-modal', 'category-image-change')"/>

                        <div class="flex items-center justify-between w-full">
                            <div class="flex flex-col items-start justify-center w-full">
                                <div class="w-full">
                                    <x-forms.input id="name" name="name" type="text" :value="old('name')"
                                                   autofocus placeholder="Enter category name"
                                                   class="w-full"/>
                                    <x-forms.error :messages="$errors->get('name')"/>
                                </div>

                                <x-forms.radio.group>
                                    <x-forms.radio.button name="type" id="expense" value="expense"
                                                          :checked="old('type') === 'expense'">
                                        <div class="block">
                                            <div class="w-full">Expense</div>
                                        </div>
                                        <x-icon class="text-red-500 mt-1">
                                            arrow_drop_down
                                        </x-icon>
                                    </x-forms.radio.button>

                                    <x-forms.radio.button name="type" id="income" value="income"
                                                          :checked="old('type') === 'income'">
                                        <div class="block">
                                            <div class="w-full">Income</div>
                                        </div>
                                        <x-icon class="text-emerald-500 mt-1">
                                            arrow_drop_up
                                        </x-icon>
                                    </x-forms.radio.button>

                                    <x-forms.error :messages="$errors->get('type')"/>
                                </x-forms.radio.group>
                                <x-forms.error :messages="$errors->get('icon')"/>
                                <x-forms.error :messages="$errors->get('color')"/>
                            </div>
                        </div>
                    </div>

                    <x-forms.radio.group type="color" class="pl-24">
                        @foreach($availableColors as $color)
                            <x-forms.radio.color
                                color="{{ $color }}"
                                id="{{ $color }}"
                                :checked="old('color', $selectedColor) === $color"/>
                        @endforeach
                    </x-forms.radio.group>


                    <x-forms.form-actions>
                        <a href="{{ route('categories.index') }}">
                            <x-buttons.secondary>
                                Cancel
                            </x-buttons.secondary>
                        </a>

                        <x-buttons.form>
                            Add Category
                        </x-buttons.form>
                    </x-forms.form-actions>

                </div>

            </x-panels.panel>
        </form>
    @endfragment
</x-app-layout>
