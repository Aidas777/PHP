<?php require __DIR__ . '/virsus.php' ?>



    <div class="rowH">

            <form action="<?= URL?>login" method="post" class="m-4 login-form">

                <div class="login-form-group">
                    <label>El.paštas</label>
                    <input type="text" class="form-control" name="email">
                    <small class="form-text">Įveskite prisijungimo el.paštą.</small>
                </div>

                <div class="login-form-group">
                    <label>Slaptažodis</label>
                    <input style = 'margin-left: 15px;' type="password" class="form-control" name="pass">
                    <small class="form-text">Įveskite prisijungimo slaptažodį.</small>
                </div>

                <button type="submit" class="btn-logout">Prisijungti</button>
            </form>

    </div>



</body>
</html>
