<style>
    @media screen and (max-width: 481px) and (max-height: 932px) {
        .col-md-12.col-sm-12.text-right a {
            margin-bottom: 10px;
        }
    }
</style>
<div class="block-header">
    <div class="container-fluid">
    <div class="row clearfix">
            <div class="col-md-12 col-sm-12 text-right">
                <a href="{{route('users.create')}}" class="btn btn-sm btn-primary mb-lg-0 mb-sm-3 ">
                    <i class="fa fa-plus"></i> Crea nuovo socio</a>
                <a href="{{ route('userPdf') }}" class="btn btn-sm btn-warning mb-lg-0 mb-sm-3 ">
                    <i class="fa fa-file-pdf-o"></i> PDF tutti i Soci</a>

                <a href="{{ route('expireduser') }}" class="btn btn-sm btn-dark mb-lg-0 mb-sm-3 ">
                    <i class="fa fa-file-pdf-o"></i> PDF soci con scadenze </a>

                <a href="{{ route('expiredDays') }}" class="btn btn-sm btn-danger mb-lg-0 mb-sm-3 ">
                    <i class="fa fa-file-pdf-o"></i> Scad 8 giorni</a>

                <a href="{{ route('export.data') }}" class="btn btn-sm btn-success mb-lg-0  mb-sm-3">
                    <i class="fa fa-file-excel-o"></i> Esporta tutti i soci</a>
                <a href="{{ route('expired.data') }}"
                   class="btn btn-sm btn-secondary mb-lg-0 mb-sm-3 mb-xs-3">
                    <i class="fa fa-file-excel-o"></i> Esporta scaduti  soci
                </a>


            </div>
    </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <h4 class="ml-2 mt-2"><b>Tabella Scadenze</b></h4>
            </div>
        </div>
    </div>
</div>
