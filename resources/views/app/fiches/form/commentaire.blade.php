<div class="row">
    {{-- COMMENTAIRE --}}
    <div class="col-xl-6 col-md-6">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap ">
                    <div class="custom-title text-danger"> <i class="icon-speech"></i> COMMENTAIRE 
                    <small> <i class="icon-info "></i> visible sur le pdf.</small></div>
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

    {{-- Commentaire Interne --}}
    <div class="col-xl-6 col-md-6">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap ">
                    <div class="custom-title text-success"> <i class="icon-speech " ></i> COMMENTAIRE INTERNE</div>
                </div>
            </div>
            <div class="card-body">

                {{-- Commentaire --}}
                <div class="form-group row">
                    <textarea class="form-control fiche-input" name="internal_comment" id="internal_comment" rows="3"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>