<!DOCTYPE html>

<html lang="en">

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        
        <title>Coachable Survey</title>
    
    </head>

        <body class="grey-background">
            
        <div id="app" >
                <survey-component :survey-In="{{$survey}}" ></survey-component>
        
            </div>

            <script src="{{'js/app.js' }}"></script>
        
        </body>

</html>