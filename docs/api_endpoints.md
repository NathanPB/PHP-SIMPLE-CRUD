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


## api/cliente/
Retorna os clientes cadastrados em formato JSON.

Parametros GET:
  * `id` (opcional): Retorna um cliente em específico, filtrado por ID.

### api/cliente/adicionar/
Adiciona ou edita um cliente ao database.

Parametros GET:
 
 * ``ìd`` (Para operações de edição apenas): ID do cliente a editar;
 * ``nome``: Nome do cliente;
 * ``cpf``: CPF do cliente. Precisa ter 11 dígitos, todos numéricos.
 * ``nascimento``: Data de nascimento do cliente. Formato: ``yyyy-mm-dd``.

### api/cliente/remover/
Remove um cliente.

Parametros GET:

  * ``id``: ID do cliente a remover.

### api/cliente/contato/adicionar

Adiciona ou edita um contato.

Parametros GET:

 * ``ìd`` (Para operações de edição apenas): ID do contato a editar.
 * ``cliente`` (Para operações de adição apenas): ID do cliente a adicionar;
 * ``value``: Valor a adicionar ou substituir.
 
 ### api/cliente/contato/remover
 
 Remove um contato
 
 Parametros GET:
 * ``id``: ID do contato a remover