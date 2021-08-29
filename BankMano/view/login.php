<?php
    require __DIR__ . '/virsus.php';
    // require dirname(__DIR__,1).'/functions.php';
    // $saskaitos = getSask();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>
<body>
    



<h1>Kas cia</h1>   

    <div class="container">
            <div class="row">
                <div class="col-5">
                    <form action="" method="post" class="m-4 login-form">

                        <div class="form-group">
                            <label>Vardas</label>
                            <input type="text" class="form-control" name="name">
                            <small class="form-text text-muted">Įveskite prisijungimo vardą.</small>
                        </div>

                        <div class="form-group">
                            <label>Slaptažodis</label>
                            <input type="password" class="form-control" name="pass">
                            <small class="form-text text-muted">Įveskite prisijungimo slaptažodį.</small>
                        </div>

                        <button type="submit" class="btn btn-warning">Prisijungti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
