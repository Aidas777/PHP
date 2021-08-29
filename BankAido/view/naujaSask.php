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

    <div class="divNBig">

        <form action="<?= URL ?>?route=nauja" method="post">

            <div class="centr divN">
                <label class="inLbl">Sąskaitos Nr.</label>

                <input class="inBoxSask" type="hidden" name="sNr" value="<?= $newAccNr->naujSnr ?>">
                <h3 class="sNrShow"><?= chunk_split($newAccNr->naujSnr, 4) ?></h3></input>
                
            </div>

            <div class="centr divN">
                <label class="inLbl">Vardas</label>
                <input class="inBox" type="text" name="vardas" value="<?= ReData("vard")["ReVard"] ?? null; ?>">
                <!-- <input class="inBox" type="text" name="vardas" value="<?= $ReVard ?? null; ?>"> -->
            </div>

            <div class="centr divN">
                <label class="inLbl ">Pavarde</label>
                <input class="inBox" type="text" name="pavarde" value="<?= ReData("pavard")["RePavard"] ?? null; ?>">
            </div>

            <div class="centr divN">
                <label class="inLbl">Asmens kodas</label>
                <input class="inBox" type="text" name="ak" value="<?= ReData("ak")["ReAk"] ?? null; ?>">
            </div>

            <div class="noBorder">
                <button type="submit" class="btnCreate btnNav">Sukurti naują sąskaitą</button>
            </div>

        </form>
    </div>

</body>
</html>