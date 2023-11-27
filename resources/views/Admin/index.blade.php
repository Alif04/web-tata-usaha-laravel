@extends('layout')
@section('content')
    <div class="col-lg-12 col-md-6 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">

                    <div class="stat-content">
                        <div class="text-left dib mt-2  ">

                            <h3 style="margin-left: 250px">Selamat Datang, Admin</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2 class="my-4">Teachers List</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>NIP</th>
                        <th>Jenis Kelamin</th>
                        <th>Nomor Handphone</th>
                        <th>Action</th>
                        {{-- Add more columns based on your Teacher model --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->id }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->nip }}</td>
                            <td>{{ $teacher->jenis_kelamin }}</td>
                            <td>{{ $teacher->nomor_handphone }}</td>
                            <td>
                                <a href="{{ route('teacher_edit', $teacher->id) }}" class="btn btn-warning">Edit</a>
                                {{-- <a href="{{ route('teacher_delete', $teacher->id) }}" class="btn btn-danger">Delete</a> --}}
                            </td>
                            {{-- Add more cells based on your Teacher model --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $teachers->links() }} {{-- This adds pagination links --}}
    </div>
@endsection
