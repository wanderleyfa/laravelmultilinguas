
Localizar uma aplicação é a simples arte de fazer com que usuários de vários idiomas possa usar sua aplicação. Tal qual dublar um filme ou série, vai além de apenas traduzir um **Yes** para um **Sim**, é tornar a aplicação utilizável.

Mas o foco aqui vai ser o Laravel.
Não vou ficar explicando sobre o Laravel ou seu mérito de ser ou não uma boa escolha para se desenvolver, se resolver o problema do cliente de uma forma profissional tá valendo.

## Então vamos começar.

O Laravel já vem preparado para que voce mude a sua linguagem principal, e o **Blade** já tem Helpers específicos para isso 

#### para instalar os pacotes necessário
```bash
composer create-project --prefer-dist laravel/laravel localizandoaplicacao
```
O projeto irá ser criado com a versão corrente do Laravel criando uma estrutura como a apresentada na imagem abaixo:

![Imagem contendo parte de uma estrutura inicial de uma aplicação Laravel](https://dev-to-uploads.s3.amazonaws.com/i/m7j2d8ocvwg4nz3hjcux.png)

Você pode simplesmente criar uma pasta chamada pt_BR dentro de resources/lang ( como no exemplo abaixo ) , criando um arquivo chamado **messages.php** 

#### estrutura de pastas
![Alt Text](https://dev-to-uploads.s3.amazonaws.com/i/abkp4n5n04di6833735g.png)
#### arquivo messages.php em inglês
![Alt Text](https://dev-to-uploads.s3.amazonaws.com/i/gz0wkmi1bmzljj72lovq.png)
#### arquivo messages.php em português
![Alt Text](https://dev-to-uploads.s3.amazonaws.com/i/kvjbtfscjj4kmmwvfag6.png)

E alterar o arquivo config/app.php na linha 83 de
![Alt Text](https://dev-to-uploads.s3.amazonaws.com/i/dqupugytuzjcsuwry36o.png)

para 

![Alt Text](https://dev-to-uploads.s3.amazonaws.com/i/4k6lpg5yqq0cp9sm2uy0.png)

e no arquivo **resources/views/welcome.blade.php** altere de 

![Alt Text](https://dev-to-uploads.s3.amazonaws.com/i/s10zgzwgmit3w7sp0j7z.png)

para

![Alt Text](https://dev-to-uploads.s3.amazonaws.com/i/dss7pjcgchu1rkq1swwb.png)

Mas isso apenas tornara a tradução estática, ou seja, apenas uma linguagem novamente.

# E agora então?

Vamos criar uma rota que receba como parâmetro o idioma e assim sete o mesmo para a aplicação

![Alt Text](https://dev-to-uploads.s3.amazonaws.com/i/8iqm5yihll2kfq38iiot.png)

A parte ruim dessa forma é que teremos que pensar em todas as rotas e sempre lembrar de sempre adicionar o parâmetro de idioma e o controle do mesmo a cada rota criada, o que pode tornar o desenvolvimento mais complexo e facilitar os erros.
Então vamos deixar a estrutura do Laravel cuidar disso para a gente.

### Primeiro vamos mudar a rota para

![Alt Text](https://dev-to-uploads.s3.amazonaws.com/i/oq3wc20x7rvc1ln810pu.png)

Após isso vamos criar um middleware, que nada mais é um programa, que vai ser requisitado sempre que a aplicação mudar de rota, e desta forma a aplicação ficará responsável por tomar conta da gestão do idioma.

### E vamos criar o middleware
```bash
php artisan make:middleware LocalizandoAplicacao
```
### o conteúdo do arquivo deve ficar assim 

![Alt Text](https://dev-to-uploads.s3.amazonaws.com/i/np1so6dbfjajo32xkqb9.png)

### Depois temos que alterar o arquivo app/Http/Kernel.php na sessão middlewareGroups para adicionar o middleware que criamos para ser executado.

![Alt Text](https://dev-to-uploads.s3.amazonaws.com/i/yj4vennk9ofstxtu7v5i.png)

### Agora temos que criar os links para que o usuário possa escolher o idioma que irá utilizar durante seu acesso ao sistema.

Vamos alterar novamente o arquivo **resources/views/welcome.blade.php** que vai ficar assim

![Alt Text](https://dev-to-uploads.s3.amazonaws.com/i/iti45b3450ewb65t54g7.png)

### O que vai resultar no seguinte layout
![Alt Text](https://dev-to-uploads.s3.amazonaws.com/i/r19nogikh9iqsm6v7isa.png)
![Alt Text](https://dev-to-uploads.s3.amazonaws.com/i/sca7zvgli0se57nh3yhi.png)

Claro que existem outras abordagens em relação à adição e gestão de idiomas no Laravel, mas espero ter ajudado.
