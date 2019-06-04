<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 01/04/2019
 * Time: 20:10
 */

include_once '../../../includes/api.php';
include_once '../../../includes/authentication.php';

try {
    if(!empty($_REQUEST['id'])){
        $sth = $db->prepare('DELETE FROM contato where cliente = ?');
        $sth->execute(array($_REQUEST['id']));

        $sth = $db->prepare('DELETE FROM clientes where id = ?');
        $sth->execute(array($_REQUEST['id']));
        echo '{"message":"success"}';
    } else {
        throw new Exception('missing parameters');
    }
} catch (PDOException $ex) {
    echo '{"message":"'.$ex->getMessage().'"}';
}