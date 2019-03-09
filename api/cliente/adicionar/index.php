<?php
/**
 * Created by PhpStorm.
 * User: Nathata
 * Date: 07/03/2019
 * Time: 20:57
 */

try {
    $conexao = new PDO("mysql:host=localhost;dbname=simple_php_crud", "root", "");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
} catch (PDOException $erro) {
    ?>
    <script>
        window.alert(`Falha ao Conectar\n<?= $erro->getMessage()?>`);
    </script>

    <?php
}

try {
    if(!empty($_REQUEST['nome']) && !empty($_REQUEST['cpf']) && !empty($_REQUEST['nascimento'])){
        $sth = $conexao->prepare('INSERT INTO PESSOA (nome, cpf, nascimento) values (?, ?, ?)');
        $sth->execute(array($_REQUEST['nome'], $_REQUEST['cpf'], $_REQUEST['nascimento']));
    } else {
        echo 'missing parameters';
    }
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
?>