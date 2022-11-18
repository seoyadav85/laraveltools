<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
     @yield('meta_keywords')
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

  <link rel="stylesheet" href="{{asset('public/css/front/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/front/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/css/front/main.css')}}">
  <link rel="shortcut icon" type="image/png" href="{{asset('public/images/favicon.png')}}" />

</head>
<body>
  <div class="wrapper">
  	@include('include.front_header')
  	 @yield('content')
  	@include('include.front_footer')
  </div>
  <script src="{{asset('public/js/front/custom.js')}}"></script>  
  <script src="{{asset('public/js/front/jquery-3.3.1.min.js')}}"></script>  
  <script src="{{asset('public/js/front/bootstrap.bundle.min.js')}}"></script>
  

  <script>

 jQuery( "#change" ).on("click", function() {
            if( jQuery( "#outer_sec" ).hasClass( "dark" )) {
                jQuery( "#outer_sec" ).removeClass( "dark" );
                jQuery( ".change" ).text( "OFF" );
            } else {
                jQuery( "#outer_sec" ).addClass( "dark" );
                jQuery( ".change" ).text( "ON" );
            }
        });
</script>
</div>




<script>
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
    var x = document.getElementById("changeText");
    var getclass = document.getElementById("modeIcon");
  if (x.innerHTML === "Dark Mode") {
    x.innerHTML = "Light Mode";

   
  } else {
    x.innerHTML = "Dark Mode"; 
  }
}
</script>
</body>
</html>