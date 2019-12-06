@extends('layouts.app')

@section('css')
    <link href="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/assets/vendor/colorpicker/css/bootstrap-colorpicker.css') }}" rel="stylesheet">
@endsection
@section('content')
    
     Group Create
     @include('groups::forms.create')
    
    {{-- DataTable --}}
    @include('groups::tables.index')

    {{-- Confirm Delete User --}}
     @include('groups::modals.confirm-delete') 

@endsection



@section('javascript')
<!--datatables-->
<script src="{{ asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/backend/assets/vendor/colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('/backend/assets/vendor/js-init/init-datatable.js') }}"></script>
<script src="{{ asset('/backend/assets/vendor/js-init/pickers/init-color-picker.js') }}"></script>
<script src="{{ asset('/backend/app/groups.js') }}"></script>

@endsection