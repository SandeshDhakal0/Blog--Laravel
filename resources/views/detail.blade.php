@extends('frontlayout')
@section('title', $detail->title)
@section('content')

    <div class="row">
        <div class="col-md-8">

            @if (Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif

            <div class="card">
                <h5 class="card-header">{{ $detail->title }}
                    <span class="float-right">Total views={{ $detail->views }}</span>
                </h5>
                <img src="{{ asset('imgs/post_image/' . $detail->full_img) }}" class="card-img-top" alt="{{ $detail->title }}">
                <div class="card-body">
                    {{ $detail->detail }}
                </div>
            </div>
            {{-- Add Comment --}}
            @auth
                <div class="card my-5">
                    <h5 class="card-header">Comment </h5>
                    <div class="card-body">

                        <form method="post" action="{{ url('save-comment/' . $detail->id) }}">
                            @csrf
                            <textarea class="form-control" name="comment"></textarea>
                            <input type="submit" class="submit btn btn-dark mt-2">
                    </div>
                </div>
            @endauth
            {{-- Fetch all the comments --}}
            <div class="card my-4">
                <h5 class="card-header">Comments <span class="badge badge-dark">{{ count($detail->comment) }}</span></h5>
                <div class="card-body">
                    @if ($detail->comment)
                        @foreach ($detail->comment as $comment)
                            <blockquote class="blockquote">
                                <p class="mb-0">{{ $comment->comment }}</p>
                                @if ($comment->user_id == 0)
                                    <footer class="blockquote-footer">Admin</footer>
                                @else
                                    <footer class="blockquote-footer">{{ $comment->user->name }} </footer>
                                @endif
                            </blockquote>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        {{-- Right Sidebar --}}
        <div class="col-md-4">
            {{-- Search --}}
            <div class="card mb-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <form action="{{ url('/') }}">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q">
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
                        @if ($recent_posts)
                            @foreach ($recent_posts as $post)
                                <a href="{{ url('detail/'. $post->id) }}" class="list-group-item">{{ $post->title }}</a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <hr>
                {{-- Popular Post --}}
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-header">Popular Posts</h5>
                        <div class="list-group list-group-flush">
                            @if ($popular_posts)
                                @foreach ($popular_posts as $post)
                                    <a href="{{ url('detail/'. $post->id) }}" class="list-group-item">{{ $post->title }}</a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endsection('content')
