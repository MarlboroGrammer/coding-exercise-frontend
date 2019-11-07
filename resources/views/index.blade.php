<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>jobs.at coding exercise</title>
        <!-- Fonts -->

        <!-- Comment in the following line, if you want to use bootstrap and/or global styles -->
        <link rel="stylesheet" href="css/app.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            #app {
                background-color: white;
            }
            .mt-50 {
                margin-top: 50px;
            }
            .round {
                background-color: #2ea1b2;
                height: 50px;
                width: 50px;
                border-radius: 100%;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-light bg-light">
                <span class="navbar-brand mb-0 h1">
                    <div class="round">
                        
                    </div>
                </span>
            </nav>
            <div class="container-fluid mt-50">
                <job-list :jobs='@json($jobs)' :companies='@json($companies)'></job-list>
            </div>
        </div>

        <script src="js/app.js" defer></script>
    </body>
</html>

