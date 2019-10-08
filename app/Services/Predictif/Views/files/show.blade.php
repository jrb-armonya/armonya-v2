@extends('layouts.app')
@section('css')
    <link href="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
@include('predictif::navbar.navbar')

<div class="row">

    <div class="card bg-secondary card-shadow py-2 text-white col-md-6">
        <div class="card-body">
            <h5 class="font-weight-bold mt-0" title="Number of Orders">Societes</h5>

            <h3 class=" text-center float-left" id="my-created-toDay">{{count($societes)}}</h3>
        </div>
    </div>

    <div class="card bg-secondary card-shadow py-2 text-white col-md-6">
        <div class="card-body">
            <h5 class="font-weight-bold mt-0" title="Number of Orders">Numéros</h5>

            <h3 class=" text-center float-left" id="my-created-toDay">{{$file->phones->count()}}</h3>
        </div>
    </div>

</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Fichier:<small> {{ $file->name }} contient {{ $file->phones_nbr }} numéros.</small></h3>
            <p class="text-muted">le: {{ $file->created_at->format('d/m/Y')  }}</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered  dataTable table-hover table-responsive" id="files-table"  style="width:100%; display: inline-table !important;">
                        <thead>
                            <th>Numéros</th>
                            <th>Société</th>
                            <th>#</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('javascript')
    <script src="{{ asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#files-table').DataTable({
            stateSave: true,
            processing: true,
            serverSide: true,
            columns: [
                {data: 'nbr'},
                {data: 'societe_id'},
                {data:"action", "searchable":false,"orderable":false}
            ],
            ajax: {
                url: "<?= route('get.data.file') ?>",
                type: "post",
                data: function(d){
                    d.file_id = "{{$file->id}}"
                }
            }
        });
    </script>
@endsection    