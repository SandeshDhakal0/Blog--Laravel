@extends('layout')
@section('content')
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <a class="btn btn-primary align-self-left" href="{{ url('admin/category/create') }}"
                            role="button">Add Item</a>
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
                                @foreach ($data as $cat)
                                <tr>
                                    <td>{{ $cat->id }}</td>
                                    <td>{{ $cat->title }}</td>
                                    <td><img src="{{ asset('imgs').'/'.$cat->image }}" width="100px"/></td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{ url('admin/category/'.$cat->id.'/edit') }}">Update</a>
                                        <a onclick= "return confirm('Are you sure?')" class="btn btn-danger btn-sm" href="{{ url('admin/category/'.$cat->id.'/delete') }}">Delete</a>
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
