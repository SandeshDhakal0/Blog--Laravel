@extends('layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Post</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Post</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <a class="btn btn-primary align-self-left" href="{{ url('admin/post/create') }}" role="button">Add Item</a>
                <i class="fas fa-table me-1"></i>
                Data Table
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td><img src="{{ asset('imgs') . '/' . $post->thumb }}" width="100px" /></td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                        href="{{ url('admin/post/' . $post->id . '/edit') }}">Update</a>
                                    <a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"
                                        href="{{ url('admin/post/' . $post->id . '/delete') }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </main>
@endsection
