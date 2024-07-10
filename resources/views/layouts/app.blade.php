<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tareas App')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 4.5rem;
            background-color: #f8f9fa;
        }
        .navbar-custom {
            background-color: #343a40;
        }
        .footer-custom {
            background-color: #343a40;
            color: #ffffff;
            padding: 1rem 0;
        }
        .container-flex {
            flex: 1;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Tareas App</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/tasks') }}">Lista de Tareas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/tasks/create') }}">Crear Tarea</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main role="main" class="container container-flex">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        
        @yield('content')
    </main>

    <footer class="footer-custom text-center">
        <div class="container">
            <hr style="background-color: #ffffff;">
            <p>&copy; {{ date('Y') }} Tareas App</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                $('.alert').alert('close');
            }, 2500);
        });
    </script>
</body>
</html>
