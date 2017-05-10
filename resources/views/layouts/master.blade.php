<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <title>{{ config('app.name') }}</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">TODO</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav text-uppercase">
                        <li class="{{ isActiveRoute('tasks.index') }}"><a href="{{ route('tasks.index') }}">Home</a></li>
                        <li class="{{ isActiveRoute('tasks.create') }}"><a href="{{ route('tasks.create') }}">Create</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>

        <!-- Footer -->
        <footer>
            <nav class="navbar navbar-default navbar-fixed-bottom footer">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('imprint') }}">Imprint</a></li>
                    </ul>
                </div>
            </nav>
        </footer>

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
