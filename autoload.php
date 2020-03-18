<?php


function loadFile($file)
{

    if (file_exists($file)) {
        require_once $file;
        return true;
    }

    return false;
}

function classLoader($classname)
{
    $file = str_replace('\\', '/', __DIR__ . '/' . $classname . '.php');

    if (preg_match('/[a-zA-Z]+Controller$/', $classname)) {
        return loadFile($file);
    } elseif (preg_match('/[a-zA-Z]+Model$/', $classname)) {
        return loadFile($file);
    } elseif (preg_match('/[a-zA-Z]+View$/', $classname)) {
        return loadFile($file);
    } elseif (preg_match('/Utils/', $classname)) {
        return loadFile($file);
    }
}

spl_autoload_register('classLoader');
