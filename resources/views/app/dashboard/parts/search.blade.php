<!--search modal start-->
<div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">


                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recherchez ici une fiche" id="search-form" autofocus>
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary" id="search-form-submit">Rechercher</button>
                    </div>
                </div>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> 
                </button>
                <br>
            </div>
            <div class="modal-body">
                    <p style="color: red;">Vous pouvez voir que le statut et l'historique de la fiche</p>
                    @include('app.dashboard.parts.result')
            </div>
        </div>
    </div>
</div>
<!--search modal stop-->