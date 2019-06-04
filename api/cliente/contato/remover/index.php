<?php
include_once '../../../../includes/api.php';
include_once '../../../../includes/authentication.php';

try {
    if(isset($_REQUEST['id'])) {
        $sth = $db->prepare('delete from contato where id = :id');
        $sth->execute(array(
            'id' => $_REQUEST['id']
        ));
        echo '{"message":"success"}';
    }
} catch (Exception $ex) {
    echo '{"message":"'.$ex->getMessage().'"}';
}