@extends('layouts.app')

@section('css')
    <link href="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/assets/vendor/datetime-picker/css/datetimepicker.css') }}" rel="stylesheet"> 
    <link href="{{ asset('/backend/assets/vendor/date-picker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"> -
    <link href="{{ asset('/backend/assets/vendor/timepicker/css/timepicker.css') }}" rel="stylesheet"> 
    <link href="{{ asset('/backend/assets/vendor/date-picker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    
    {{-- @include('app.users.forms.create') --}}
    
    {{-- Date Create --}} 
    @include('security::create')

    @include('security::list')

    {{-- DataTable --}}
    {{-- @include('app.users.tables.index') --}}

    {{-- MODAL Update --}}
    {{-- @include('app.users.modals.update') --}}
    
    {{-- Confirm Delete User --}}
    {{-- @include('app.users.modals.confirm-delete') --}}

@endsection()



@section('javascript')
    <!--datatables-->
    <script src="{{ asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script> 
    <script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
    
    <script src="{{ asset('/backend/assets/vendor/js-init/init-datatable.js') }}"></script>
    <!--input mask-->
    <script src="{{ asset('/backend/assets/vendor/input-mask/jquery.inputmask.bundle.js') }}"></script>
    <!--init input mask-->
    <script src="{{ asset('/backend/assets/vendor/js-init/init-input-mask.js')}}"></script>
    
@endsection