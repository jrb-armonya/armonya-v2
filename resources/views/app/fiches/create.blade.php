@extends('layouts.app')

@section('css')
    <!--datetime & time picker-->
    <link href="{{ asset('/backend/assets/vendor/datetime-picker/css/datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/assets/vendor/date-picker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <link href="{{ asset('/backend/assets/vendor/timepicker/css/timepicker.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/jquery-clockpicker.min.css">
    <style>
        .card-header{
            padding: 5px;
        }
        .card{
            margin-bottom: 5px !important;
        }
        .custom-title-wrap{
            padding: 0px !important;
            margin-top: 0px !important;
        }
        .card-body{
            padding-top: 0px;
            padding-bottom: 0px;
        }
        #date_rendez_vous{
            border-left: 1px solid #3970f4;
            border-top: 1px solid #3970f4;
            border-bottom: 1px solid #3970f4;
            border-right: 0;
        }
        #input_data_rendez_vous{
            border-right: 1px solid #3970f4;
            border-top: 1px solid #3970f4;
            border-bottom: 1px solid #3970f4;
            border-left: 1px solid #3970f4;
        }
        .form-group {
            padding:0 !important;
            margin-top:0rem !important;
            margin-bottom:0.5rem !important;
        }
        #name, #prenom {
            border-color: green;
        }
    </style>
@endsection

@section('content')
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="round-form" role="tabpanel" aria-labelledby="round-form-tab">
        @include('app.fiches.form.form')
    </div>
</div>
@endsection

@section('javascript')
    <script src="{{ asset('/backend/assets/vendor/input-mask/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/init-input-mask.js') }}"></script>

    <script src="{{ asset('/backend/assets/vendor/datetime-picker/js/bootstrap-datetimepicker.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/date-picker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/timepicker/js/bootstrap-timepicker.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/pickers/init-datetime-picker.js') }}"></script>
    <script src="{{ asset('/backend/app/fiches/calcul-credits.js') }}"></script>
    <script src="{{ asset('/backend/app/fiches/submit.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/jquery-clockpicker.min.js"></script>

@endsection
