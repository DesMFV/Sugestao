# Sugestão:

Este projeto gera uma interface destinada ao público geral, com o fim de, coletar e armazenar sugestões de melhorias em questões estruturais ou administrativas da Instituição Comunitária de Educação Superior Universidade Da Região da Campanha.

## Este projeto utiliza as tecnologias:

* HTML5.
* CSS.
* Postgresql (base de dados).
* pgAdmin III.
* PHP 7


## Começando

### Passo 1:

#### Base de dados.

* No pgAdmin defina as seguintes configurações para um novo servidor: 

    * 1. host: localhost 
    * 2. port: 5432 (padrão)
    * 3. Maintenence BD: postgres
    * 4. User Name: postgres 
    * 5. Password=postgres

* Crie uma base de dados nomeada ``` sug-base ``` .

* Insira a seguinte linha no código sql da base de dados e execute``` CREATE TABLE sugestao( id SERIAL, imagem varchar(200), sugestao VARCHAR(1000), email VARCHAR(50), nome_pessoa VARCHAR(50), assunto VARCHAR(20), excluido BOOLEAN, arquivado BOOLEAN); ```.

* Crie uma outra base de dados nomeada ``` pesquisa ``` .

* Insira as seguintes linhas no código sql da base de dados e execute uma de cada vez:
    
    * ``` create table perguntas( id serial primary key, pergunta_descricao varchar (95) not null, pergunta_valor integer not null, unique(id,pergunta_valor)); ```.

    * ``` insert into perguntas(pergunta_descricao,pergunta_valor)values('Qual o seu nível de satisfação em relação ao atendente?',1) ```.

    * ``` insert into perguntas(pergunta_descricao,pergunta_valor)values('Qual o seu nível de satisfação quanto a resolução da dúvida/problema apresentado?',2) ```.

    * ``` insert into perguntas(pergunta_descricao,pergunta_valor)values('Qual o seu nível de satisfação quanto ao tempo de espera para atendimento na Central do Aluno?',3) ```.

    * ``` insert into perguntas(pergunta_descricao,pergunta_valor)values('Qual o seu nível de satisfação quanto ao espaço físico da Central do Aluno?',4) ```.

    * ``` create table opcoes( id serial primary key, opcao_descricao varchar (35) not null, opcao_valor integer not null, unique(id,opcao_valor)); ```.

    * ``` insert into opcoes(opcao_descricao,opcao_valor)values('Muito Insatisfeito',1) ```.

    * ``` insert into opcoes(opcao_descricao,opcao_valor)values('Parcialmente Insatisfeito',2) ```.

    * ``` insert into opcoes(opcao_descricao,opcao_valor)values('Nem Insatisfeito, Nem Satisfeito',3) ```.

    * ``` insert into opcoes(opcao_descricao,opcao_valor)values('Parcialmente Satisfeito',4) ```.

    * ``` insert into opcoes(opcao_descricao,opcao_valor)values('Muito Insatisfeito',5) ```.

    * ``` create table respostas(id serial primary key, data_baixa date not null, pergunta integer references perguntas(id) not null, opcao integer references opcoes(id) not null) ```.

### Passo 2:

#### Execução local.

* No terminal acesse o diretório do projeto e execute o comando ``` php -S localhost:8080 ``` (insira a porta que preferir, neste exemplo a porta escolhida é 8080).

* Abra o navegador e insira ``` localhost:8080/``` (insira a porta que definiu anteriormente no terminal, neste exemplo a porta escolhida é 8080).

# FIM.





