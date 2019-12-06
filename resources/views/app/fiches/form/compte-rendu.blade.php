{{-- COMMENTAIRE --}}
<div class="col-xl-12 col-md-12">
    <div class="card card-shadow mb-4">
        <div class="card-header border-0">
            <div class="custom-title-wrap ">
                <div class="custom-title text-danger"> <i class="icon-speech"></i> COMMENTAIRE 
                <small> <i class="icon-info "></i> Commentaire d'Armonya.</small></div>
            </div>
        </div>
        <div class="card-body">

            {{-- Commentaire --}}
            <div class="form-group row">
                <textarea class="form-control fiche-input" name="commentaire" id="commentaire" rows="3"></textarea>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-12 col-md-12">
    <div class="card card-shadow mb-4">
        <div class="card-header border-0">
            <div class="custom-title-wrap ">
                <div class="custom-title text-success"> <i class="icon-speech"></i> COMPTE RENDU 
                    <small> <i class="icon-info "></i> Votre Compte Rendu.</small>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- Compte Rendu --}}
            <div class="form-group row">
                <textarea class="form-control" name="cr" id="compte-rendu" rows="3" required autofocus></textarea>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="state" id="cible" value="Ciblé" checked>
                <label class="form-check-label text-success" for="cible">Ciblé</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="state" id="lapin" value="Lapin">
                <label class="form-check-label text-danger" for="lapin">Lapin</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="state" id="hc" value="Hc">
                <label class="form-check-label text-danger" for="hc">Hc</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="state" id="rAudit" value="Refus d'audit">
                <label class="form-check-label text-danger" for="rAudit">Refus d'audit</label>
            </div>
        </div>
        <hr>
        <!-- CRS goes here with JS => populate-modal.js -->
        <ul class="media-list" id="cr-zone"></ul>
    </div>
</div>

