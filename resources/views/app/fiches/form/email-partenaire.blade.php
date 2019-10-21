<div class="input-group" id="partenaire_box" style="display: none;">
    {{-- Situation --}}
    <div class="col-sm-6 mb-1">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Partenaire</span>
            </div>
            <select class="custom-select fiche-input" name="partenaire_id" id="partenaire">
                <option value="">---------------</option>
            </select>
        </div>
    </div>
</div>

<div class="input-group" id="partenaire_email_box" style="display: none;">
    {{-- Situation --}}
    <div class="col-sm-6 mb-1">
        <div class="input-group">
            
            <select class="custom-select" id="partenaire_emails" name="partenaire_emails[]" multiple="multiple" style="width: 100% !important; border: 1px solid black !important; border-radius: 5px;">
                <option value="">---------------</option>
            </select>
        </div>
    </div>
    <div class="col-sm-6 mb-1">
        <div class="input-group">
            
            <select class="custom-select" id="partenaire_emails_cc" name="partenaire_emails_cc[]" multiple="multiple" style="width: 100% !important; border: 1px solid black !important; border-radius: 5px;">
                <option value="">---------------</option>
            </select>
        </div>
    </div>
    
</div>



<div class="col-sm-6 mb-1 email-annulation mt-5" style="display: none;">
    <div class="input-group form-check">
        <input class="form-check-input" type="checkbox" name="email_annulation" id="email_annulation" autocomplete="off">
        <label class="form-check-label" for="email_annulation" style="color: red;">
            Voulez vous envoyer un email d'annulation?
        </label>
    </div>
</div>

{{-- Annulation report --}}
@if(Auth::user()->role_id == 9)
<div class="col-sm-6 mb-1 report-annulation mt-5" style="display: none;">
    <div class="input-group form-check">
        <input class="form-check-input" type="checkbox" name="report_annulation" id="report_annulation" autocomplete="off">
        <label class="form-check-label report_annulation" for="report_annulation" style="color: red;">
            
        </label>
    </div>
</div>
@endif
