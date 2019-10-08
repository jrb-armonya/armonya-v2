{{-- SUBMIT  & RESET --}}
<div class="col-xl-12" style="margin-top:20px;">
    {{-- RESET  --}}
    <input 
    onClick="$('body').addClass('loading'); $('#form').submit();"
    type="submit" class="btn btn-success btn-lg btn-block rounded-0 fiche-input" value="Valider" id="submit-btn">

    @if(Auth::user()->role_id == 2)
        <input type="submit" name="rappel" value="Rappel" class="btn btn-info btn-lg btn-block rounded-0 fiche-input">
    @endif
</div>