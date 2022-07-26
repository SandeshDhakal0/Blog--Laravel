@extends('layout')
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
                                    <p class="text-success">{{ session('success') }}</p>
                                @endif

                                <form method="post" action="{{ url('admin/category/'.$data->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Title</th>
                                            <td><input type="text" name="title" value="{{ $data->title }}"
                                                    class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Detail</th>
                                            <td><input type="text" name="detail" value="{{ $data->detail }}"
                                                    class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <p class="my-2" ><img width="150" id="new"
                                                    src="{{ asset('imgs') }}/{{ $data->image }}" /></p>
                                            <th>Image</th>
                                            <td>
                                                <input type="hidden"  value="{{$data->image}}" name="cat_image" />
                                                <input type="file" name="cat_image" onchange="readURL(this);" />
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#new').attr('src', e.target.result).width(150).height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
    @endsection



