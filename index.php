<?php
    include_once 'includes/authentication.php'
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>CRUD Básico PHP</title>
    <link rel="stylesheet" href="assets/common.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/index.css"/>
</head>
<body>
    <div class="container-fluid h-100 d-flex">
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
                    <div class="w-100 h-100 p-1" id="notification-container">

                    </div>
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
                                        <h3 class="p-1 text-success button-raw-text" data-placement="top" data-toggle="tooltip" title="Novo Cliente">
                                            <span data-toggle="modal" data-target="#modalAdicionarClientes">+</span>
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
                                        <th>CPF</th>
                                        <th>Contatos</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $statement = $db->prepare('SELECT * FROM clientes');
                                            if($statement->execute()){
                                                while ($rs = $statement->fetch(PDO::FETCH_OBJ)){
                                                ?>
                                                    <tr>
                                                        <td><?=$rs->id?></td>
                                                        <td><?=$rs->nome?></td>
                                                        <td>
                                                            <?php
                                                                $cpf = $rs->cpf;
                                                                echo substr($cpf, 0, 3).
                                                                    '.'.substr($cpf, 3, 3).
                                                                    '.'.substr($cpf, 6, 3).
                                                                    '-'.substr($cpf, 9, 2);
                                                            ?>
                                                        </td>
                                                        <td class="contact-list-wrapper">
                                                            <ul class="contact-list">
                                                                <?php
                                                                $statementContacts = $db->prepare('select email from email where cliente = ?');
                                                                if($statementContacts->execute(array($rs->id))){
                                                                    while($rsTelefones = $statementContacts->fetch(PDO::FETCH_OBJ)){
                                                                        ?>
                                                                        <li class="contact-email"><?=$rsTelefones->email?></li>
                                                                        <?php
                                                                    }
                                                                };
                                                                $statementContacts = $db->prepare('select telefone from telefone where cliente = ?');
                                                                if($statementContacts->execute(array($rs->id))){
                                                                    while($rsTelefones = $statementContacts->fetch(PDO::FETCH_OBJ)){
                                                                        ?>
                                                                        <li class="contact-phone"><?=$rsTelefones->telefone?></li>
                                                                        <?php
                                                                    }
                                                                };
                                                                ?>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <!-- TODO botões de controle (apagar e editar) -->
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            } else {
                                                echo '<h4 class="text-error">Não foi possível ler a lista de clientes</h4>';
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="modalAdicionarClientes">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formAdicionarClientes">
                        <div class="form-group">
                            <label for="inputAdicionarNome">Nome:</label>
                            <input type="text" class="form-control" name="nome" id="inputAdicionarNome" required>
                        </div>
                        <div class="form-group">
                            <label for="inputAdicionarCPF">CPF:</label>
                            <input type="text" class="form-control" name="cpf" id="inputAdicionarCPF" required>
                        </div>
                        <div class="form-group">
                            <label for="inputAdicionarNascimento">Data de Nascimento:</label>
                            <input type="date" class="form-control" name="nascimento" id="inputAdicionarNascimento" required>
                        </div>
                        <div class="form-group">
                            <label for="inputAdicionarTelefone">Telefone:</label>
                            <input type="number" class="form-control" name="telefone" id="inputAdicionarTelefone">
                        </div>
                        <div class="form-group">
                            <label for="inputAdicionarEmail">Email:</label>
                            <input type="email" class="form-control" name="email" id="inputAdicionarEmail">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="formAdicionarClientes" class="btn btn-primary">Enviar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/notifications.js"></script>
    <script>$('[data-toggle="tooltip"]').tooltip()</script>
    <script>
        $('#inputAdicionarCPF').mask('000.000.000-00');
        $('#formAdicionarClientes').on('submit', function(e){
            e.preventDefault();

            let cpf = this.cpf.value.replace('.', '').replace('.', '').replace('-', '');
            if(cpf.length !== 11){
                sendNotification("CPF Inválido!", "alert-danger")
            } else {
                let name = this.nome.value;
                let email = this.email.value;
                let telefone = this.telefone.value;
                $.ajax({
                    url: `api/cliente/adicionar/?nome=${name}&cpf=${cpf}&nascimento=${this.nascimento.value}${email && '&email='.email}${telefone && '&telefone='.telefone}`,
                    success: function(responseText){
                        try {
                            let msg = JSON.parse(responseText).message;
                            if(msg === 'success'){
                                sendNotification(`Cliente ${name} adicionado com sucesso!`, "alert-success")
                            } else {
                                throw msg;
                            }
                        } catch (exception) {
                            sendNotification(`Falha ao adicionar ${name}: ${exception}`, "alert-danger")
                        }
                    },
                    error: function () {
                        sendNotification(`Falha ao adicionar ${name}: Unauthorized`, "alert-danger")
                    }
                })
            }
        })
    </script>

</body>
</html>