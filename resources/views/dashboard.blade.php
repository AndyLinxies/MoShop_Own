<x-app-layout>
    <div id="app" class='flex w-full '>
        <side-bar-component></side-bar-component>
    <div class="py-12 w-9/12">
        <div class="globTable mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @yield('content_bo')
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
