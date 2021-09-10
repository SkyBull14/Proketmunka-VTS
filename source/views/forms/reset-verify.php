<form id="activation-form" method="post" action="/?action=reset/verify">
    <div class="card form-margin">
        <div class="card-body">
            <h2 class="card-title">Jelszó visszaállítás</h2>
            <p>Irja be az e-mailben kapott kódot</p>

            <div class="mb-3">
                <input class="form-control" type="text" id="activation-code" name="code"
                       placeholder="Aktivációs kód" required="required">
            </div>

            <div id="activation-message" class="alert alert-warning ajax-message message-hidden" role="alert">
                Valami nem müködik!
            </div>

            <button type="submit" class="btn btn-primary spinner-hidden">
                <span class="spinner-border spinner-border-sm spinner-hidden" role="status" aria-hidden="true"></span>
                Aktíválás
            </button>
        </div>
    </div>
</form>
<script src="/assets/user-verify.js"></script>
