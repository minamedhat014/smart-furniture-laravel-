@props(['title'])

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<title>{{$title}}</title>
		
		<style>

		@page {
  size: A4;
  margin: 0;
}
@media print {
  html, body {
    width: 210mm;
    height: 297mm;
  }
  /* ... the rest of the rules ... */
}

.page {
  width: 21cm;
  min-height: 29.7cm;
  padding: 2cm;
  margin: auto;
  border: 1px #D3D3D3 solid;
  border-radius: 5px;
  margin-top: 5%;
  background: white;
}

			ul {
				padding: 0;
				margin: 0 0 1rem 0;
				list-style: none;
    
			}
			body {
				font-family: "Inter", sans-serif;
				margin: 0;
        padding: 0;
			}
			table {
				width: 95%;
				border-collapse: collapse;
			}
			table,
			table th,
			table td {
				border: 1px solid silver;
			}
			table th,
			table td {
				text-align: center;
				padding: 8px;
        color: #002659;
 
			}
			h1,
			h4,
			p {
				margin: 0;
			}
      

    .logo{
    width:200px;
    height:90px; 
    position: absolute;
    left: -5%; 
    top:-20% ;
 }
 .qr-code{
position: absolute;
left:90%;
top: 50%;
}
.layout-logo{
  position: absolute;;
  display: block;
    width:50px;
    height:50px;
    top: -40%;  
    left: 65%;
    background-color: white;
}

.layout-address{
  position: absolute;;
  display: block;
     color: #ee7857; 
     font-size: 17px;
     font-weight: bold;
     font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    width:270px;
    height:100px;
    top: 0%;    
    right: -5%;
    background-color: white;
}
.page-title{
  position: absolute;;
     font-size: 17px;
     font-weight: bold;
     color: #002659;
     font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    top: 0%;    
    left:50%;
    transform: translateX(-50%);
    text-decoration: underline;
    background-color: white;
}
ul {
  list-style: none; /* Remove default bullet points */
  padding-left: 0;  /* Remove default padding */
}

li::before {
  content: "- ";    /* Add dash before each list item */
}
.page-header{
  width: 100%;
  position: relative;
  display: block;
  height:70px;
}

.layout-section{
    width:100%;
    height: 27%;
    text-align:start;
    font-style: italic;
    font-size: 16px;
    font-weight:600;
    display: flex;
    color: #002659;  
    position: relative;
}

.box{
  width: 95%;
  height: 20%;
  margin: 2.5%;
 display: block
}

.line{ 
   width:100%;
   margin:20px;
   display:flex;
 
  }

 .line .title{ 
  margin-left:2%;
  width:40%;
  }

.line .system-feedback{ 
    font-weight:500;
    color: #818181; 
  }

.gallary{
  width: 95%;
  height:15%;
  margin-left: 2.5%; 
  border: 1px solid rgb(204, 206, 204);
}
 .layout-image{
    width: 25%;
    height: 15%;
    margin: 1%;
    float: left;
    box-shadow: 3px 3px 6px #c5c5c5,
    -3px -3px 6px #ffffff;
    border-radius:15%;
 }

 .badge{
  height:10px;
    outline: none;
    margin-right: 12px;
    text-align:center;
    color:var(--brand-blue);
    border-radius: 5px ;
    transition: .5s ease ;
    background-color: #ffff ;
    border: none;
 }
		</style>
	</head>
	<body>


<div class="page"> 

         <div class="frame">
             {{-- logo section  --}} 
                <div class="page-header">   
                  <img src="{{asset('assets/dist/img/logo.png')}}" alt="logo" class="logo">
           <div class="page-title">

            <span><i class="fa-solid fa-file-signature"></i> {{$title}}</span>
           </div>
                  
            
<div class="layout-address">

    <img src="{{asset('assets/dist/img/addLogo.jpg')}}" class="layout-logo" alt="logo">

  <i class="fa-solid fa-earth-americas"></i>  Egypt
  <br>
  <i class="fa-solid fa-globe"></i>  www.smartfurniture.com.eg
  <br>
  <span> <i class="fa-solid fa-phone "></i> 19641</span>
  <br>
  
    </div>
   </div>



   {{$content}}
         </div>    
         </div>      
	</body>
  
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

</html>




