@extends('layouts.app')

@section('css')
    <!--color picker-->
    <link href="/backend/assets/vendor/colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet">
    <!--multiple select-->
    <link href="/backend/assets/vendor/multi-select/css/multi-select.css" rel="stylesheet">

@endsection

@section('content')
<div class="row">
    <div class="col-xl-8">
        <div class="card card-shadow mb-4 ">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-warning">
                    <div class="custom-title">
                        Editer: {{ $role->name }}
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{-- Name et description --}}
                @include('app.roles.forms.update')
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="row">

            <div class="card card-shadow mb-4 col-xl-12">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-warning">
                        <div class="custom-title">Ajouter une permission</div>
                        <div class=" widget-action-link">
                            <div class="dropdown">
                                <a href="#" class="btn btn-transparent text-secondary dropdown-hover p-0" data-toggle="dropdown" aria-expanded="false">
                                    <i class=" vl_ellipsis-fill-h"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right vl-dropdown" x-placement="bottom-end" style="position: absolute; transform: translate3d(16px, 23px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a class="dropdown-item" href="/configuration/roles"><i class="fa fa-users"></i> &nbsp Roles</a>
                                    <a class="dropdown-item" href="/configuration/users"><i class="fa fa-users"></i> &nbsp Utilisateurs</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-12">
                            @include('app.permissions.forms.create')
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-shadow mb-4 col-xl-12">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-warning">
                        <div class="custom-title">Custom permissions - {{ $permissions->where('type', 2)->count() }} </div>
                    </div>
                </div>
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-12">
                            @include('app.permissions.tables.data')
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


@endsection()

@section('javascript')
    <!--color picker-->
    <script src="/backend/assets/vendor/colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!--init color picker-->
    <script src="/backend/assets/vendor/js-init/pickers/init-color-picker.js"></script>

    <!--multiple select-->
    <script src="/backend/assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="/backend/assets/vendor/multi-select/js/jquery.quicksearch.js"></script>
    <!--init multiple select-->
    <script src="/backend/assets/vendor/js-init/init-multiple-select.js"></script>

    <!--datatables-->
    <script src="/backend/assets/vendor/data-tables/jquery.dataTables.min.js"></script>
    <script src="/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js"></script>
    <!--init datatable-->
    <script src="/backend/assets/vendor/js-init/init-datatable.js"></script>

    <script src="/backend/app/permissions.js"></script>

@endsection