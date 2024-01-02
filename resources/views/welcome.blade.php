<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome smart furniture</title>
<style>
    *{
padding: 0;
margin: 0;
box-sizing: border-box;
    }
    body{
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
.background{
    position: absolute;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100vh;
    object-fit:contain;
    z-index: -2;
}
.login{
font-family: 'Montserrat', sans-serif;
display: flex;
text-align: center;
justify-content: center;
align-items: center;
border-radius: 15px;
background-image: linear-gradient(#00275941,#57b4a956);
color: white;
width: 300px;
height: 300px;
position: relative;
}
input{
height:30px;
width: 90%;
border:2px solid  #57b4a9;
border-radius:15px;
transition: .5s ease ;
outline: none;
margin: 3%;

text-align: center;
}

input:focus{
    transform: scale(1.1);
}
a {
padding: 10px;
border:2px solid  #57b4a9;
background-color: #57b4a9;
color: white;
font-family: 'Montserrat', sans-serif;
font-weight: 500;
font-size: medium;
font-style: italic;
margin: 1em;
text-decoration: none;
border-radius:15px;
transition: .5s ease ;
}

button:hover{
    background-color:#57b4a9;
    color: rgb(4, 3, 63);
    border-radius:15px;
    transform: scale(1.1);  
}
div{
    color:#002759c7 ;
    font-size: 1em;
    font-weight: 800;
    justify-items: center;
}

</style>
</head>
<body>

<header>
    <img src="{{asset('assets/dist/img/bk.jpeg')}}" class="background"  >
</header>
<body>
    <main>
    <div >
        {{-- <img src="{{asset('assets/dist/img/log.png')}}" alt="logo" style="width:200px;hight:100px;"> --}}
        <br>
        <br>
        
            <div>
                @if (Route::has('login'))
                    <div>
                        @auth
                            <a href="{{ url('/dashboard') }}" >Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" >Log in</a>
    
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
        </div>
  
    </div>
    </main>
</body>
</html> 
   


