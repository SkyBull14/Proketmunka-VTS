<form id="signup-form" method="post" action="/action/user/register" data-redirect="/page/email-verify">

    <div class="card form-margin">
        <div class="card-body">
            <h2 class="card-title">Új fiók regisztrálása</h2>

            <div class="mb-3">
                <label class="form-label" for="signup-firstName">Név</label>

                <div class="input-group mb-3">

                    <input class="form-control" type="text" id="signup-lastName" name="last_name"
                           autocomplete="family-name" minlength="6" maxlength="24"
                           placeholder="Vezetéknév">

                    <input class="form-control" type="text" id="signup-firstName" name="first_name"
                           autocomplete="given-name" minlength="6" maxlength="24"
                           placeholder="Keresztnév">
                </div>

            </div>

            <div class="mb-3">
                <label class="form-label form-required" for="signup-email">E-mail cím</label>
                <input class="form-control" type="email" id="signup-email" name="email"
                       autocomplete="email" required="required"
                       minlength="6" maxlength="24">
            </div>

            <div class="mb-3">
                <label class="form-label form-required" for="signup-password">Jelszó</label>
                <input class="form-control" type="password" id="signup-password" name="password"
                       autocomplete="new-password" required="required"
                       minlength="6" maxlength="24">
            </div>

            <div class="mb-3">
                <label class="form-label form-required" for="signup-passwordVerification">Jelszó megerösítés</label>
                <input class="form-control" type="password" id="signup-passwordVerification" name="passwordVerification"
                       autocomplete="new-password" required="required"
                       minlength="6" maxlength="24">
            </div>

            <div class="mb-3">
                <input class="form-check-input" type="checkbox" name="role" value="walker" id="signup-asWalker">
                <label class="form-check-label" for="signup-asWalker">
                    Sétáltatókén regisztrálok
                </label>
                <small>
                    (Ha késöbb akarsz sétáltató lenni, az is lehetséges!)
                </small>
            </div>

            <div class="mb-3">
                <label class="form-required"></label>-al jelölt mezök kötelezöek!
            </div>

            <div id="signup-message" class="alert alert-warning ajax-message message-hidden" role="alert">
                Valami nem müködik!
            </div>

            <button type="submit" class="btn btn-primary spinner-hidden">
                <span class="spinner-border spinner-border-sm spinner-hidden" role="status" aria-hidden="true"></span>
                Regisztráció
            </button>
        </div>

    </div>
</form>
<script type="module" src="/assets/user-registration.js"></script>