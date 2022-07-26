@extends('layout')
@section('title','All Categories')
@section('meta_desc','This is the meta description.')
@section('content')

            <main>
                <div class="container-fluid px-3">
                    <h1 class="mt-3">Category</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Add Category</li>
                    </ol>

                    {{-- DataTables Example --}}
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i> Add Category
                            <a href="{{ url('/admin/category') }}" class="float-right btn btn-sm btn-dark">All
                                Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                @if ($errors)
                                    @foreach ($errors->all() as $error)
                                        <p class="text-danger">{{ $error }}</p>
                                    @endforeach
                                @endif

                                @if (Session::has('success'))
                                    <script>
                                        Swal.fire({
                                            position: 'top-end',
                                            icon: 'success',
                                            title: 'The data is inserted',
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                    </script>
                                @endif

                                <form method="post" action="{{ url('admin/category') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Title</th>
                                            <td><input type="text" name="title" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Detail</th>
                                            <td><input type="text" name="detail" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Image</th>
                                            <td><input type="file" name="cat_image" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" class="btn btn-primary" />

                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>

                </div>

            </main>

@endsection
