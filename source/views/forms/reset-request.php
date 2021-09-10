<form id="reset-request" method="post" action="/?action=reset/request" data-redirect="/?path=reset-password&step=verify">

    <div class="mb-3">
        <label class="form-label" for="signup-email">E-mail cím</label>
        <input class="form-control" type="email" id="signup-email" name="email"
               autocomplete="email" required="required"
               minlength="6" maxlength="24">
    </div>

    <div id="reset-message" class="alert alert-warning ajax-message message-hidden" role="alert">
        Valami nem müködik!
    </div>

    <button type="submit" class="btn btn-primary spinner-hidden">
        <span class="spinner-border spinner-border-sm spinner-hidden" role="status" aria-hidden="true"></span>
        Jelszóvisszaállítás kérése!
    </button>
</form>

<script src="/assets/user-reset-request.js"></script>