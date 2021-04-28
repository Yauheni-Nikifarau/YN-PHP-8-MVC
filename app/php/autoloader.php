<?php
spl_autoload_register (function ($class) {
    if (file_exists(ROOT . '/app/controllers/' . $class . '.php')) {
        include ROOT . '/app/controllers/' . $class . '.php';
        return;
    }
    if (file_exists(ROOT . '/app/core/' . $class . '.php')) {
        include ROOT . '/app/core/' . $class . '.php';
        return;
    }
    if (file_exists(ROOT . '/app/dataClasses/' . $class . '.php')) {
        include ROOT . '/app/dataClasses/' . $class . '.php';
        return;
    }
    if (file_exists(ROOT . '/app/models/' . $class . '.php')) {
        include ROOT . '/app/models/' . $class . '.php';
        return;
    }
});