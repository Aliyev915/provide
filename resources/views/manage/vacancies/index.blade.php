@extends('manage.layouts.layout')
@php
$counter = 0;
@endphp
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Vakansiyalar</h4>
                <a href="{{ route('create-vacancy') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i>
                </a>
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vacancies as $vacancy)
                                <tr class="view">
                                    <td>{{ ++$counter }}</td>
                                    <td>{{ $vacancy->langs->firstWhere('lang', app()->getLocale())->title }}</td>
                                    <td>{{ $vacancy->start_date }}</td>
                                    <td>{{ $vacancy->end_date }}</td>
                                    <td>
                                        <a href="{{ route('edit-vacancy', $vacancy->id) }}" class="btn btn-success">
                                            <i class="mdi mdi-pen"></i>
                                        </a>
                                        <a href="{{ route('delete-vacancy', $vacancy->id) }}"
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
