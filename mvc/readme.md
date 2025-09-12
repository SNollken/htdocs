# O que é MVC?
Para resolver esse caos, foi criado um padrão de arquitetura chamado MVC (Model-View-Controller). Pense nele como um método de organização que divide a aplicação em três partes principais, cada uma com uma responsabilidade clara. 

# como funciona?

1. Model
O Model (Modelo) é a camada que lida com os presistência de dados e as regras de negócio da aplicação. Ele é o cérebro do sistema.

O que ele faz? Se conecta ao banco de dados, valida as informações (ex: um e-mail é válido? a senha tem 8 caracteres?) e executa a lógica principal.
O que ele NÃO faz? Ele não tem a menor ideia de como os dados serão exibidos para o usuário. Ele apenas os gerencia.
2. View
A View (Visão) é a parte da aplicação com a qual o usuário interage diretamente. É a interface gráfica: os botões, os formulários, as tabelas, o front-end e todo o visual.

O que ela faz? Exibe os dados que recebe do Model de uma forma amigável. É a “vitrine” da sua loja.
O que ela NÃO faz? Ela não armazena nem processa dados. A View é “burra”; ela apenas mostra o que mandam ela mostrar e informa quando o usuário faz alguma coisa (como clicar em um botão).
3. Controller
O Controller (Controlador) é a peça que conecta o Model e a View. Ele atua como o intermediário, o maestro da orquestra.

O que ele faz? Ele recebe as ações do usuário vindas da View (ex: “o usuário clicou no botão ‘Salvar'”). Em seguida, ele “conversa” com o Model para processar essa ação (ex: “Model, salve estes dados!”). Por fim, ele pega a resposta do Model e decide qual View será exibida para o usuário.
O que ele NÃO faz? Ele não contém lógica de negócio complexa (isso é trabalho do Model) nem código de apresentação (isso é trabalho da View).

# o que é getter and setter?
é um encapsulamento que server de segurança para a classe.