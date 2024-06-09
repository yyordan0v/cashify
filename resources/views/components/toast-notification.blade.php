@if (session('toast'))
    <x-toast :type="session('toast')['type']" :title="session('toast')['title']"
             :position="session('toast')['position']" :description="session('toast')['description']"/>
@endif
