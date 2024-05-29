<div
    x-data="{
        tabSelected: new URLSearchParams(window.location.search).get('tab') || 1,
        tabId: $id('tabs'),
        tabButtonClicked(tabButton){
            this.tabSelected = tabButton.id.replace(this.tabId + '-', '');
            this.tabRepositionMarker(tabButton);
        },
        tabRepositionMarker(tabButton){
            this.$refs.tabMarker.style.width = tabButton.offsetWidth + 'px';
            this.$refs.tabMarker.style.height = tabButton.offsetHeight + 'px';
            this.$refs.tabMarker.style.left = tabButton.offsetLeft + 'px';
        },
        tabContentActive(tabContent){
            return this.tabSelected == tabContent.id.replace(this.tabId + '-content-', '');
        },
        tabButtonActive(tabButton){
            const tabId = tabButton.id.split('-').slice(-1)[0];
            return this.tabSelected == tabId;
        }
    }"
    x-init="tabRepositionMarker($refs.tabButtons.children[tabSelected-1]);"
    {{ $attributes->merge(['class' => 'relative w-full']) }}
>

    {{ $slot }}
</div>




