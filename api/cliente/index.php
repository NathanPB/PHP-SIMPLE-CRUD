<?php

/**
 * Created by PhpStorm.
 * User: Nathata
 * Date: 01/04/2019
 * Time: 20:24
 */

include_once '../../includes/api.php';
include_once '../../includes/authentication.php';

try {
    if (!empty($_REQUEST['id'])) {
        $sth = $db->prepare('SELECT * FROM clientes WHERE id = ?');
        $return = $sth->query(array($_REQUEST['id']));
        array_push($return, array('message' => 'success'));
        echo json_encode($return);
    } else {
        $statement = $db->prepare('SELECT * from clientes');
        if($statement->execute()) {
            $resultSet = $statement->fetchAll();
            echo json_encode(array(
                'message' => 'success',
                'data'    => $resultSet
            ));
        } else {
            echo json_encode(array('message' => 'unknown error'));
        }
    }
} catch (PDOException $ex) {
    echo '{"message":"' . $ex->getMessage() . '"}';
}