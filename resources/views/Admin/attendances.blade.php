@extends('layout')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-4">
                    <h2 class="heading-section">Attendance Table</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="h5 mb-4 text-center">Attendance List</h3>
                    <div class="table-wrap">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr>
                                    <th>Teacher</th>
                                    <th>Status</th>
                                    <th>Attendance Time</th>
                                    <th>Proof of Attendance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachersWithStatus as $item)
                                    <tr>
                                        <td>{{ $item['teacher']->name }}</td>
                                        <td>{{ $item['status'] }}</td>
                                        <td>{{ $item['jam_kehadiran'] }}</td>
                                        <td>
                                            <img src="{{ asset('storage/app/uploads/' . $item['bukti_kehadiran']) }}"
                                                alt="Proof of Attendance">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
