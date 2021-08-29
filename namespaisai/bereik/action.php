<?php

namespace veiksmas;
class action {

    public $a='gerai spausdina';

    public function duok($s=null) {
        if (! empty($s) ) {
            $this->a = $s;
        }
        return $this->a;
}


}