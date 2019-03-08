<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>CRUD Básico PHP</title>
    <link rel="stylesheet" href="assets/common.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid h-100 d-flex">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <div id="db-info-dialog" style="display:none;">
            <div class="card p-2 m-2">
                <h3>Database Credentials</h3>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="dbname">Database Name:</label>
                        <input type="text" name="dbname" id="dbname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="dbuser">User:</label>
                        <input type="text" name="dbuser" id="dbuser" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="dbpwd">Password:</label>
                        <input type="password" id="dbpwd" name="dbpwd" class="form-control">
                    </div>
                    <div class="form-group w-100">
                        <input type="submit" class="from-control w-100" value="Login">
                    </div>
                </form>
            </div>
        </div>
<?php
    try {
        if(empty($_REQUEST['dbname']) || empty($_REQUEST['dbuser'])){
    ?>
        <script>
          document.querySelector('#db-info-dialog').style.display = 'initial';
          window.stop();
        </script>
    <?php
        }

        $conexao = new PDO("mysql:host=localhost;dbname={$_REQUEST['dbname']}", $_REQUEST['dbuser'], $_REQUEST['dbpwd']);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexao->exec("set names utf8");
    } catch (PDOException $erro) {
        ?>
            <script>
                window.alert(`Falha ao Conectar\n<?= $erro->getMessage()?>`);
                window.location.href = window.location.href;
            </script>

        <?php
    }
?>
        <div class="w-100 h-100 d-flex flex-column">
            <div class="row">
                <header class="col-md-12 p-0">
                    <nav class="navbar navbar-expand-md navbar-light bg-light">
                        <a class="navbar-brand" href="index.php">PHP Simple CRUD</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Expandir Navegação">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarMain">
                            <ul class="navbar-nav mr-auto"></ul>
                        </div>
                    </nav>
                </header>
            </div>
            <div class="row" style="flex-grow: 1">
                <div class="col-md-2 bg-primary left-menu">

                </div>
                <div class="col-md-10">
                    <div class="main-container">
                        <div class="w-100 card">
                            <div class="w-100">
                                <div class="row">
                                    <div class="col-md-11">
                                        <h3 class="p-1 text-secondary">Clientes</h3>
                                    </div>
                                    <div class="col-md-1">
                                        <h3 class="p-1 text-success button-add" data-placement="top" data-toggle="tooltip" title="Novo Cliente">
                                            <span>+</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Contato</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>$('[data-toggle="tooltip"]').tooltip()</script>
</body>
</html>