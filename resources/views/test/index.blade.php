<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!--bootstrap styles-->
    <link href="{{ asset('/backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    

    <div class="table-responsive">
        <table class="table table-bordered  dataTable table-hover table-responsive" id="table" style="width:100%; display: inline-table !important;">
            <thead>
                <th>id</th>
                <th>Nom</th>
                <th>Status</th>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>

    <script type="text/javascript" src="{{ asset('backend/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?= route('get.data.test') ?>",
            },
        });
    </script>

</body>
</html>