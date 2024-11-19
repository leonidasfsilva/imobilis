# Imobilis - Sistema para Gestão de Imóveis
###### Projeto esboço para sistema de gerenciamento de imóveis para aluguel e venda, destinado à imobiliárias utilizando as stacks:

* Laravel 5.8
* Materialize 0.94
* MySQL

###### Sistema totalmente responsivo para dispositivos móveis (tablets e smartphones)


## Configurando o projeto
Clone o projeto para o seu localhost
```sh
git clone https://github.com/leonidasfsilva/imobilis.git imobilis
```

Acesse a pasta do projeto
```sh
cd imobilis
```

Crie o arquivo *.env* copiando a partir do modelo *.env.example*
```sh
cp .env.example .env
```
Gere uma nova chave para o projeto
```sh
php artisan key:generate
```

Abaixo estão as principais variáveis de ambiente  que precisam ser configuradas corretamente para executar o projeto em ambiente localhost (Laragon, Wamp, Xamp ou PHP Built-In)
```dosini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=imobilis
DB_USERNAME=root
DB_PASSWORD=root
```

Instale as dependências do projeto
```sh
composer install
```
Execute as *migrations* para criar as tabelas
```sh
php artisan migrate
```
Execute as *Seeders* necessárias para a popular algumas tabelas do projeto
```sh
php artisan db:seed
```
Suba o servidor embutido do Laravel para rodar o projeto
```sh
php artisan serve
```

### Acesse o sistema através da URL abaixo

### [http://127.0.0.1:8000/](http://127.0.0.1:8000/)

### Credenciais de acesso Admin:
```dosini
E-MAIL: admin@mail.com
SENHA: 123456

```
