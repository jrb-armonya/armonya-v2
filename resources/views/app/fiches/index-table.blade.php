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
    <div class="card card-shadow mb-4" style="border: 1px solid @if(isset($status)) #{{$status->color}} @else #18b9d4 @endif;">
        <div class="card-header border-0" style="background-color:@if(isset($status)) #{{$status->color}} @else #18b9d4 @endif;">
            <div class="custom-title-wrap" style="border: none;">
                <div class="custom-title" style="font-size: 20px; color:white;">
                    {{ $text }}
                </div>
            </div>
        </div>
        <div class="card-body">
            <h5>Recherche par date de rendez-vous</h5>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <input class="form-control " type="date" id="start" name="start">
                </div>
                <div class="col-sm-12 col-md-6">
                    <input class="form-control " type="date" id="end" name="end">
                </div>
            </div>
                   
            <div class="table-responsive">
                <input type="hidden" name="text" id="text" value="{{ $text }}">
                <table class="table table-bordered  dataTable table-hover table-responsive" id="fiches-table" style="width:100%; display: inline-table !important;">
                    <thead>
                        <th>id</th>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>CP</th>
                        <th>Status</th>
                        <th>Date Création</th>
                        <th>Agent</th>
                        <th>Action</th> 
                    </thead>
                    <tbody>
                        @foreach($fiches as $fiche)
                            <tr>
                                <td>{{$fiche->id}}</td>
                                <td>{{$fiche->name}} {{$fiche->prenom}}</td>
                                <td>{{$fiche->d_rv->format('d/m/y')}}</td>
                                <td>{{$fiche->d_rv->format('h:m')}}</td>
                                <td>{{$fiche->cp }}</td>
                                <td> <span class="badge badge-status" style="background-color:#{{$fiche->status->color}};">{{$fiche->status->name }}</span></td>
                                <td>{{ $fiche->created_at->format('d/m/y h:m') }}</td>
                                <td>{{ $fiche->user->name }}</td>
                                <td><i class="ti-search btn-open-fiche" data-id="{{$fiche->id}}"  style=""></i> <a href="/historique/fiche/{{$fiche->id}}" target="_blank" ><i class="ti-direction-alt btn-historic"></i> </a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" id="fiche-modal">
        <div class="modal-dialog modal-lg"  style="width: 90%; box-sizing: border-box; box-shadow: 0px -1px 2px -2px black;">
            <div class="modal-content">
                <div class="modal-header" style="background-color:black padding:5px; background-color: @if(isset($status)) #{{$status->color}} @else #18b9d4 @endif;">
                    <h4 id="fiche-name" style="padding: 10px 0 0 5px; color:white;"></h4>
                    <label class="switch ml-auto">
                        <input type="checkbox" id="lock-fiche" @if(isset($text) && $text=='Toutes les fiches') disabled @endif />
                        <span class="slider round success"></span>
                    </label>
                </div>
                <div class="modal-body">
                    @include('app.fiches.form.form')
                </div>
            </div>
        </div>
    </div>

@endsection
@section('javascript')
    <!--input mask-->
    <script src="{{ asset('/backend/assets/vendor/input-mask/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/init-input-mask.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/datetime-picker/js/bootstrap-datetimepicker.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/timepicker/js/bootstrap-timepicker.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/date-picker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/pickers/init-datetime-picker.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/init-datatable.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/init-select2.js') }}"></script>

    <script src="{{ asset('/backend/app/fiches/add-date-rappel.js') }}"></script>
    <script src="{{ asset('/backend/app/fiches/calcul-credits.js') }}"></script>
    <script src="{{ asset('/backend/app/fiches/open-fiche.js') }}"></script>
    <script src="{{ asset('/backend/app/fiches/populate-modal.js') }}"></script>
    <script src="{{ asset('/backend/app/fiches/add-email-partenaire.js') }}"></script>



    {{-- <script src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script> --}}
@endsection