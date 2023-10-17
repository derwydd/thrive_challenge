<?php

namespace App;

class Controller {
    protected function render($view, $data = []) {
        extract($data);
        // Can add view here
    }
}

?>