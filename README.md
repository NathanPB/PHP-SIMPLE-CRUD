# PHP Simple Crud | Nome não definido

## Descrição
Pequeno software genérico baseado em web que permite administrar uma lista de clientes. Cada cliente contém um identificador numérico único, um nome, um cpf, uma data de nascimento e uma lista de contatos, que pode ser email ou telefone.

## Requisitos
| ID | Descrição |
|----|-----------|
| RF1 | Quando for clicado no botão de adicionar clientes, uma tela pedindo para informar nome, cpf e data de nascimento deve ser aberta |
| RF2 | Quando for clicado em "Fechar" na tela de adicionar clientes, a tela deve ser fechada |
| RF2 | Quando for clicado em "Adicionar" na tela de adicionar clientes, todos os dados devem ser checados se são válidos. Caso sejam, o cliente informado deve ser adicionado. Caso contrário, alertas alertarão o usuário de que há algo errado. Em ambas as possibilidades uma notificação deverá informar as ações que foram tomadas |
| RF3 | Quando for clicado no botão de remover cliente, uma tela de confirmação deve ser mostrada |
| RF4 | Quando a confirmação de remover cliente for confirmada, o usuário deverá ser removido e uma notificação avisando que a operação foi concluída deve aparecer |
| RF5 | Se a confirmação de remover cliente for cancelada, a tela de confirmação deve sumir e uma notificação avisando que a operação foi cancelada deve aparecer |
| RF6 | Quando é selecionado o botão "editar" de um campo de algum cliente, tal deverá ter a edição liberada.
| RF7 | Antes de concluir a edição de campos de um cliente, deverá ser checado se as informações são válidas. Uma notificação deverá ser enviada para informar o usuário sobre a operação que foi feita.
| RNF1 | **Segurança:** A API e o sistema deverão ser autenticados para evitar mudanças de pessoas não autorizadas |
| RNF2 | **User-Friendly:** A interface deve ser de fácil utilização, com design limpo e responsivo |

## Riscos
| Risco | Afeta | Descrição |
|-------|-------|-----------|
| Problemas no ambiente de execução | Projeto e Negócio | Pode gerar atrásos devido a problemas inesperados |
| Inexperiência | Projeto e Negócio | Inexperiência da equipe com desenvolvimento, gerência ou versionamento |

## Organização do Grupo
|      Nome     |               Função              |
|---------------|-----------------------------------|
|Thiago Zuffo   | Desenvolvedor, Gerente de Projeto |
|Nathan Bombana | Desenvolvedor, Gerente de Projeto |

### Observações Importantes:
- ~~todo o mundo é pau pra toda obra~~
