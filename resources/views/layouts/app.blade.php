<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Company</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/carousel') }}">Carousel</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.carousels.index') }}">Admin Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <main role="main" class="container mt-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9tFHE+Z+Jd5IKW+eCu60d6kYmg0Fn1maM4prP6lXr3qRUJtpN5O" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniU9A1hC5mtD6uR7/Oy1Ck5/4W/1y4cAz0jHRGnYp2Le6LBXTcp0J" crossorigin="anonymous"></script>
</body>
</html>
