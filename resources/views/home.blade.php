@extends('frontlayout')
@section('title', 'Home Page')
@section('content')

            <div class="row">
            <div class="col-md-8">
                <div class="row mb-5">
                    @if (count($posts) > 0)
                        @foreach ($posts as $post)
                            <div class="col-md-4 pb-3">
                                <div class="card h-100"  >
                                    <a href="{{ url('detail/'. $post->id) }}">
                                        <img class="card-img-top" src="{{ asset('imgs/post_image/' . $post->full_img) }}"
                                            alt="{{ $post->title }}">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{ url('detail/'.$post->id)  }}">{{ $post->title }}</a></h5>
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
                        <form action="{{url('/')}}">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" >
                            <div class="input-group-append">
                                <button class="btn btn-dark" type="button">Search</button>
                            </div>
                        </div>
                    </form>
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
                            @if($popular_posts)
                            @foreach($popular_posts as $post)
                            <a href="" class="list-group-item">{{$post->title}}</a>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
@endsection('content')
