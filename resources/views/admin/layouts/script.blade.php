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
<script src="{{ asset('vendor/pharaonic/pharaonic.tagify.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->












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


<script>
let starsELment2=document.querySelectorAll("#box-2 .fa-star");
let emojiElemt2=document.querySelectorAll("#box-2 .fa-regular")
let colorsArray=["red","orange","darkblue","lightgreen","green"]
let starsELment3=document.querySelectorAll("#box-3 .fa-star");
let emojiElemt3=document.querySelectorAll("#box-3 .fa-regular");
let starsELment4=document.querySelectorAll("#box-4 .fa-star");
let emojiElemt4=document.querySelectorAll("#box-4 .fa-regular");
let starsELment5=document.querySelectorAll("#box-5 .fa-star");
let emojiElemt5=document.querySelectorAll("#box-5 .fa-regular");
let starsELment6=document.querySelectorAll("#box-6 .fa-star");
let emojiElemt6=document.querySelectorAll("#box-6 .fa-regular");

//loop to star element and add event listener to each one 
starsELment2.forEach(
    (ele,index)=>{
       ele.addEventListener(
            "click",()=>{
                upDateRating2(index)
            }
        )
    }
);

//function 

function upDateRating2(index){
    starsELment2.forEach(
         (ele,idx)=>{
             if(idx<index+1){
      ele.classList.add("active");
             }else{ele.classList.remove("active")}
     
         }
      );
      emojiElemt2.forEach(
         (emoj)=>{
             emoj.style.transform=`translateY(-${index*36}px)`
             emoj.style.color=colorsArray[index];
         }
     );
     };

     //function for box3

     starsELment3.forEach(
        (ele,index)=>{
           ele.addEventListener(
                "click",()=>{
                    upDateRating3(index)
                }
            )
        }
    );
    
    
    function upDateRating3(index){
        starsELment3.forEach(
             (ele,idx)=>{
                 if(idx<index+1){
          ele.classList.add("active");
                 }else{ele.classList.remove("active")}
         
             }
          );
          emojiElemt3.forEach(
             (emoj)=>{
                 emoj.style.transform=`translateY(-${index*36}px)`
                 emoj.style.color=colorsArray[index];
             }
         );
         };
     
 //function box4

 starsELment4.forEach(
    (ele,index)=>{
       ele.addEventListener(
            "click",()=>{
                upDateRating4(index)
            }
        )
    }
);


function upDateRating4(index){
    starsELment4.forEach(
         (ele,idx)=>{
             if(idx<index+1){
      ele.classList.add("active");
             }else{ele.classList.remove("active")}
     
         }
      );
      emojiElemt4.forEach(
         (emoj)=>{
             emoj.style.transform=`translateY(-${index*36}px)`
             emoj.style.color=colorsArray[index];
         }
     );
     };
 //function for box5

 starsELment5.forEach(
    (ele,index)=>{
       ele.addEventListener(
            "click",()=>{
                upDateRating5(index)
            }
        )
    }
);


function upDateRating5(index){
    starsELment5.forEach(
         (ele,idx)=>{
             if(idx<index+1){
      ele.classList.add("active");
             }else{ele.classList.remove("active")}
     
         }
      );
      emojiElemt5.forEach(
         (emoj)=>{
             emoj.style.transform=`translateY(-${index*36}px)`
             emoj.style.color=colorsArray[index];
         }
     );

     };

   
//function for box6

starsELment6.forEach(
    (ele,index)=>{
       ele.addEventListener(
            "click",()=>{
                upDateRating6(index)
            }
        )
    }
);


function upDateRating6(index){
    starsELment6.forEach(
         (ele,idx)=>{
             if(idx<index+1){
      ele.classList.add("active");
             }else{ele.classList.remove("active")}
     
         }
      );
      emojiElemt6.forEach(
         (emoj)=>{
             emoj.style.transform=`translateY(-${index*36}px)`
             emoj.style.color=colorsArray[index];
         }
     );

     };



</script>