{{-- My Stats --}}

@include('app.parts.widgets.components.my-total-created-today')
{{-- @include('app.parts.widgets.components.agent-team') --}}
{{-- My Team Stats --}}

@section("{{ Auth::user()->role->name }}")
<script src="{{asset('/backend/app/widgets/my-total-created-today.js')}}"></script>
{{-- <script src="{{asset('/backend/app/widgets/agent-team.js')}}"></script> --}}
@endsection 