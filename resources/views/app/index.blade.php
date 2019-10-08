@extends('layouts.app')
@section('content')
<div class="row">
    {{-- Afficher le ficher parts/widget/{RoleName}  de chaque Role --}}
    @foreach($roles as $role)
        @if($role->id == Auth::user()->role_id)
            @include("app.parts.widgets.".str_replace(" ", "_", $role->name))
        @endif
    @endforeach
</div>

@endsection

@section('javascript')
    <script src="{{ asset('/backend/assets/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/chartjs/init-doughnut-chart.js') }}"></script>
    <script src="{{ asset('/backend/app/presence.js') }}"></script>
@endsection