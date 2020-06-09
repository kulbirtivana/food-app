<!DOCTYPE html>


<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/png" href="{{URL('images/LaraTweet-Logo.png')}}">
        <title> @yield('title') </title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ asset('js/app.js') }}" type ="text/javascript" defer >
            
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


        </script>
        
    </head>

    <body>
        @include('partials.navigation')
        <h1>
            @yield('title')
        </h1>

            @yield('js')

            @yield('content')
      
    </body>

</html>