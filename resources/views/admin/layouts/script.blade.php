<!-- jQuery -->
@yield('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"  ></script> 

<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

@livewireScripts
@stack('js-scripts')
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script> 
<script src="{{asset('assets/dist/bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/dist/bootstrap-5.3.0-dist/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('vendor/pharaonic/pharaonic.select2.min.js') }}"></script>
<script src="{{asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
<!-- Bootstrap slider -->
<script src="{{asset('assets/plugins/bootstrap-slider/bootstrap-slider.min.js') }}"></script>













{{-- 

<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.addEventListener('contextmenu', function(e) {
            e.preventDefault(); // Prevents the default context menu from appearing
        });
    });
    
    window.onload = function() {
        document.body.onkeydown = function(event) {
            if (event.ctrlKey && event.keyCode !== 80) { // 80 corresponds to the 'P' key
                event.stopPropagation();
                event.preventDefault();
                return false;
            }
            return true; // Allow Ctrl+P to proceed, let other Ctrl key combinations bubble.
        };
    };  
    </script>  
 --}}




<script>
    document.addEventListener('livewire:init', () => {
       Livewire.on('closeModal', (event) => {
        $('.modal #modalBtnClose').click(); 
       });
    });
</script>
