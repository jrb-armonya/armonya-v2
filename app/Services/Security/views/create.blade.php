<div class="col-md-12">
    <div class="card card-shadow mb-4">
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-info">
                <div class="custom-title"><h4>Manager <small class="text-muted">Vous pouvez Authorisez les ips</small></h4></div>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('security.store') }}" id="date-form-create"> 
                @csrf

                <div class="form-group row" style="margin-bottom: 2px;">
                    {{-- Date du rendez-vous sm-6 --}}
                    <div class="col-sm-12 mb-1">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label col-form-label-sm  text-right">Ip Address</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="" name="ip" required>
                                <small class="form-text text-muted">Example : 192.168.123.321</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-1">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label col-form-label-sm text-right">Nom</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="nom" name="name">
                                <small class="form-text text-muted">Example : pc-1</small>
                            </div>
                        </div>
                    </div>
                    
                   
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success form-pill" id="">
                            Enregistrer
                        </button>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>