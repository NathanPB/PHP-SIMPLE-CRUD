<?php
/**
 * Created by PhpStorm.
 * User: Nathata
 * Date: 07/03/2019
 * Time: 20:57
 */

include_once '../../../includes/api.php';
include_once '../../../includes/authentication.php';

try {
    if(!empty($_REQUEST['nome']) && !empty($_REQUEST['cpf']) && !empty($_REQUEST['nascimento'])){
        $sth = $db->prepare('INSERT INTO clientes (nome, cpf, nascimento) values (?, ?, ?)');
        $sth->execute(array($_REQUEST['nome'], $_REQUEST['cpf'], $_REQUEST['nascimento']));
    } else {
        echo 'missing parameters';
    }
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
?>