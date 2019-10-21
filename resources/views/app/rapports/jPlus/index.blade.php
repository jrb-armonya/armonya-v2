@extends('layouts.app')
@section('css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--select2-->
    <link href="{{ asset('/backend/assets/vendor/select2/css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/assets/vendor/datetime-picker/css/datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/assets/vendor/timepicker/css/timepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/assets/vendor/date-picker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-warning">
                    <div class="custom-title">Rapport jPlus</div>
                </div>
            </div>
            <div class="card-body">
                <h5>Choisir une date</h5>
                <form action="{{route('calculJPlus')}}" method="post">
                    @csrf
                    <div class="row">
                        <input class="form-control col-12" type="text" placeholder="choisir une date" value="{{ $date }}" id="jp-date" name="date">
                        <input type="submit" class="col-12 btn btn-success" value="Valider">
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-xl-6 col-sm-6">
                    <div class='card card-rapports-roles mb-4 bg-success'>
                        <div class="card-body">
                            <div class="media d-flex align-items-center">
                                <div class="media-body text-light">
                                    <h4 class="text-uppercase mb-0 weight500">{{ $resultat['day'] }}</h4>
                                    <h4> Moyenne Jour </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-6">
                    <div class='card card-rapports-roles mb-4 bg-primary'>
                        <div class="card-body">
                            <div class="media d-flex align-items-center">
                                <div class="media-body text-light">
                                    <h4 class="text-uppercase mb-0 weight500">{{ $resultat['month'] }}</h4>
                                    <h4> Moyenne Mois </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>


</div>


@endsection

@section('javascript')
    <script src="{{asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{asset('/backend/assets/vendor/date-picker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{asset('/backend/assets/vendor/js-init/init-datatable.js') }}"></script>
    <script src="{{asset('/backend/assets/vendor/js-init/pickers/init-date-picker.js') }}"></script>
@endsection