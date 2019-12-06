@extends('layouts.app')
@section('css')
    <link href="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')

@include('predictif::navbar.navbar')

@include('predictif::magasin.counters')

@include('predictif::societe.create')

@if ($errors->any())

    <div class="alert alert-danger alert-dismissible fade show" role="alert">

        @foreach ($errors->all() as $error)
            <strong><li>{{ $error }}</li></strong>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    
@endif

@include('predictif::societe.list')
    
@endsection


@section('javascript')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
                }, false);
            });
            }, false);
        })();

        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myList li").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    <script src="{{ asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        // Disable button when adding societes
        $( "#add-societe" ).submit(function( event ) {
            $('#add-btn').prop('disabled', true);

            $('#add-btn').addClass('loading');
            $( "#add-societe" ).submit();
            event.preventDefault();
        });

        $("#add-societe").on('keydown',function(){
            $('#add-btn').prop('disabled', false);
            
        })

        $('#fiches-table').dataTable({
            stateSave: true,
        });
    </script>
    <script src="{{ asset('/backend/assets/vendor/input-mask/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/js-init/init-input-mask.js') }}"></script>
    <script src="{{ asset('/backend/app/generator/magazin.js')}} "></script>

@endsection
