<?php
require __DIR__ ."/virsus.php";

?>
    <div class="divBigMinus">
        <h1>Sąskaita Nr. <?= chunk_split($saskPerson['SaskNr'], 4) ?></h1>

        <div class="NoMargin">
            <h2 class="neimas">Vardas</h2>
            <h2 class="dataFLD-inact"><?= $saskPerson['vardas'] ?></h2>
        </div>

        <div class="NoMargin">
            <h2 class="neimas">Pavardė</h2>
            <h2 class="dataFLD-inact"><?= $saskPerson['pavarde'] ?></h2>
        </div>

        <div class="NoMargin">
            <h2 class="neimas">Asmens kodas</h2>
            <h2 class="dataFLD-inact"><?= $saskPerson['ak'] ?></h2>
        </div>

        <form action="<?= URL ?>minusEur" method="post">
            <div class="NoMargin centr">
                <h2 class="neimas-eur-plus">Pinigų likutis Eur</h2>
                <h2 class="dataFLD-inact-eur-minus"><?= $saskPerson['Likutis'] ?></h2>
                <input class="inBoxPlus" type="text" name="minus"></input>

                <button type="submit" class="btnNavPlus" name='SaskNr' value='<?= $saskPerson['SaskNr'] ?>'> - Nuskaičuoti</button>

            </div>
        </form>


    </div>

</body>
</html>