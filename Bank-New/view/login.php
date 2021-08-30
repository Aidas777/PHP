<?php require __DIR__ . '/virsus.php' ?>



    <div class="rowLog">

            <form action="<?= URL?>login" method="post" class="m-4 login-form">

                <div class="login-form-group">
                    <label class="simtas">El.paštas</label>
                    <input type="text" class="form-control sesiasd" name="email">
                    <small class="form-text simtas">Įveskite prisijungimo el.paštą.</small>
                </div>

                <div class="login-form-group">
                    <label class="simtas">Slaptažodis</label>
                    <input type="password" class="form-control sesiasd" name="pass">
                    <small class="form-text simtas">Įveskite prisijungimo slaptažodį.</small>
                </div>

                <button type="submit" class="btn-logout">Prisijungti</button>
            </form>

    </div>



</body>
</html>
