<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title"> <i class="fa fa-thumbs-o-up"></i> CR ZONE</div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('armonya.cr.send') }}" method="POST">
                    @csrf
                    <input type="hidden" name="fiche_id" id="id-for-cr" value="" required>
                    <div class="form-group row">

                        <textarea class="form-control" name="cr_msg" id="cr-msg" rows="3"></textarea>

                    </div>

                    <div class="panel-body">

                        <button type="submit" class="btn btn-info pull-right">Enregistrer</button>

                        <div class="clearfix"></div>

                        <hr>

                        <!-- CRS goes here with JS => populate-modal.js -->
                        <ul class="media-list" id="cr-zone"></ul>
                    </div>

                </form>


            </div>
        </div>
    </div>
</div>


