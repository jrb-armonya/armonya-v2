@extends('layouts.app')

@section('css')
    <link href="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    
    {{-- User Create --}} 
    @include('app.users.forms.create')
    
    {{-- DataTable --}}
    @include('app.users.tables.index')

    {{-- MODAL Update --}}
    @include('app.users.modals.update')
    
    {{-- Confirm Delete User --}}
    @include('app.users.modals.confirm-delete')

@endsection()



@section('javascript')
<!--datatables-->
<script src="{{ asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/backend/assets/vendor/js-init/init-datatable.js') }}"></script>
<script src="{{ asset('/backend/app/users.js') }}"></script>
@endsection