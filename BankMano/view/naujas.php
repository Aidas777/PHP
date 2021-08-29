<?php require __DIR__ . '/virsus.php' ?>

<form action="<?= URL ?>?route=nauja" method="post">
    <div>
        <button type="submit" class="btnCreate">Sukurti naują sąskaitą</button>
    </div>
</form>

<form action="" method="post">
    <div>
        <label class="inBox">Vardas</label>
        <input class="inBox" type="text" name="vardas">
    </div>

    <div class="nextIn">
        <label class="inBox">Pavarde</label>
        <input class="inBox" type="text" name="pavarde">
    </div>

    <div class="nextIn">
        <label class="inBox">Sąskaitos Nr.</label>
        <input class="inBox" type="text" name="sNr">
    </div>

    <div class="nextIn">
        <label class="inBox">Asmens kodas</label>
        <input class="inBox" type="text" name="ak">
    </div>

</form>

<?php require __DIR__ . '/apacia.php' ?>