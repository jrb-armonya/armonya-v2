@extends('layouts.app')

@section('css')
    <link href="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/assets/vendor/colorpicker/css/bootstrap-colorpicker.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-shadow mb-4">
        
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-info">
                <div class="custom-title"><h4>Manager <small class="text-muted">Ajouter des Groups a votre application</small></h4></div>
                <div class=" widget-action-link">
                    <div class="dropdown">
                        <a href="#" class="btn btn-transparent text-secondary dropdown-hover p-0" data-toggle="dropdown" aria-expanded="false">
                            <i class=" vl_ellipsis-fill-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right vl-dropdown" x-placement="bottom-end" style="position: absolute; transform: translate3d(16px, 23px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item" href="/configuration/users"><i class="fa fa-users"></i> &nbsp Utilisateurs</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- Name et description --}}
            <div class="row">

                <div class="col-lg-12">

                    HELLO 
                </div>
                
                
            </div>
        </div>

    </div>
</div>




@endsection()

@section('javascript')
<script src="{{ asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/backend/assets/vendor/js-init/init-datatable.js') }}"></script>
<script src="{{ asset('/backend/assets/vendor/colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('/backend/assets/vendor/js-init/pickers/init-color-picker.js') }}"></script>

@endsection