<?php

if ( ! empty($data) ) {
    echo "<p class='msg'>" .$data["msg"] ?? ""."</p>";
} else {
    echo "<p style='line-height: 32px;'>&nbsp</p>";
}

?>