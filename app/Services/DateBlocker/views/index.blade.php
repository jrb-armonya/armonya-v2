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
    @include('dateblocker::create')

    @include('dateblocker::list')

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

<script src="{{ asset('/backend/assets/vendor/datetime-picker/js/bootstrap-datetimepicker.js') }}"></script>

{{-- V 1.7 --}}
<script src="{{ asset('/backend/assets/vendor/date-picker/js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ asset('/backend/assets/vendor/timepicker/js/bootstrap-timepicker.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> --}}
<script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
{{-- <script src="{{ asset('/backend/app/users.js') }}"></script> --}}

<script src="{{ asset('/backend/assets/vendor/js-init/init-datatable.js') }}"></script>
<script src="{{ asset('/backend/assets/vendor/js-init/pickers/init-datepicker-blocker.js') }}"></script>
@endsection