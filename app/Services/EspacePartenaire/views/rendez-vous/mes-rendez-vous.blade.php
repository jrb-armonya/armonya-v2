@extends('espace-partenaire::layouts.espace-partenaire')
@section('breadcrumb')
<nav aria-label="breadcrumb" class="d-inline-block ">
    <ol class="breadcrumb p-0">
        <li class="breadcrumb-item"><a href="{{url('/espace-partenaire')}}">Dashboard</a></li>
        {{-- <li class="breadcrumb-item"><a href="icon-fontawesome.html#">Sécurité</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page">Mes rendez-vous</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card card-shadow mb-4">
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-primary">
                Mes rendez-vous
            </div>
        </div>
        <div class="card-body">
            <p>
                Liste de vos rendez-vous
            </p>
            <table class="table table-bordered  dataTable table-hover table-responsive" id="fiches-table" style="width:100%; display: inline-table !important;">
                <thead>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Date rendez-vous</th>
                    <th>Heure rendez-vous</th>
                    <th>CP</th>
                    <th>CAB</th>
                    <th>Date de réception</th>
                    <th>Action</th> 
                </thead>
                <tbody>
                    @foreach ($fiches as $fiche)
                        <tr>
                            <td>{{ $fiche->id}}</td>
                            <td>{{ ucfirst($fiche->name) . ' ' . ucfirst($fiche->prenom)}}</td>
                            <td>{{ $fiche->d_rv->format('d/m/Y')}}</td>
                            <td>{{ $fiche->h_rv }}</td>
                            <td>{{ $fiche->cp }}</td>
                            <td>{{ $fiche->cab }}</td>
                            <td>{{ $fiche->d_env ? $fiche->d_env->format('d/m/Y H:i') : '' }}</td>
                            <td>
                                <i class="ti-search btn-open-fiche" data-id="{{$fiche->id}}"></i>
                            <a href="{{ url('/pdf/' . $fiche->id) }}" target="_blank"><i class="fa fa-file-pdf-o btn-historic"></i></a>

                            </td>
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
            <div class="modal-header" style="background-color:black padding:5px; background-color: #4cc3fe;">
                <h4 id="fiche-name" style="padding: 10px 0 0 5px; color:white;"></h4>
                {{-- <label class="switch ml-auto">
                    <input type="checkbox" id="lock-fiche" @if(isset($text) && $text=='Toutes les fiches') disabled @endif />
                    <span class="slider round success"></span>
                </label> --}}
            </div>
            <div class="modal-body">
                @include('app.fiches.form.espace-partenaire-form')
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    <!--datatables-->
    <script src="{{ asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/init-datatable.js') }}"></script>
    <script src="{{ asset('/backend/app/fiches/calcul-credits.js') }}"></script>
    <script src="{{ asset('/backend/app/fiches/open-fiche.js') }}"></script>
    {{-- <script src="{{ asset('/backend/app/fiches/populate-modal.js') }}"></script> --}}
    <script src="{{ asset('/backend/app/fiches/espace-partenaire-populate-modal.js') }}"></script>
@endsection