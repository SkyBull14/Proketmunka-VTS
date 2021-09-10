<form method="post" action="/action/user/reset" data-redirect="/page/email-verify">

    <label class="InputPassword" for="password-login">Új jelszó</label><br>
    <input type="password" class="form-control" id="signup-password" name="password" size="35"><br>

    <label class="InputPasswordAgain" for="password1Again">Jelszó újból</label><br>
    <input class="form-control" type="password" id="signup-passwordVerification" name="passwordVerification" size="35"><br>

    <div id="activation-message" class="alert alert-warning message-hidden" role="alert">
        Valami nem müködik!
    </div>

    <button type="submit" class="btn btn-primary spinner-hidden">
        <span class="spinner-border spinner-border-sm spinner-hidden" role="status" aria-hidden="true"></span>
        Jelszó visszaállítása
    </button>
</form>

<script src="/assets/user-password-reset.js"></script>
