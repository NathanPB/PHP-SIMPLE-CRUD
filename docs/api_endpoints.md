# API

## Autenticação

### Credencial
    {usuario}:{senha} em base64
    
Exemplo:
 1. Usuario: ``root`` | Senha: ``123``
 2. root:123
 3. ``cm9vdDoxMjM=``
 4. ``Authorization: Basic cm9vdDoxMjM=``

### Headers
     Authorization: Basic {credencial}
     
Exemplo:
    
    Authorization: Basic cm9vdDoxMjM=
    
## Endpoints

### api/clientes/adicionar/
Adiciona um cliente ao database.

Parametros GET:
 
 * ``nome``: Nome do cliente;
 * ``cpf``: CPF do cliente. Precisa ter 11 dígitos, todos numéricos.
 * ``nascimento``: Data de nascimento do cliente. Formato: ``yyyy-mm-dd``
