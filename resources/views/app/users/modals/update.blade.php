@component('app.parts.modals.update')
    @slot('id', 'user-modal')
    @slot('label', 'userModalLabel')
    
    @include('app.users.forms.update')
@endcomponent