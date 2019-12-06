@extends('layouts.app')
@section('css')
    <link href="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="col-md-12">
    <div class="card card-shadow mb-4">
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-info">
                <div class="custom-title">Création d'une nouvelle facture</h4></div>
            </div>
        </div>
        <div class="card-body">
           
            <form method="POST" action="{{ route('factures.new') }}" id="facture-create-form"> 
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label">Veuillez choisir un Partenaire</label>
                    <div class="col-md-9">
                        <select name="partenaire_id" id="partenaire_id" class="form-control" required>
                            <option value="" selected>--------------------------</option>
                            @foreach($partenaires as $p)
                                <option value="{{$p->id}}">{{$p->name}} - {{ $p->fichesCibled()->where('facture_id', null)->count() }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success form-pill submit-create" id="">
                            Créer
                        </button>
                        
                    </div>
                </div>
            </form>

            
        </div>
    </div>
</div>


<div class="col-md-12">
    <div class="card card-shadow mb-4">
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-info">
                <div class="custom-title">Liste des Partenaires</h4></div>
                <div class=" widget-action-link">
                    <div class="dropdown">
                        <a href="#" class="btn btn-transparent text-secondary dropdown-hover p-0" data-toggle="dropdown" aria-expanded="false">
                            <i class=" vl_ellipsis-fill-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right vl-dropdown" x-placement="bottom-end" style="position: absolute; transform: translate3d(16px, 23px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item" href="/configuration/roles"><i class="fa fa-users"></i> &nbsp Roles</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">

            <table  id="data_table" class="table table-bordered table-striped" cellspacing="0">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Nom</td>
                        <td>Facturables</td>
                        <td>#</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partenaires as $partenaire)
                        <tr>
                            <td>{{$partenaire->id}}</td>
                            <td>{{$partenaire->name}}</td>
                            <td>{{ $partenaire->fichesCibled()->where('facture_id', null)->count() }}</td>
                            <td>#</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection
@section('javascript')
    <!--datatables-->
    <script src="{{ asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/init-datatable.js') }}"></script>
@endsection