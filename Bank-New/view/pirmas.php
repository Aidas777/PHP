<?php require __DIR__ . '/virsus.php' ?>


<?php foreach ($saskaitos as $saskaita) : ?>
    <!-- <h3><?= $saskaita["SaskNr"] . " Simboliu sk.: " . strlen($saskaita['SaskNr']) ?></h3> -->
    <div class="klientas">
        <h1>Sąskaita Nr. <?= chunk_split($saskaita['SaskNr'], 4) ?></h1>

        <div class="secNav">
            <div class=secNavLeftBtns>
                <form class="sNrBig" action="<?= URL ?>plusEur" method="post">
                    <button type="submit" class="secBtn btnLL" name="SaskNr" value ="<?= $saskaita['SaskNr'] ?>">Pridėti lėšų</button>
                </form>

                <form class="sNrBig" action="<?= URL ?>minusEur" method="post">
                    <button type="submit" class="secBtn btnLR" name="SaskNr" value ="<?= $saskaita['SaskNr'] ?>">Nuskaičiuoti lėšas</button>
                </form>
            </div>

            <form class="sNrBig" action="<?= URL ?>delete/<?= $saskaita['SaskNr'] ?>" method="post">
                <button type="submit" class="secBtn">Naikinti sąskaitą</button>
            </form>
        </div>

        <div class="NoMargin">
            <h2 class="neimas">Vardas</h2>
            <h2 class="dataFLD-inact"><?= $saskaita['vardas'] ?></h2>
        </div>

        <div class="NoMargin">
            <h2 class="neimas">Pavardė</h2>
            <h2 class="dataFLD-inact"><?= $saskaita['pavarde'] ?></h2>
        </div>

        <div class="NoMargin">
            <h2 class="neimas">Asmens kodas</h2>
            <h2 class="dataFLD-inact"><?= $saskaita['ak'] ?></h2>
        </div>

        <div class="NoMargin centr">
            <h2 class="neimas-eur">Pinigų likutis Eur</h2>
            <h2 class="dataFLD-inact-eur"><?= $saskaita['Likutis'] ?></h2>
        </div>

    </div>

<?php endforeach ?>
<?php require __DIR__ . '/apacia.php' ?>