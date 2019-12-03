<form id="user-form" method="POST" action="{{url('/')}}/configuration/users/update">
    @csrf
    <div class="modal-body">
        <div class="" id="userForm"></div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <input type="submit" class="btn btn-primary" value="Enregistrer" id="submit">
    </div>
</form>