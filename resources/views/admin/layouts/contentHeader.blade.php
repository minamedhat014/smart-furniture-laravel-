
    <!-- Content Header (Page header) -->
    <div class="content-header">
     @yield('contentHeader')
     <p class="alert alert-warning" wire:offline>
        Whoops, your device has lost connection. The web page you are viewing is offline.
    </p>
     <x-appToaster/>
    </div>