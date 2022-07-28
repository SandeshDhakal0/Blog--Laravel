@extends('frontlayout')
@section('title','detail')
@section('content')

        <div class="row">
            <div class="col-md-8">

                @if(Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
                @endif

                <div class="card">
                    <h5 class="card-header">{{$detail->title}}</h5>
                    <img src="{{asset('imgs/post_image/'.$detail->full_img)}}" class="card-img-top" alt="{{$detail->title}}">
                    <div class="card-body">
                        {{$detail->detail}}
                    </div>
                </div>
            {{-- Add Comment --}}
            @auth
            <div class="card my-5">
                <h5 class="card-header">Comment </h5>
                <div class="card-body">
                    <form method="post" name="comment" action="{{url('save_comment/'.$detail->id)}}">
                        @csrf
                    <textarea class="form-control"></textarea>
                    <input type="submit" class="s ubmit btn btn-dark mt-2">
                </div>
            </div>
            @endauth
            {{-- Fetch all the comments --}}
            <div class="card my-4">
                <h5 class="card-header">Comments <span class="badge badge-dark">{{count($detail->comment)}}</span></h5>
                <div class="card-body">
                    @if($detail->comment)
                    @foreach ($detail->comment as $com)
                    <blockquote class="blockquote">
                        <p class="mb-0">{{$com->comment}}</p>
                        <footer class="blockquote-footer">Username </footer>
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
                            <a href="" class="list-group-item">Post 1</a>
                            <a href="" class="list-group-item">Post 1</a>
                        </div>
                    </div>
                </div>
            </div>
@endsection('content')
