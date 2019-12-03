@extends('layouts.app')
@section('css')
    <link href="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
@include('predictif::navbar.navbar')
    <div class="card">
        <div class="card-header">
            Fichiers
        </div>
        <div class="card-body">
            <div class="table-responsivce">
                <table class="table" id="data_table">
                    <thead>
                        <tr>
                            <td>Uiid</td>
                            <td>Soc_nbr</td>
                            <td>Phones_nbr</td>
                            <td>Generated</td>
                            <td>Date de création</td>
                            <td>#</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($files as $file)
                        <tr>
                            <td>{{$file->name}}</td>
                            <td>{{$file->societe_nbr}}</td>
                            <td>{{$file->phones_nbr}}</td>
                            <td><i class="fa fa-circle @if($file->generated) text-green @else text-red @endif"></i></td>
                            <td>{{$file->created_at->format('d/m/Y')}}</td>
                            <td>
                                <a href="{{route('files.show', $file->id)}}">
                                    <button class="btn btn-primary btn-sm"> Voir </button>
                                </a>

                                {{-- <a href="{{route('files.destroy', $file->id)}}">
                                    <button class="btn btn-danger btn-sm"> Supprimer </button>
                                </a>

                                <a href="{{route('files.generate', $file->id)}}">
                                    <button class="btn btn-warning btn-sm text-white"> <i class="fa fa-star-o mr-2"></i> Generate</button>
                                </a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


@section('javascript')

<script src="{{ asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script> 
<script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/backend/assets/vendor/js-init/init-datatable.js') }}"></script>
@endsection    