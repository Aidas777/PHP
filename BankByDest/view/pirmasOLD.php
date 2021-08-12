<?php require __DIR__ . '/virsus.php' ?>


<?php foreach ($saskaitos as $saskaita) : ?>
<!-- <h3><?= $saskaita["SaskNr"] ." Simboliu sk.: " .strlen($saskaita['SaskNr']) ?></h3> -->
<div class="klientas">
<h1>Sąskaita Nr. <?= chunk_split($saskaita['SaskNr'], 4) ?></h1>
<form action="<?= URL ?>?route=naikinti&id=<?= $saskaita['SaskNr'] ?>" method="post">
    <button type="submit" class="secBtn">Naikinti sąskaitą</button>
</form>
<h2>Juodieji: <?= $saskaita['juodieji'] ?></h2>
<h2>Rudieji: <?= $saskaita['rudieji'] ?></h2>
<form action="<?= URL ?>?route=prideti-juodus&id=<?= $saskaita['SaskNr'] ?>" method="post">
    <div>
        <label>Pridėti juodus: </label><input type="text" name="j_plus">
        <button type="submit">+</button>
    </div>
</form>

<form action="<?= URL ?>?route=atimti-juodus&id=<?= $saskaita['SaskNr'] ?>" method="post">
    <div>
        <label>Atimti juodus: </label><input type="text" name="j_minus">
        <button type="submit">-</button>
    </div>
</form>

<form action="<?= URL ?>?route=prideti-rudus&id=<?= $saskaita['SaskNr'] ?>" method="post">
    <div>
        <label>Pridėti rudus: </label><input type="text" name="r_plus">
        <button type="submit">+</button>
    </div>
</form>

<form action="<?= URL ?>?route=atimti-rudus&id=<?= $saskaita['SaskNr'] ?>" method="post">
    <div>
        <label>Atimti rudus: </label><input type="text" name="r_minus">
        <button type="submit">-</button>
    </div>
</form>
</div>

<?php endforeach ?>
<?php require __DIR__ . '/apacia.php' ?>