<div class="input-group" id="partenaire_action_box" style="margin-top:10px;">  
        <div class="col-sm-6 mb-1">
            <div class="input-group">
                <label id="basic-addon1">Partenaire</label>
                <select class="custom-select" name="partenaires[]" id="partenaire_action" multiple="multiple" style="width: 100% !important; border: 1px solid black !important; border-radius: 5px;">
                    <option value="">---------------</option>
                </select>
            </div>
        </div>
</div>
{{-- SUBMIT  & RESET --}}
<div class="col-xl-12" style="margin-top:20px;">
        {{-- RESET  --}}
        <input 
        onClick="$('body').addClass('loading'); $('#form').submit();"
        type="submit" class="btn btn-secondary btn-lg btn-block rounded-0 fiche-input" name="archive" value="Archiver" id="submit-btn">
 </div>