<form name="selectMonth" action="{{ url('rapports/agent/dateRange') }}" method="post" >
    @csrf
    <div class="form-group row">
        <div class="col-12  mb-1">
            <div class="input-group date dpMonths" data-date-viewmode="months" data-date-format="mm" data-date="12-08-2017">
                <div class="input-group-append">
                    <button id="dp-mdo" class="btn btn-primary" type="button"><i class="fa fa-calendar f14"></i></button>
                </div>
                <input type="text" class="form-control" placeholder="@if(session()->has('month')) {{ session('month') }} / {{ session('year') }} @else {{ date('F', mktime(0, 0, 0, $month, 10)) }} @endif" aria-label="Right Icon" aria-describedby="dp-mdo" name="month">
            </div>
        </div>
        <div class="col-12"> 
            <input type="submit" class="btn btn-success col-md-12" value="Valider">
        </div>
    </div>
</form>