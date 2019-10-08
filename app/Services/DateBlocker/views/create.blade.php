<div class="col-md-12">
    <div class="card card-shadow mb-4">
        <div class="card-header border-0">
            <div class="custom-title-wrap bar-info">
                <div class="custom-title"><h4>Manager <small class="text-muted">Vous pouvez bloquer et débloquer des dates</small></h4></div>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('dates.store') }}" id="date-form-create"> 
                @csrf

                <div class="form-group row" style="margin-bottom: 2px;">
                    {{-- Date du rendez-vous sm-6 --}}
                    <div class="col-sm-12 mb-1">
                        {{-- form_datetime-component --}}
                        <div class="input-group date form_datetime-blocker-component" style="height: 50px;" >
                            <div class="input-group-append">
                                <button  id="date" class="btn btn-outline-secondary" type="button"><i class="fa fa-calendar"></i></button>
                            </div>
                            <input type="text" class="form-control date-set" id="date"
                                name="date"
                                aria-label="Right Icon" aria-describedby="date"
                                placeholder="Date a bloquer"
                                style="height: 50px; font-size:30px; border-color:#3970f4;"
                                required>
                        </div>
                    </div>
                    
                   
                </div>



                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success form-pill submit-create" id="">
                            Enregistrer
                        </button>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>