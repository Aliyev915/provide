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
                    <table class="fold-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Salary</th>
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
                                    <td>{{ $vacancy->langs->firstWhere('lang', app()->getLocale())->salary }}</td>
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

                                @if ($vacancy->applies->count() > 0)
                                    <tr class="fold">
                                        <td colspan="7">
                                            <div class="fold-content">
                                                <h3>New Applies</h3>
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
                                                        @php
                                                            $applycounter = 0;
                                                        @endphp
                                                        @foreach ($vacancy->applies->where('is_read', 'false') as $apply)
                                                            <tr>
                                                                <td>{{ ++$applycounter }}</td>
                                                                <td>{{ $apply->name . ' ' . $apply->lastname }}</td>
                                                                <td>{{ $apply->email }}</td>
                                                                <td>{{ $apply->phone }}</td>
                                                                <td>{{ $apply->experience }}</td>
                                                                <td>
                                                                    <a href="{{ route('single-apply', $apply->id) }}"
                                                                        class="btn btn-warning">
                                                                        <i class="mdi mdi-eye"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>
                    {{-- <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Salary</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vacancies as $vacancy)
                                <tr>
                                    <td>{{ ++$counter }}</td>
                                    <td>{{ $vacancy->langs->firstWhere('lang',app()->getLocale())->title }}</td>
                                    <td>{{ $vacancy->langs->firstWhere('lang',app()->getLocale())->salary }}</td>
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
                    </table> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.0/sweetalert2.min.css"
        integrity="sha512-y4S4cBeErz9ykN3iwUC4kmP/Ca+zd8n8FDzlVbq5Nr73gn1VBXZhpriQ7avR+8fQLpyq4izWm0b8s6q4Vedb9w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @charset "UTF-8";
        @import url("https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");

        .pcs:after {
            content: " pcs";
        }

        .cur:before {
            content: "$";
        }

        .per:after {
            content: "%";
        }

        * {
            box-sizing: border-box;
        }

        body {
            padding: 0.2em 2em;
        }

        table {
            width: 100%;
        }

        table th {
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        table th,
        table td {
            padding: 0.4em;
        }

        table.fold-table>tbody>tr.view td,
        table.fold-table>tbody>tr.view th {
            cursor: pointer;
        }

        table.fold-table>tbody>tr.view td:first-child,
        table.fold-table>tbody>tr.view th:first-child {
            position: relative;
            padding-left: 20px;
        }

        table.fold-table>tbody>tr.view td:first-child:before,
        table.fold-table>tbody>tr.view th:first-child:before {
            position: absolute;
            top: 50%;
            left: 5px;
            width: 9px;
            height: 16px;
            margin-top: -8px;
            font: 16px fontawesome;
            color: #999;
            content: "";
            transition: all 0.3s ease;
        }

        table.fold-table>tbody>tr.view:nth-child(4n-1) {
            background: #eee;
        }

        table.fold-table>tbody>tr.view:hover {
            background: #000;
        }

        table.fold-table>tbody>tr.view.open {
            background: tomato;
            color: white;
        }

        table.fold-table>tbody>tr.view.open td:first-child:before,
        table.fold-table>tbody>tr.view.open th:first-child:before {
            transform: rotate(-180deg);
            color: #333;
        }

        table.fold-table>tbody>tr.fold {
            display: none;
        }

        table.fold-table>tbody>tr.fold.open {
            display: table-row;
        }

        .fold-content {
            padding: 0.5em;
        }

        .fold-content h3 {
            margin-top: 0;
        }

        .fold-content>table {
            border: 2px solid #ccc;
        }

        .fold-content>table>tbody tr:nth-child(even) {
            background: #eee;
        }

    </style>
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

        $(function() {
            $(".fold-table tr.view").on("click", function() {
                $(this).toggleClass("open").next(".fold").toggleClass("open");
            });
        });
    </script>
@endsection
