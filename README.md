# Essentials PHP

O `Essentials PHP` é um conjunto simples de funções, classes e configurações básicas para simplificar a vida do desenvolvedor.

Você pode aplicar o PHP Essentials à qualquer projeto que PHP você tenha.

## Por onde começar

Faça download do [arquivo]( https://github.com/phpzm/essentials/archive/master.zip) que contém a estrutura do projeto.

Em seguida crie uma pasta para o projeto e descompacte o arquivo que você baixou dentro dela.

O próximo passo é abrir uma janela de terminal nesse diretório e dar o comando `php composer.phar install`

Pronto! Agora você já está pronto para rodar o projeto.

#### Rodando o "Hello World!"

Você pode optar por:
- Usar o servidor embutido no PHP: use o comando `php -S localhost:8080 -t public_html/` para iniciar o projeto;

- Usar o Nginx através do docker-compose: crie uma cópia do `docker-compose.yml.sample` removendo o `.sample` do fim do nome do arquivo.
Feito isso basta rodar `docker-compose up`.

Qualquer um dois dois caminhos vão te levar a acessar o "Hello World!" em [http://localhost:8080](http://localhost:8080), e, obviamente, você pode mudar essas configurações.