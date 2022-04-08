@extends('manage.layouts.layout')
@php
$counter = 0;
@endphp
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Müraciətlər</h4>
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Experience</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applies as $apply)
                                <tr>
                                    <td>{{ ++$counter }}</td>
                                    <td>{{ $apply->name . ' ' . $apply->lastname }}</td>
                                    <td>{{ $apply->email }}</td>
                                    <td>{{ $apply->phone }}</td>
                                    <td>{{ $apply->experience }}</td>
                                    <td>
                                        <a href="{{ route('single-apply', $apply->id) }}" class="btn btn-warning">
                                            <i class="mdi mdi-eye"></i>
                                        </a>
                                        <a href="{{ route('delete-apply', $apply->id) }}"
                                            class="btn btn-danger delete">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.0/sweetalert2.min.css"
        integrity="sha512-y4S4cBeErz9ykN3iwUC4kmP/Ca+zd8n8FDzlVbq5Nr73gn1VBXZhpriQ7avR+8fQLpyq4izWm0b8s6q4Vedb9w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('toast')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.delete').on('click', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        fetch(url).then(response => response.json()).then(data => {
                            if (data.code == 204) {
                                swal(data.message, {
                                    icon: "success",
                                });
                                window.location.reload();
                            } else {
                                swal(data.message, {
                                    icon: "error",
                                });
                            }
                        })
                    } else {
                        swal("Item wasn't deleted", {
                            icon: "error"
                        });
                    }
                });
        })
    </script>
@endsection
