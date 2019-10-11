@extends('layouts.app')
@section('css')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--select2-->
<link href="{{ asset('/backend/assets/vendor/select2/css/select2.css') }}" rel="stylesheet">

<link href="{{ asset('/backend/assets/vendor/datetime-picker/css/datetimepicker.css') }}" rel="stylesheet">
<link href="{{ asset('/backend/assets/vendor/timepicker/css/timepicker.css') }}" rel="stylesheet">
<link href="{{ asset('/backend/assets/vendor/date-picker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/jquery-clockpicker.min.css">
@endsection

@section('content')
    
    @if($title === "Mes Rappels")
    <h3>Mes Rappels</h3>
    @else
    <h3>Vous pouvez consulter que les fiches du mois en cours</h3>
    @endif
    <div class="card card-shadow mb-4" style="border: 1px solid #53c4fb;">
        <div class="card-header border-0">
            <div class="custom-title-wrap">
                <div class="custom-title" style="font-size: 20px; ">
                    {{ $title }} <span> : {{$fiches->count()}} </span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered  dataTable table-hover table-responsive" id="fiches-table" style="width:100%; display: inline-table !important;">
                    <thead>
                        <th>id</th>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Status</th>
                        <th>Date Création</th>
                        <th>ACTIONS</th>
                    </thead>
                    <tbody>
                        @foreach ($fiches as $fiche)
                        <tr>
                            <td>{{$fiche->id}}</td>
                            <td>{{$fiche->name}} {{$fiche->prenom}}</td>
                            <td>{{$fiche->d_rv->format('d/m/Y')}}</td>
                            <td>{{$fiche->h_rv}}</td>
                            <td><span class="badge badge-status" style="background-color: #{{$fiche->status->color}};">{{$fiche->status->name}}</span></td>
                            <td>{{$fiche->created_at->format('d/m/Y h:m')}}</td>

                            <td>
                                @if($title == "Mes Rappels")
                                <button 
                                    type="button" 
                                    class="btn btn-link form-pill btn-action open-btn"> 
                                <i class="ti-search btn-open-fiche" data-id="{{$fiche->id}}"></i>
                                </button>
                                <button 
                                    type="button"
                                    class="btn btn-link form-pill btn-action delete-btn"
                                    data-id={{ $fiche->id }}
                                    data-toggle="modal" data-target="#fiche-delete" data-whatever="@mdo"> 
                                    <i class="fa fa-trash icon-action-red"></i>
                                </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- OPEN FICHE MODAL --}}
   <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" id="fiche-modal">
        <div class="modal-dialog modal-lg"  style="width: 90%; box-sizing: border-box; box-shadow: 0px -1px 2px -2px black;">
            <div class="modal-content">
                <div class="modal-header" style="background-color:black padding:5px; background-color: #4cc3fe;">
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

    {{-- DELETE MODAL --}}
    <div class="modal fade" id="fiche-delete" tabindex="-1" role="dialog" aria-labelledby="FicheModalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="FicheModalDeleteLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body text-center">
                    <h1><i class="fa fa-warning" style="color: #f3516b;"></i></h1>
                    <p>Etes-vous sûr de vouloir supprimer votre Rappel?</p>
                    <h3 id="fiche-to-delete">  </h3>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <input type="submit" class="btn btn-danger" value="Supprimer" id="delete">
                </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
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

<script src="{{ asset('/backend/app/fiches/calcul-credits.js') }}"></script>
<script src="{{ asset('/backend/app/fiches/open-fiche.js') }}"></script>
<script src="{{ asset('/backend/app/fiches/populate-modal.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/jquery-clockpicker.min.js"></script>
<script src="{{asset('/backend/app/fiches/delete.js')}}"></script>
@endsection