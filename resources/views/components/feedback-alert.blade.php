@if(Session::has('error-feedback'))
    <div class="example-alert">
        <div class="alert alert-danger alert-icon">
            <em class="icon ni ni-cross-circle"></em> <strong>Error</strong>! {{ Session::get('error-feedback')}}.
        </div>
    </div>
@endif

@if(Session::has('success-feedback'))
<div class="example-alert">
    <div class="alert alert-success alert-icon">
        <em class="icon ni ni-check-circle"></em> <strong>Success</strong>!.  {{ Session::get('success-feedback')}}.
    </div>
</div>
@endif


