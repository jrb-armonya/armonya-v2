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
    <div class="card card-shadow mb-4" style="border: 1px solid @if($text == 'noValid')#f1536e @else #4cc3fe @endif;">
        <div class="card-header border-0" style="background-color:@if($text == 'noValid')#f1536e @else #4cc3fe @endif;">
            <div class="custom-title-wrap" style="border: none;">
                <div class="custom-title" style="font-size: 20px; color:white;">
                    {{ $text }}
                </div>
            </div>
        </div>
        <div class="card-body">
            @include('app.fiches.parts.date-range')
            {{-- Choix de voir fiches agents ou toutes --}}
            @if($text == 'Créer ce mois')
                @include('app.fiches.parts.checkbox-agents-or-all')
            @endif
                   
            <div class="table-responsive mt-2">
                <input type="hidden" name="text" id="text" value="{{ $text }}">
                <table class="table table-bordered  dataTable table-hover table-responsive" id="fiches-table" style="width:100%; display: inline-table !important;">
                    <thead>
                        <th>id</th>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>CP</th> 
                        <th>Status</th>
                        <th>Action</th> 
                    </thead>
                    <tbody>
                        
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
    <script src="{{ asset('/backend/assets/vendor/input-mask/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/init-input-mask.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/datetime-picker/js/bootstrap-datetimepicker.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/timepicker/js/bootstrap-timepicker.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/date-picker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/pickers/init-datetime-picker.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
    {{-- <script src="{{ asset('/backend/assets/vendor/js-init/init-datatable.js') }}"></script> --}}
    <script src="{{ asset('/backend/assets/vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/init-select2.js') }}"></script>

    <script src="{{ asset('/backend/app/fiches/add-date-rappel.js') }}"></script>
    <script src="{{ asset('/backend/app/fiches/calcul-credits.js') }}"></script>
    <script src="{{ asset('/backend/app/fiches/open-fiche.js') }}"></script>
    <script src="{{ asset('/backend/app/fiches/populate-modal.js') }}"></script>
    <script src="{{ asset('/backend/app/fiches/add-email-partenaire.js') }}"></script>



    <script src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

    <script>
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
            // preDrawCallback: function(settings) {$(".dataTables_processing").hide(); return true;},
            // drawCallback: function(settings) {$(".dataTables_processing").hide();},
            columns: [
                    {data: 'id'},
                    {data: 'name'},
                
                    {data: "date_rendez_vous"},
                    {data: "heure_rendez_vous"},
                    {data: "cp"},
                    // {data: "cgp", "orderable":false,},
                    // {data: "cab", "orderable":false,},
                    // {data: "restants", "orderable":false,},
                    {data: "status"},
                    // {data: "created_at"},
                    // {data: "user_id"},
                    // {data: "nrp"},
                    // {data: "sms"},
                    {data:"action", "searchable":false,"orderable":false}
            ],
            ajax: {
                url: "<?= route('get.data') ?>",
                type: "post",
                data: function(d){
                    d.text = "<?= $text ?>";
                    d.start_date= document.getElementById('start').value;
                    d.end_date= document.getElementById('end').value;
                    d.type= "<?= $text ?>";
                    d.allUsers = $('#allUsers').is(':checked');
                }
            }
        });

        /*setInterval(function()
        {
            table.ajax.reload(null, false);
        }, 5000); // 10 second interval
        */
        // $('.dataTables_processing', $('#example').closest('.dataTables_wrapper')).hide();
    </script>

@endsection