<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Projeto ainda em desenvolvimento!

<p><a href="#desenvolvido"># Desenvolvido até o momento</a></p>
<p><a href="#config"># Configuração Inicial do Projeto</a></p>

<hr>
<p id="config">

## Configurando o Projeto ...
 
        composer install --no-scripts
     
#Copie o arquivo .env.example

        cp .env.example .env

#Crie uma key para o projeto

        php artisan key:generate

#Configurar o arquivo .env com base no seu Banco de Dados e SMTP para recuperação de senhas 

#Execute as migrations

        php artisan migrate --seed

</p> 
<hr>
<p id="desenvolvido">

## Até o momento:

* Configurado a paginação padrão para as tabelas

* CRUD para Alunos
* Usando AJAX para listar informações dos Alunos através do Modal
* Cards para Pesquisa de Alunos por Nome, Codigo, Data de Cadastro
* View de Login/Register configurada com o template
* AJAX para criar novos Alunos através do Modal 
* Configurado Dropdown para Serviços na Listagem de Alunos

* CRUD para Categoria de Treinos
* AJAX para criar novas categorias
* Input para pesquisas Categorias

* CRUD para Exercicios
* AJAX para criar novos exercicios

* CRUD para Montar Treinos
* Modals para montar treino de alunos
* Rotas para adicionar treinos A/B/C/D
* Configurado sistema para criar os treinos (séries/repetições com valores default)
* Editando Séries/Repetições com javascript
* Botão para excluir Exercicios

* Download de Treinos Montados
* Pesquisar Alunos pelo Navbar com Ajax/JQuery
* Pesquisar alunos/categorias/exercícios com Ajax/JQuery 

* Avaliação Física - View para Cadastros de Dados, Perímetros, Dobras Cutaneas 
* Avaliação Física - View para Formulario de Anamnese, Questinario de Prontidão
* Avaliação Física - View/Download do PDF com dados (Sem frontend ainda)

* View para pagamentos gerais (Assessoria/Avaliação Física)
* CRUD para pagamentos gerais

* Configurado template para download das avaliações físicas
* Configurado template para download dos treinos montados

* Criado CRUD para Dados de Contrato para Professores
* Criado CRUD para Dados de Contrato para Alunos
* Configurado o modelo de contrato com as informações dos alunos/professores
* Nova rota pra atualizar dados dos professores de acordo com o contrato
* Configurado o modelo de contrato com as cláusulas e finalizando os dados do contrato
* PDF do contrato configurado
* Finalizado o CRUD dos dados de alunos do Contrato (Edit/Delete)
* View para editar contratos montados
* View para editar Avaliações Físicas
* Finalizado o CRUD para Avaliações Físicas (Edit)

* Criada view para informações da Conta
* Modificando a view para atualizar informações

* Modificando Alunos. Ao remover um aluno apagará todos os treinos/avaliações/contratos realizados do mesmo.

* Modificando imagem do usuário

* Criando view para envio de emails

* Configurado dropdown no ícone de notificações no navbar
* Listando Notificações de Pagamentos Pendentes
* Redirecionamento de rota após clicar na notificação

* Configurando Chart JS para pagamentos

* Dashboard configurado
* Criada área do aluno e reajuste em algumas views

</p>
     
<hr>


