# Essentials PHP (ePHP)

O `Essentials PHP` é um conjunto simples de funções, classes e configurações básicas para simplificar a vida do desenvolvedor.

Você pode aplicar o `Essentials PHP` à qualquer projeto PHP que você tenha. Veremos mais pra frente as vantagens que você pode obter com isso.

## Por onde começar

Faça download do [arquivo]( https://github.com/phpzm/essentials/archive/master.zip) que contém a estrutura do projeto.

Em seguida crie uma pasta para o projeto e descompacte o arquivo que você baixou dentro dela.

Agora é a vez de baixar o Composer. Vá até o [site do composer](https://getcomposer.org/download) role até o final da página e escolha uma versão compatível com a sua versão do PHP. Faça o download do arquivo para a pasta que você criou. Neste momento a versão estável mais atual é a [1.5.6](https://getcomposer.org/download/1.5.6/composer.phar) e ela é compatível com o PHP 7.1 que estou usando : )

O próximo passo é abrir uma janela de terminal nesse diretório e dar o comando `php composer.phar install`

Pronto! Agora você já está pronto para rodar o projeto.

#### Rodando o "Hello World!"

Você pode optar por:
- Usar o servidor embutido no PHP: use o comando `php -S localhost:8080 -t public_html/` para iniciar o projeto;

- Usar o Nginx através do docker-compose: crie uma cópia do `docker-compose.yml.sample` removendo o `.sample` do fim do nome do arquivo.
Feito isso basta rodar `docker-compose up`.

Qualquer um dois dois caminhos vão te levar a acessar o "Hello World!" em [http://localhost:8080](http://localhost:8080), e, obviamente, você pode mudar essas configurações.

## Pra que isso tudo gente?!

 A ideia do ePHP é entregar facilidatores para o desenvolvedor. Separamos alguns tópicos a serem tratados que o projeto visa a resolver de forma rápida e muito simples.
 
- Acesso centralizado: Um dos objetivos mais importantes deste projeto é remover da raiz do web server a aplicação. Utilizando alguns recursos disponibilizados é possível colocar toda a aplicação "legada" a ser protegida dentro da pasta `app` e configurar como os arquivos serão acessados. Com esta modificação de segurança seu projeto já começa a ter um nível diferenciado de segurança.

- Super Globais: O segundo ponto a ser tocado é abstrair o acesso às super globais entregando funções que estão disponíveis em qualquer parte do projeto. Usando esses recursos você consegue limpar as entradas do usuário de acordo com o tipo de dado informado e minimiza muito o impacto de falhas de segurança que explorem combinações de valores de entrada para "zuar" com a sua aplicação. O acesso aos dados usa os mecanismos do [filter_input](http://php.net/filter_input) garantido a higienização dos valores recebidos. Além disso também é possível dar suporte a receber dados em formato JSON (payload) através da mesma função que é usada para os dados enviados via POST.

- Construção de comandos SQL: Você provavelmente está acostumado a criar comandos SQL e concatenar strings com `$_GET` e `$_POST`, mas essa prática vai pulverizar pelo seu código possíveis falhas de segurança. Para contornar isso você leva um construtir de comandos SQL na faixa que usa os famosos `Prepared Statements` para criar as instruções deixando seu código mais limpo e menos desprotegido.

