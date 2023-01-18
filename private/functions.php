<?php

function url_for ($path) {
    if ($path[0] !== '/') {
        $path = '/' . $path;
    }

    return WWW_ROOT . $path;
}

function redirect_to ($location) {
    header("Location: ". $location);
    exit();
}

function is_request_post () {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function is_request_get () {
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

function make_questions ($level, $sign) {
    /* switch: 
        case: $level == 1
} */
}

?>