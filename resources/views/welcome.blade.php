<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Carousel Section -->
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            @foreach($carousels as $key => $carousel)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $carousel->image) }}" class="d-block w-100" alt="Carousel Image">
                    @if($carousel->caption)
                        <div class="carousel-caption d-none d-md-block">
                            <p>{{ $carousel->caption }}</p>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
