@extends('layouts.app')

@section('content')
    <style>
        .black-bg-row {
            background-color: #1c1c1c !important; /* Use !important to override other styles */
            color: white; /* Change text color to white for better visibility */
        }
    </style>
    <div id="main-content">
        @include('backend.users.includes.blockHeader')
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card planned_task">
                        <div class="header">
                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                <li><a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i
                                            class="icon-refresh"></i></a></li>
                                <li><a href="javascript:void(0);" class="full-screen"><i
                                            class="icon-size-fullscreen"></i></a></li>
                            </ul>
                        </div>
                        <div class="container col-12 table-responsive">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Numero Telefono</th>
                                    <th>Residente</th>
                                    <th>Stato</th>
                                    <th width="100px">Azione</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('style')
        <link rel="stylesheet" href="{{asset('vendor/dropify/css/dropify.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet"
              href="{{asset('vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')}}">
        <link rel="stylesheet"
              href="{{asset('vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')}}">
    @endpush
    @push('script')
        <script src="{{asset('bundles/datatablescripts.bundle.js')}}"></script>
        <script src="{{asset('vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
        <script src="{{asset('vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
        <script src="{{asset('vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
{{--        <script type="text/javascript">--}}
{{--            $(function () {--}}

{{--                var table = $('.data-table').DataTable({--}}
{{--                    processing: true,--}}
{{--                    serverSide: true,--}}
{{--                    ajax: "{{ route('users.index') }}",--}}
{{--                    columns: [--}}
{{--                        {data: 'id', name: 'id'},--}}
{{--                        {--}}
{{--                            data: function (row) {--}}
{{--                                return row.first_name + ' ' + row.last_name;--}}
{{--                            },--}}
{{--                            name: 'full_name'--}}
{{--                        },--}}
{{--                        {data: 'email', name: 'email'},--}}
{{--                        {data: 'phone_number', name: 'phone_number'},--}}
{{--                        {data: 'resident', name: 'resident'},--}}
{{--                        {data: 'status', name: 'status'},--}}
{{--                        {data: 'action', name: 'action', orderable: false, searchable: false},--}}
{{--                    ]--}}
{{--                });--}}
{{--            });--}}
{{--        </script>--}}
        <script type="text/javascript">
            $(function () {
                var i =1;
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('users.index') }}",
                    columns: [
                        // {
                        //     data: function () {
                        //         incrementValue++; // Increment the custom increment value
                        //         return incrementValue; // Use the incremented value as data
                        //     },
                        //     name: 'id'
                        // },
                        {data: 'id', name: 'id'},
                        {
                            data: function (row) {
                                return row.first_name + ' ' + row.last_name;
                            },
                            name: 'full_name'
                        },
                        {data: 'email', name: 'email'},
                        {data: 'phone_number', name: 'phone_number'},
                        {data: 'resident', name: 'resident'},
                        {data: 'status', name: 'status'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ],
                    createdRow: function (row, data, dataIndex) {
                        if (data.status !== '<span class="badge badge-success">Not Expired</span>') {
                            $(row).addClass('black-bg-row'); // Add a class to change the background color
                        }
                    }
                });
            });
        </script>


    @endpush
@endsection
