@section('content')

  {{ Form::create($id, $name, $method, $action, $class) }}


  {{ Form::submit() }}
  {{ Form::end() }}

@endsection