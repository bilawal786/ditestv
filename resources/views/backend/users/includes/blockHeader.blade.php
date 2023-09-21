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
        <div class="col-md-4 col-sm-12">
            <h2>Utenti</h2>
        </div>
        <div class="col-md-8 col-sm-12 text-right">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active"><a href="{{route('users.index')}}">Utente</a></li>
            </ul>
            <a href="{{route('users.create')}}" class="btn btn-sm btn-primary btn-round" title="">Crea Nuovo Utente</a>
            <a href="#" class="btn btn-sm btn-success btn-round" title="">Tutti gli utenti PDF</a>
            <a href="{{ route('export.data') }}" class="btn btn-sm btn-success btn-round" title="">Esporta Tutti Gli Utenti</a>
            <a href="{{ route('expired.data') }}" class="btn btn-sm btn-danger btn-round" title=""
                {{ $disableButton ? 'disabled' : '' }}>
                Esporta Utenti Scaduti
            </a>

            {{--            <a href="{{ route('expired.data') }}" class="btn btn-sm btn-danger btn-round" title="">Export Expired--}}
            {{--                Users</a>--}}
        </div>
    </div>
</div>
