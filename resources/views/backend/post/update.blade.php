@extends('layout')
@section('content')

    <main>
        <div class="container-fluid px-3">
            <h1 class="mt-3">Post</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Update Post</li>
            </ol>

            {{-- DataTables Example --}}
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i> Update Post
                    <a href="{{ url('/admin/category') }}" class="float-right btn btn-sm btn-dark">Show
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
                            {{-- <p class="text-success">{{ session('success') }}</p> --}}
                            <script>
                                Swal.fire(
                                    'Updated!',
                                    'The new data is updated!',
                                    'success'
                                )
                            </script>
                        @endif

                        <form method="post" action="{{ url('admin/post/' . $data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <table class="table table-bordered">
                                <tr>
                                    <th>Category<span class="text-danger">*</span></th>
                                    <td>
                                        <select class="form-control" name="category">
                                            <option value="" hidden="hidden" selected> Select the Category:</option>
                                            @foreach ($cats as $cat)
                                                @if ($cat->id == $data->cat_id)
                                                    <option selected value="{{ $cat->id }}">{{ $cat->title }}
                                                    </option>
                                                @else
                                                    <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                                @endif
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
                                        <p class="my-2"><img src="{{ asset('imgs/post_thumb') }}/{{ $data->thumb }}"
                                                width="80px" id="thumb" /></p>
                                        <input type="hidden" value="{{ $data->image }}" name="post_thumb" />
                                        <input type="file" name="post_thumb" onchange="readURL(this, 1);" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>Full Image</th>
                                    <td>
                                        <p class="my-2"><img src="{{ asset('imgs/post_image') }}/{{ $data->full_img }}"
                                                width="80px" id="full" /></p>
                                        <input type="hidden" value="{{ $data->image }}" name="post_image" />
                                        <input type="file" name="post_image" onchange="readURL(this,2);" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>Detail <span class="text-danger">*</span> </th>
                                    <td>
                                        <textarea class="form-control" name="detail">{{ $data->detail }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tags</th>
                                    <td>
                                        <textarea class="form-control" name="tags">{{ $data->tags }}</textarea>
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
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>

    </main>

    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            function readURL(input, id) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        if (id == 1)
                            $('#thumb').attr('src', e.target.result).width(80);
                        else {
                            $('#full').attr('src', e.target.result).width(80);
                        }
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    @endpush
@endsection
