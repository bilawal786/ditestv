<div class="block-header">
    @php
        $users = \App\Models\User::where('role', 1)->get();
        $disableButton = false; // Initialize the variable as false

        foreach ($users as $user) {
            if ($user->showExpiredDate()) {
                $disableButton = true; // Set the variable to true if any user has an expired date
                break; // Exit the loop early since we don't need to check further
            }
        }
    @endphp
    <div class="row clearfix">
        {{--        <div class="col-md-1 col-sm-12">--}}
        {{--            <h2>Utenti</h2>--}}
        {{--        </div>--}}
        <div class="col-md-12 col-sm-12 text-right">
            <a href="{{route('users.create')}}" class="btn btn-sm btn-primary btn-round" style="margin-bottom: 10px;"
               title="">Crea nuovo cliente</a>
            <a href="{{ route('userPdf') }}" class="btn btn-sm btn-success btn-round" style="margin-bottom: 10px;"
               title="">Salva clienti pdfF</a>
            <a href="{{ route('expireduser') }}" class="btn btn-sm btn-success btn-round" style="margin-bottom: 10px;"
               title="">PDF Clienti scaduti</a>
            <a href="{{ route('export.data') }}" class="btn btn-sm btn-danger btn-round  " style="margin-bottom: 10px;"
               title="">Esporta tutti i clienti</a>
            <a href="{{ route('expired.data') }}" style="margin-right: 5px; margin-bottom: 10px;"
               class="btn btn-sm btn-danger btn-round" title=""
                {{ $disableButton ? 'disabled' : '' }}>
                Esporta Utenti Scaduti
            </a>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active"><a href="{{route('users.index')}}">Cliente</a></li>
            </ul>
        </div>

    </div>
</div>

<div class="container-fluid">

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <h4 class="ml-2 mt-2"><b>Clienti</b></h4>
            </div>
        </div>
    </div>
</div>
