#Sugestão:

Este projeto gera uma interface destinada ao público geral com o fim de, coletar e armazenar sugestões de melhorias em questões estruturais ou administrativas da Instituição Comunitária de Educação Superior Universidade Da Região da Campanha.

##Este projeto utiliza as tecnologias:

* HTML5.
* CSS.
* Postgresql (base de dados).
* pgAdmin III.


##Começando

### Passo 1:

#### Base de dados.

* No pgAdmin defina as seguintes configurações para um novo servidor: 

    * 1. host: localhost 
    * 2. port: 5432 (padrão)
    * 3. Maintenence BD: postgres
    * 4. User Name: postgres 
    * 5. Password=postgres 

* Crie uma base de dados nomeada ```shell sug-base ``` .

* Insira ```shell CREATE TABLE sugestao( id SEERIAL, imagem OID, sugestao VARCHAR(1000), email VARCHAR(50), nome_pessoa VARCHAR(50), assunto VARCHAR(20)); ``` no código sql da base de dados e exute.

### Passo 2:

#### Execução local.

* No terminal acesse o diretório do projeto e execute o comando ```shell php -S localhost:8080 ``` (insira a porta que preferir, neste exemplo a porta escolhida é 8080).

* Abra o navegador e insira ```shell localhost:8080/```.

#FIM.

