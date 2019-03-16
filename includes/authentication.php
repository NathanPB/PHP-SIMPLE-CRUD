<?php
/**
 * Created by PhpStorm.
 * User: Nathata
 * Date: 15/03/2019
 * Time: 21:05
 */

if(defined('is_api') && is_api == true){
    if (empty($_SERVER['PHP_AUTH_USER'])) {
        header('HTTP/1.1 401 Unauthorized');
        die('Unauthorized');
    } else {
        try {
            $db = new PDO("mysql:host=localhost;dbname=phpcrud", $_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("set names utf8");
        } catch (PDOException $exception) {
            header('HTTP/1.1 401 Unauthorized');
            die($exception->getMessage());
        }
    }
} else {
    if (empty($_SERVER['PHP_AUTH_USER'])) {
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="Secured Area"');
        die('Unauthorized');
    } else {
        try {
            $db = new PDO("mysql:host=localhost;dbname=phpcrud", $_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("set names utf8");
        } catch (PDOException $exception) {
            header('HTTP/1.1 401 Unauthorized');
            header('WWW-Authenticate: Basic realm="Secured Area"');
            die($exception->getMessage());
        }
    }
}