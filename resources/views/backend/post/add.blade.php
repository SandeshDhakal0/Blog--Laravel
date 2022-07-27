@extends('layout')

@section('content')

            <main>
                <div class="container-fluid px-3">
                    <h1 class="mt-3">Posts</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Add Post</li>
                    </ol>

                    {{-- DataTables Example --}}
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i> Add Post
                            <a href="{{ url('/admin/post') }}" class="float-right btn btn-sm btn-dark">All
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
                                    <p class="text-success">{{Session::get('success')}}</p>
                                @endif

                                <form method="post" action="{{ url('admin/post') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Category<span class="text-danger">*</span></th>
                                            <td>
                                                <select class="form-control" name="category">
                                                    <option value="" hidden="hidden" selected> Select the Category:</option>
                                                    @foreach ($cats as $cat)
                                                        <option value="{{$cat->id}}">{{$cat->title}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Title <span class="text-danger">*</span></th>
                                            <td>
                                                <input class="form-control" type="text" name="title">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Thumbnails</th>
                                            <td>
                                                <input type="file" name="post_thumb">
                                                <div>
                                                    <img src="{{}}" alt="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Full Image</th>
                                            <td>
                                                <input type="file" name="post_image">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Detail <span class="text-danger">*</span> </th>
                                            <td>
                                                <textarea class="form-control" name="detail" ></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tags</th>
                                            <td>
                                                <textarea class="form-control" name="tags" ></textarea>
                                            </td>
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

                    </div>

                </div>

            </main>

@endsection
