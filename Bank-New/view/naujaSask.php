<?php
require __DIR__ . "/virsus.php";
// include_once __DIR__.'/functions.php';
// include_once __DIR__.'/functions.php';
?>

<body>

    <!-- <nav>
    <a href="<?= URL ?>">Sąrašas</a>
    <a href="<?= URL ?>?route=nauja">Nauja sąskaita</a>
    <button onclick="location.href= '<?= URL ?>'" class="btnCreate">Gryzti i sarasa</button>
</nav> -->

<?php
// print_r($reData);
// echo "<br>";
// echo $sNr;
// die;
?>

    <div class="divNBig">

        <form action="<?= URL ?>list" method="post">

            <div class="centr divN">
                <label class="inLbl">Sąskaitos Nr.</label>

                <input class="inBoxSask" type="hidden" name="sNr" value="<?= $sNr ?? $reData["ReSNr"] ?>">
                <h3 class="sNrShow"><?= chunk_split(($reData["ReSNr"] ?? $sNr), 4 ) ?></h3></input>
                
            </div>

            <div class="centr divN">
                <label class="inLbl">Vardas</label>
                <input class="inBox" type="text" name="vardas" value="<?= $reData["ReVard"] ?? null; ?>">
                
            </div>

            <div class="centr divN">
                <label class="inLbl ">Pavarde</label>
                <input class="inBox" type="text" name="pavarde" value="<?= $reData["RePavard"] ?? null; ?>">
            </div>

            <div class="centr divN">
                <label class="inLbl">Asmens kodas</label>
                <input class="inBox" type="text" name="ak" value="<?= $reData["ReAk"] ?? null; ?>">
            </div>

            <div class="noBorder">
                <button type="submit" class="btnCreate btnNav">Sukurti naują sąskaitą</button>
            </div>

        </form>
    </div>

</body>
</html>