<?php
    if(isset($status)){
        $status = Status::statusAllowed($status->id);
    } else $status = [];

    if(isset($text) && $text =="noValid"){
        $status = App\Status::all();
    }
?>
<div class="input-group col-sm-6" style="margin-bottom: 5px;">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Statut</span>
        </div>
        <select class="custom-select fiche-input _status" name="status_id" id="status_id" style="height: 53px; font-size: 20px;">
        <option value="0" selected>----------------</option>
            @foreach($status as $st)
                <option value="{{ $st->id }}">{{ $st->name }}</option>
            @endforeach
        </select>
    </div>
</div>

