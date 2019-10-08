@extends('layouts.app')
@section('css')
    <link href="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')


<div class="col-md-12">
    <button class="btn btn-success" id="doublons-exec">Recherche</button>
</div>

<div class="col-md-12">
    <div class="card card-shadow mb-4">

        <div class="card-header border-0">
            <div class="custom-title-wrap bar-info">
                <div class="custom-title">Doublons</div>
                <div class=" widget-action-link">
                    <div class="dropdown">
                        <a href="#" class="btn btn-transparent text-secondary dropdown-hover p-0" data-toggle="dropdown" aria-expanded="false">
                            <i class="vl_ellipsis-fill-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right vl-dropdown" x-placement="bottom-end" style="position: absolute; transform: translate3d(16px, 23px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <button class="btn" id="search-doublons">Rechercher</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Fiche 1</th>
                            <th>Fiche 2</th>
                            <th>Tel Fix 1</th>
                            <th>Tel Fix 2</th>
                            <th>Tel Mobile 1</th>
                            <th>Tel Mobile 2</th>
                            <th>Status 1</th>
                            <th>Status 2</th>
                            <th>Cause</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($doublons as $d)
                        <tr>
                            <td><span class="{{$d->ficheOne->id}}">{{$d->ficheOne->id}}</span> - <span class="{{$d->ficheTwo->id}}">{{$d->ficheTwo->id}}</span></td>
                            <td><span class="{{$d->ficheOne->id}}">{{$d->ficheOne->name }} {{$d->ficheOne->prenom }}</span> </td>
                            <td><span class="{{$d->ficheTwo->id}}">{{$d->ficheTwo->name }} {{$d->ficheTwo->prenom }}</span> </td>
                            <td class="{{$d->ficheOne->id}}">{{$d->ficheOne->tel_fix }}</td>
                            <td class="{{$d->ficheTwo->id}}">{{$d->ficheTwo->tel_fix }}</td>
                            <td class="{{$d->ficheOne->id}}">{{$d->ficheOne->tel_mobile }}</td>
                            <td class="{{$d->ficheTwo->id}}">{{$d->ficheTwo->tel_mobile }}</td>
                            <td class="{{$d->ficheOne->id}}">{{$d->ficheOne->status->name }}</td>
                            <td class="{{$d->ficheTwo->id}}">{{$d->ficheTwo->status->name }}</td>
                            <td>{{$d->subject }}</td>
                            <td>
                                <a href="{{url('/doublons/is-doublons', [$d->ficheOne->id, $d->id])}}" id="{{ $d->ficheOne->id }}" class="delete-link text-danger">Effacer 1</a> |
                                <a href="{{url('/doublons/is-doublons', [$d->ficheTwo->id, $d->id])}}" id="{{ $d->ficheTwo->id }}" class="delete-link text-danger">Effacer 2</a> |
                                <a href="{{url('/doublons/pas-doublons', [$d->ficheOne->id, $d->ficheTwo->id] )}}" class="text-success">Pas Doublons</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
    <script>
        $('#doublons-exec').click(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route("doublons.exec") }}",
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN
                },
                datatype: 'JSON',
                success: function () {
                    console.log('YEA');
                }
            });
        })

        $("#doublons").click(function(){
            
        });


        // highlite the hoverd one (to delete)
        $('.delete-link').hover(function(){
            id = $(this).attr('id')
            $('.' + id).css('background-color', '#ff6464');
            $('.' + id).css('border-radius', '15px');
            $('.' + id).css('padding', '5px');
            $('.' + id).css('color', 'white');
        }, function(){
            id = $(this).attr('id')
            $('.' + id).css('background-color', 'white');
            $('.' + id).css('color', 'black');
            $('.' + id).css('border-radius', '0');
            $('.' + id).css('padding', '0');
        })
    </script>
@endsection