@extends('layout')

@section('content')

    <main>
        <div class="container-fluid px-3">
            <h1 class="mt-3">Setting</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Manage Settings</li>
            </ol>

            {{-- DataTables Example --}}
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i> Manage Settings
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @endforeach
                        @endif

                        @if (Session::has('success'))
                            {{-- <p class="text-success">{{Session::get('success')}}</p> --}}
                            <script>
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Your work has been saved',
                                    showConfirmButton: false,
                                    timer: 1000
                                })
                            </script>
                        @endif

                        <form method="post" action="{{ url('admin/setting') }}" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-bordered">

                                <tr>
                                    <th>Comment Auto Approve </th>
                                    <td>
                                        <input @if($setting) value="{{$setting->comment_auto}}" @endif class="form-control" type="text" name="comment_auto">
                                    </td>
                                </tr>
                                <tr>
                                    <th>User Auto Approve  </th>
                                    <td>
                                        <input @if($setting) value="{{$setting->user_auto}}" @endif class="form-control" type="text" name="user_auto">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Recent Post Limit </th>
                                    <td>
                                        <input @if($setting) value="{{$setting->recent_limit}}" @endif class="form-control" type="text" name="recent_limit">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Popular Post Limit </th>
                                    <td>
                                        <input @if($setting) value="{{$setting->popular_limit}}" @endif class="form-control" type="text" name="popular_limit">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Recent Comment Limit </th>
                                    <td>
                                        <input @if($setting) value="{{$setting->recent_comment_limit}}" @endif class="form-control" type="text" name="recent_comment_limit">
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
