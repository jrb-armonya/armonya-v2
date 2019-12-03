@extends('espace-partenaire::layouts.espace-partenaire')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection
@section('breadcrumb')
<nav aria-label="breadcrumb" class="d-inline-block ">
    <ol class="breadcrumb p-0">
        <li class="breadcrumb-item"><a href="{{url('/espace-partenaire')}}">Dashboard</a></li>
        {{-- <li class="breadcrumb-item"><a href="icon-fontawesome.html#">Sécurité</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page">Notifications</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card card-shadow mb-4">
        <div class="card-header border-0" style="background-color:#4cc3fe">
            <div class="custom-title-wrap" style="border: none;">
                <div class="custom-title" style="font-size: 20px; color:white;">
                    Toutes mes notifications
                </div>
            </div>
        </div>
        <div class="card-body">
            <p>
                L'icone  <i class="ti-search btn-open-fiche"></i> 
                permet de voir les détails du rendez-vous.
            </p>
            <p>Vous devez appuiez sur <code>Echap</code> pour fermer les détails du rendez-vous</p>
            <table class="table table-bordered  dataTable table-hover table-responsive" id="fiches-table-partenaire" style="width:100%; display: inline-table !important;">
                <thead>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Vu le</th>

                </thead>
                <tbody>
                    @foreach($notifications as $notification)
                        <td>{{ $notification->type }}</td>
                        <td>{{ $notification->created_at->format('dd/mm/YYYY') }}</td>
                        <td>{{ $notification->read_at->format('dd/mm/YYYY') }}</td>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" id="fiche-modal">
    <div class="modal-dialog modal-lg"  style="width: 90%; box-sizing: border-box; box-shadow: 0px -1px 2px -2px black;">
        <div class="modal-content">
            <div class="modal-header" style="background-image: linear-gradient(#0f192f, #232a40); padding:5px; background-color: #4cc3fe;">
                <h3 id="fiche-name" style="padding: 10px 0 0 5px; color:white; text-align:center;"></h3>
            </div>
            <div class="modal-body">
                @include('app.fiches.form.espace-partenaire-form')
            </div>
        </div>
    </div>
</div> --}}
@endsection
@section('javascript')
    <!--datatables-->
    <script src="{{ asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.20/sorting/date-eu.js"></script>
    <script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/init-datatable.js') }}"></script>
    <script src="{{ asset('/backend/app/fiches/calcul-credits.js') }}"></script>
    <script src="{{ asset('/backend/app/fiches/open-fiche.js') }}"></script>
    {{-- <script src="{{ asset('/backend/app/fiches/populate-modal.js') }}"></script> --}}
    <script src="{{ asset('/backend/app/fiches/espace-partenaire-populate-modal.js') }}"></script>
@endsection