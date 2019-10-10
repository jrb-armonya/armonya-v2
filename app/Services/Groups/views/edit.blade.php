@extends('layouts.app')

@section('css')
    <!--color picker-->
    <link href="/backend/assets/vendor/colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet">
    <!--multiple select-->
    <link href="/backend/assets/vendor/multi-select/css/multi-select.css" rel="stylesheet">

@endsection

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card card-shadow mb-8 ">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-warning">
                    <div class="custom-title">
                        Editer: {{ $group->name }}
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{-- Name et description --}}
                @include('groups::forms.update')
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

@endsection