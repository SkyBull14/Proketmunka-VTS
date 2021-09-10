
<form id="login-form" method="post" action="/action/user/login" data-redirect="/?path=my-profile">
    <div class="card form-margin">
        <div class="card-body">
            <h2 class="card-title">Bejelentkezés</h2>

            <div class="mb-3">
                <label class="form-label" for="login-email">E-mail cím</label>
                <input class="form-control" type="email" id="login-email" name="email"
                       autocomplete="email" required="required"
                       minlength="6" maxlength="28">
            </div>

            <div class="mb-3">
                <label class="form-label" for="login-password">Jelszó</label>
                <input class="form-control" type="password" id="login-password" name="password"
                       autocomplete="password" required="required"
                       minlength="6" maxlength="24">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Bejelentkezés</button>
            </div>

            <div class="mb-3">
                <a href="/?path=restore">Elfelejtett jelszó?</a>
            </div>
        </div>

    </div>
</form>