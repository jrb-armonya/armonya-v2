<h4>Ajouter un Role</h4>
<form action="/configuration/roles/store" method="POST">
    @csrf
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Role</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="name" name="name" placeholder="Role" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="desc" class="col-sm-3 col-form-label">Description</label>
        <div class="col-sm-9">
            <textarea name="desc" id="desc" class="form-control"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="desc" class="col-md-3 col-form-label">Couleur</label>
        <div id="cp2" class="input-group colorpicker-component  col-md-9" title="Using input value">
            <input type="text" class="form-control input-lg" value="#000000" name="color" required/>
            <div class="input-group-append">
                <span class="input-group-addon btn btn-outline-secondary"><i></i></span>
            </div>
        </div>
    </div>  
    <div class="form-group row">
        <div class="col-sm-12 text-right">
            <input type="reset" class="btn btn-secondary" value="Annuler">
            <input type="submit" class="btn btn-primary" value="Enregistrer">
        </div>
    </div>
</form>