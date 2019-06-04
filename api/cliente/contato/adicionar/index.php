<?php
    include_once '../../../../includes/api.php';
    include_once '../../../../includes/authentication.php';

    try {
        if(isset($_REQUEST['value'])) {
            if (isset($_REQUEST['id'])) {
                $sth = $db->prepare('update contato set value = :value where id = :id');
                $sth->execute(array(
                    'value' => $_REQUEST['value'],
                    'id' => $_REQUEST['id']
                ));
                echo '{"message":"success"}';
            } else if (isset($_REQUEST['cliente'])) {
                $sth = $db->prepare('insert into contato (value, cliente, type) values (:value, :cliente, :type)');
                $sth->execute(array(
                    'value' => $_REQUEST['value'],
                    'cliente' => $_REQUEST['cliente'],
                    'type' => strpos($_REQUEST['value'], '@') != false ? 'E' : 'T'
                ));
                echo '{"message":"success"}';
            } else {
                throw new Exception('missing parameters');
            }
        } else {
            throw new Exception('missing parameters');
        }
    } catch (Exception $ex) {
        echo '{"message":"'.$ex->getMessage().'"}';
    }