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
        if(empty($_REQUEST['id'])){
            if(!empty($_REQUEST['telefone']) || !empty($_REQUEST['email'])){
                $sth = $db->prepare('INSERT INTO clientes (nome, cpf, nascimento) values (?, ?, ?)');
                $sth->execute(array($_REQUEST['nome'], $_REQUEST['cpf'], $_REQUEST['nascimento']));

                if(!empty($_REQUEST['email'])){
                    $sth = $db->prepare("INSERT INTO contato (cliente, value, type) values ((select id from clientes where cpf = ?), ?, 'E')");
                    $sth->execute(array($_REQUEST['cpf'], $_REQUEST['email']));
                }
                if(!empty($_REQUEST['telefone'])){
                    $sth = $db->prepare("INSERT INTO contato (cliente, value, type) values ((select id from clientes where cpf = ?), ?, 'T')");
                    $sth->execute(array($_REQUEST['cpf'], $_REQUEST['telefone']));
                }
                echo '{"message":"success"}';
            } else {
                throw new Exception('no initial email or phone number provided');
            }
        } else {
            $sth = $db->prepare('UPDATE clientes set nome = :nome, cpf = :cpf, nascimento = :nascimento where id = :id');
            $sth->execute($_REQUEST);
            echo '{"message":"success"}';
        }
    } else {
        throw new Exception('missing parameters');
    }
} catch (Exception $ex) {
    echo '{"message":"'.$ex->getMessage().'"}';
}
?>