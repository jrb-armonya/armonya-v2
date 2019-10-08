<form action="{{route('permission.store')}}" method="POST">
    @csrf                      
    <div class="form-group">
        <label for="name">Permission</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="desc">Description</label>
        <input type="text" name="desc" id="desc" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary col-md-12" value="Enregistrer">
    </div>
</form>