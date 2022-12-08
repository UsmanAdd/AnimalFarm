<?php

$path = ".";
$files = array_diff(scanShortDir($path), ["autoload.php"]);

requireFiles($files, $path);

function requireFiles($files, $path) {
    foreach ($files as $file) {
        $path .=  DIRECTORY_SEPARATOR . $file;

        if (is_file($path)) {
            spl_autoload_register(function ($path) {
                require_once($path . ".php");
            });
        }
        if (is_dir($path)) {
            $files = scanShortDir($path);
            requireFiles($files, $path);
        }

        $path = str_replace(DIRECTORY_SEPARATOR . $file, "", $path);
    };
}

function scanShortDir($path){
    $files = scandir($path);
    $files = array_diff(scandir($path), [".", ".."]);

    return $files;
}

?>