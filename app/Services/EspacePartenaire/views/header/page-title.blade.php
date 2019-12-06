<div class="page-title mb-4 d-flex align-items-center">
    <div class="mr-auto">
        <h4 class="weight500 d-inline-block border-right">
            {{ $title }} 
            <span class="text-muted" style="font-size: 10px;">
                Connecté en tant que {{ Auth::user()->emailPart->partenaire->name }}
            </span>
        </h4>
    </div>
</div>