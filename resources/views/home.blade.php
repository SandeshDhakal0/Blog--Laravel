<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- Jquery --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    {{-- Javascript --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">Amazing News</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">My Account</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- Get latest news --}}
    <main class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <div class="row mb-5">
                    @if (count($posts) > 0)
                        @foreach ($posts as $post)
                            <div class="col-md-4">
                                <div class="card" >
                                    <a href="{{ url('detail/' . $post->id) }}">
                                        <img class="card-img-top" src="{{ asset('imgs/post_thumb/' . $post->thumb) }}"
                                            alt="{{ $post->title }}">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{ url('detail/' . $post->id) }}">{{ $post->title }}</a></h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="alert alert-danger">No post Found</p>
                    @endif
                </div>
                {{-- Paginate --}}
                {{$posts->links()}}
            </div>
            {{-- Right Sidebar --}}
            <div class="col-md-4">
            {{-- Search --}}
                <div class="card mb-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="">
                            <div class="input-group-append">
                                <button class="btn btn-dark" type="button">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- Recent Post --}}
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-header">Recent Posts</h5>
                        <div class="list-group list-group-flush">
                            @if($recent_posts)
                                @foreach ($recent_posts as $post )
                                    <a href="" class="list-group-item">{{$post->title}}</a>
                                @endforeach
                                @endif
                        </div>
                    </div>

                {{-- Popular Post --}}
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-header">Popular Posts</h5>
                        <div class="list-group list-group-flush">
                            <a href="" class="list-group-item">Post 1</a>
                            <a href="" class="list-group-item">Post 1</a>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</body>

</html>
