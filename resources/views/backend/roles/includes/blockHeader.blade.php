<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h2>Roles</h2>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}" >Role</a></li>
                @if(request()->is('roles') == route('roles.index'))
                    <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}" >Index</a></li>
                @endif
                @if(request()->is('roles/create') == route('roles.create'))
                    <li class="breadcrumb-item active"><a href="{{ route('roles.create') }}" >Create</a></li>
                @endif
            </ul>
            @can('role-create')
                <a class="btn btn-sm btn-primary btn-round" href="{{ route('roles.create') }}"> Create New Role</a>
            @endcan
        </div>
    </div>
</div>
