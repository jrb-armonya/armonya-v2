@extends('layouts.app')

@section('css')
    <!--data table-->
    <link href="/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.css" rel="stylesheet">
   
@endsection
@section('content')
    {{-- User Create --}}
    @include('app.partenaires.forms.create')
    
    {{-- DataTable --}}
    @include('app.partenaires.tables.index')
    @include('app.partenaires.modals.confirm-delete')
    
@endsection
    
{{-- Confirm Delete User --}}


@section('javascript')
<script src="{{ asset('backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/js-init/init-datatable.js') }}"></script>
<script src="{{ asset('/backend/app/partenaires/partenaires.js') }}"></script>
@endsection