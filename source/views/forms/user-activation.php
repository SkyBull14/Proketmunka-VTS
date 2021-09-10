<form id="activation-form" method="post" action="/action/user/activate" data-redirect="/page/my-profile">
    <div class="card form-margin">
        <div class="card-body">
            <h2 class="card-title">Fiók aktiválása</h2>
            <p>Vivamus egestas dui nisl, vitae ultrices odio blandit at. Sed imperdiet consectetur magna non efficitur. Proin quis congue ex. Suspendisse rhoncus fringilla mollis. Curabitur condimentum sollicitudin diam, fermentum faucibus enim. Pellentesque vitae convallis nibh, et porttitor leo. Fusce non quam eu nibh placerat auctor tristique eget diam.</p>

            <pre>$_GET: <?php print_r($_GET); ?></pre>

            <div class="mb-3">
                <input class="form-control" type="text" id="activation-code" name="code" value="<?=$_GET['code'] ?? '';?>"
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
<script type="module" src="/assets/user-activation.js"></script>