<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-12 col-sm-12 text-right">
            <a href="{{route('users.create')}}" class="btn btn-sm btn-primary btn-round" style="margin-bottom: 10px;">
                <i class="fa fa-plus"></i> Crea nuovo cliente</a>
            <a href="{{ route('userPdf') }}" class="btn btn-sm btn-success btn-round" style="margin-bottom: 10px;">
                <i class="fa fa-file-pdf-o"></i> Salva clienti PDF</a>

            <a href="{{ route('expireduser') }}" class="btn btn-sm btn-success btn-round" style="margin-bottom: 10px;">
                <i class="fa fa-file-pdf-o"></i> PDF Clienti scaduti</a>

            <a href="{{ route('expiredDays') }}" class="btn btn-sm btn-success btn-round" style="margin-bottom: 10px;">
                <i class="fa fa-file-pdf-o"></i> Pdf scaduto di sette giorni</a>

            <a href="{{ route('export.data') }}" class="btn btn-sm btn-danger btn-round " style="margin-bottom: 10px;">
                <i class="fa fa-file-excel-o"></i> Esporta tutti i clienti</a>
            <a href="{{ route('expired.data') }}" style="margin-right: 5px; margin-bottom: 10px;"
               class="btn btn-sm btn-danger btn-round">
                <i class="fa fa-file-excel-o"></i> Esporta Utenti Scaduti
            </a>
{{--            <a href="{{ route('expiredSevenDays') }}" style="margin-right: 5px; margin-bottom: 10px;"--}}
{{--               class="btn btn-sm btn-danger btn-round" title="">--}}
{{--                Sette giorni scaduti--}}
{{--            </a>--}}
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
