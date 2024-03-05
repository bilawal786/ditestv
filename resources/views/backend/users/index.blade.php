@extends('layouts.app')

@section('content')
    <style>
        .black-bg-row {
            background-color: #1c1c1c !important; /* Use !important to override other styles */
            color: white;
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
                                    <th>Cogonome</th>
                                    <th>Data di nascita</th>
                                    <th>Email</th>
                                    <th>Città</th>
                                    <th>Provincia</th>
                                    <th>Allievo</th>
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

                    <span class="bottom-right-text">Powered By Buri</span>
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



        <script type="text/javascript">
            $(document).ready(function () {
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('users.index') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'first_name', name: 'first_name'},
                        {data: 'last_name', name: 'last_name'},
                        {data: 'd_o_b', name: 'd_o_b'},
                        {data: 'email', name: 'email'},
                        {data: 'city', name: 'city'},
                        {data: 'province', name: 'province'},
                        {data: 'student', name: 'student'},
                        {data: 'status', name: 'status'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ],
                    createdRow: function (row, data, dataIndex) {
                        if (data.status !== '<span class="badge badge-success">Not Expired</span>') {
                            $(row).addClass('black-bg-row');
                        }
                    },

                    language: {
                        processing: "In lavorazione...",
                        lengthMenu: "Mostra le voci del _MENU_",
                        emptyTable: "Nessun dato disponibile",
                        info: "Mostrando _START_ a _END_ di _TOTAL_ inserimenti",
                        infoEmpty: "Nessuna riga visualizzata",
                        infoFiltered: "(Filtra un massimo di _MAX_)",
                        infoPostFix: "",
                        search: "Ricercare:",
                        url: "",
                        infoThousands: ",",
                        loadingRecords: "Caricamento...",
                        paginate: {
                            first: "Prima",
                            last: "Scorsa",
                            next: "Prossima",
                            previous: "Precedente"
                        },
                        aria: {
                            sortAscending: ": Ordina in ordine crescente",
                            sortDescending: ": Ordina in ordine decrescente"
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
