@extends('layouts.app')
@section('css')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--select2-->
<link href="{{asset('/backend/assets/vendor/select2/css/select2.css')}}" rel="stylesheet">

<!--datetime & time picker-->
<link href="{{asset('/backend/assets/vendor/datetime-picker/css/datetimepicker.css')}}" rel="stylesheet">
<link href="{{asset('/backend/assets/vendor/timepicker/css/timepicker.css')}}" rel="stylesheet">

<link href="{{asset('/backend/assets/vendor/date-picker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/jquery-clockpicker.min.css">

@endsection

@section('content')
    <div class="card card-shadow mb-4" style="border: 1px solid #{{$status->color}};">
        <div class="card-header border-0" style="background-color:#{{$status->color}};">
            <div class="custom-title-wrap" style="border: none;">
                <div class="custom-title" id="status-name" style="font-size: 20px; color:white;">
                    {{ $status->name }}
                </div>
            </div>
        </div>
        <div class="card-body">
            
            @include('app.fiches.parts.date-range')
            <div class="table-responsive">
                <input type="hidden" name="" id="status_id" value="{{ $status->id }}">
                <table class="table table-bordered  dataTable table-hover table-responsive" id="fiches-table" style="width:100%; display: inline-table !important;">
                    <thead>
                        <th>id</th>
                        <th>Nom</th>
                        <th>Date @if($status->name == "A Reporter") Rappel @endif</th>
                        <th>Heure @if($status->name == "A Reporter") Rappel @endif</th>
                        <th>CP</th>
                        @if($status->name != "A Ecouter")
                            <th>CGP</th>
                            <th>CAB</th>
                        @endif
                        <th>Restants</th>
                        {{-- <th>Status</th> --}}
                        <th>Date Création</th>
                        <th>Agent</th>
                        @if($status->name == "Attente CR")
                            <th>Partenaire</th>
                        @endif
                        @if($status->name != "A Ecouter")
                        <th>NRP</th> 
                        <th>SMS</th>
                        @endif
                        <th>Action</th> 
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" id="fiche-modal">
        <div class="modal-dialog modal-lg"  style="width: 90%; box-sizing: border-box; box-shadow: 0px -1px 2px -2px #{{$status->color}};">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#{{$status->color}}; padding:5px;">
                    <h4 id="fiche-name" style="padding: 10px 0 0 5px; color:white;"></h4>
                    <label class="switch ml-auto">
                        <input type="checkbox" id="lock-fiche">
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
    <script src="{{ asset('/backend/assets/vendor/input-mask/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/init-input-mask.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/datetime-picker/js/bootstrap-datetimepicker.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/timepicker/js/bootstrap-timepicker.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/date-picker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/pickers/init-datetime-picker.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/init-select2.js') }}"></script>

    <script src="{{ asset('/backend/app/fiches/add-date-rappel.js') }}"></script>
    <script src="{{ asset('/backend/app/fiches/calcul-credits.js') }}"></script>
    <script src="{{ asset('/backend/app/fiches/open-fiche.js') }}"></script>
    <script src="{{ asset('/backend/app/fiches/populate-modal.js') }}"></script>
    <script src="{{ asset('/backend/app/fiches/add-email-partenaire.js') }}"></script>
    <script src="{{ asset('/backend/app/fiches/email-annulation.js') }}"></script>
    

    <script src="{{ asset('/backend/app/fiches/add-partenaire.js') }}"></script>
    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>


    <script>

        $("#start").val($.cookie("start"));
        $("#end").val($.cookie("end"));



        // $("#start").val() = start_date;
        
        let table;
        //Data Table for Fiches (server side)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        table = $("#fiches-table").DataTable({
            stateSave: true,
            processing: true,
            serverSide: true,
            lengthMenu: [ 5, 10, 25, 50 ],
            preDrawCallback: function(settings) {$(".dataTables_processing").hide(); return true;},
            drawCallback: function(settings) {$(".dataTables_processing").hide();},
            columns: [
                    {data: 'id'},
                    {data: 'name'},
                @if($status->name == "A Reporter")
                    {data: "date_rappel"},
                    {data: "heure_rappel"},
                @else
                    {data: "date_rendez_vous"},
                    {data: "heure_rendez_vous"},
                @endif
                    {data: "cp"},
                @if($status->name != "A Ecouter")
                    {data: "cgp", "orderable":false},
                    {data: "cab", "orderable":false},
                @endif
                    {data: "restants", "orderable":false},
                    // {data: "status", "orderable":false},
                    {data: "created_at"},
                    {data: "user_id", "orderable":false},
                @if($status->name == "Attente CR")
                    {data: "partenaire_id"},
                @endif
                @if($status->name != "A Ecouter")
                    {data: "nrp", "orderable":false},
                    {data: "sms", "orderable":false},
                @endif
                    {data:"action", "searchable":false,"orderable":false}
            ],
            ajax: {
                url: "<?= route('get.data') ?>",
                type: "post",
                data: function(d){
                    d.status_id = "<?= $status->id ?>";
                    d.start_date= document.getElementById('start').value;
                    d.end_date= document.getElementById('end').value;
                    d.type= "<?= $type ?>";
                    d.type= "<?= $type ?>";
                    d.created_at = $('#created_at').is(':checked');
                }
            },
            columnDefs: [
                { "type": "date-eu", targets: [2, 5] }
            ],
        });

        $("#start, #end, #created_at").change(function(){
            $.cookie("start", $('#start').val() );
            $.cookie("end", $('#end').val() );

            table.ajax.reload(null, false);
        });
        // setInterval(function()
        // {
        //     table.ajax.reload(null, false);
        // }, 5000); // 10 second interval

        // $('.dataTables_processing', $('#example').closest('.dataTables_wrapper')).hide();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/jquery-clockpicker.min.js"></script>

@endsection