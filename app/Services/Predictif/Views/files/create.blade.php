@extends('layouts.app')
@section('css')
    <link href="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <link href="{{asset('/backend/assets/vendor/ion.rangeSlider-master/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('/backend/assets/vendor/ion.rangeSlider-master/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">

    <style>
        .irs-to {
            font-size: 17px !important;
        }
        .irs-from{
            font-size: 17px !important;
        }
        .irs-single, .irs-max, .irs-grid-text{
            font-size: 17px !important;
        }
        </style>
@endsection
@section('content')
@include('predictif::navbar.navbar')


<div class=" col-md-12">
    <div class="card card-shadow mb-4">
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-primary">
                <div class="custom-title">Générer un nouveau Fichier</div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('application/predictif/file/createNew') }}" method="POST" name="generate-file" id="generate-file">
                @csrf
                <input type="text" name="file_name" id="file-name" class="form-control" placeholder="Nom du fichier" required>
                <strong class="mb-3">{{ $phonesAvailable->count() }}</strong> disponnible de  {{ $phones->count() }} numéros
                <div class="mb-3">
                    <input type="text" class="numbers-slider" id="range_02" name="nbrPhones" value=""
                    data-type="single"
                    data-min="0"
                    data-from-min="0"
                    data-max="{{$phonesAvailable->count()}}"
                    data-to="1"
                    data-grid="true"
                    required
                    />
                </div>
                <button class="btn btn-success col-md-12 mt-2" id="submit-form" style="font-size: 25px;">GENERER</button>
            </form>

        </div>
    </div>


</div>

@endsection


@section('javascript')

<script src="{{ asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script> 
<script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/backend/assets/vendor/js-init/init-datatable.js') }}"></script>


 <!--ion range slider-->
 <script src="{{asset('/backend/assets/vendor/ion.rangeSlider-master/js/ion.rangeSlider.min.js')}}"></script>

 <script src="{{asset('/backend/assets/vendor/js-init/init-ion-slider.js')}}"></script>
@endsection