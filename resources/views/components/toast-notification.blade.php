@if (session('toasts'))
    <div
        class="hidden"
        x-data="{
            title: 'Default Toast Notification',
            description: '',
            type: 'default',
            position: 'top-center',
            expanded: false,
            popToast (custom){
                let html = '';
                if(typeof custom != 'undefined'){
                    html = custom;
                }
                toast(this.title, { description: this.description, type: this.type, position: this.position, html: html })
            }
        }"
        x-init="
            window.toast = function(message, options = {}){
                let description = '';
                let type = 'default';
                let position = 'top-center';
                let html = '';
                if(typeof options.description != 'undefined') description = options.description;
                if(typeof options.type != 'undefined') type = options.type;
                if(typeof options.position != 'undefined') position = options.position;
                if(typeof options.html != 'undefined') html = options.html;

                window.dispatchEvent(new CustomEvent('toast-show', { detail : { type: type, message: message, description: description, position : position, html: html }}));
            }">

        @foreach (session('toasts') as $toast)
            <x-toast :type="$toast['type']" :title="$toast['title']"
                     :position="$toast['position']" :description="$toast['description']"/>
        @endforeach

    </div>
@endif
