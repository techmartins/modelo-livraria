# Modelo - Livraria

## Primeiros Passos

1. Rodar os seguintes compandos
    - ```composer install```
    - ```npm install```
2. Criar database, e em seguida rodar o seguinte comando para que sejam criadas as tabelas do sistema:
    - ```php artisan migrate```

3. Copiar o conteúdo do arquivo ".env.example" para um novo arquivo chamado ".env"

4. No arquivo ".env" deverá alterar os dados do database no seguinte trecho:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=livraria
DB_USERNAME=admin
DB_PASSWORD=admin
```

5. Por fim deve-se rodar o seguinte comando:
    - ```php artisan serve```

6. Caso ocorra algum erro momentâneo, tente rodar o código:
    - ```php artisan optimize:clear```
---

# Arquivos

    - /database/migrations -> Migrations
    - /app/Users -> Model de Usuário
    - /app/Models/Livros -> Model de Livros
    - /public/plugins/script-livraria.js -> Javascript da página contendo requisições do CRUD do livros
    - /resources/views/
        - auth/ -> Tela de Login
        - inc/-> arquivos que são incluídos no arquivo app.blade.php, como barra de navegação, barra superior, rodapé, scripts e css
        - layout/ -> Contêm o arquivo app.blade.php onde fica estruturado todo conteúdo das telas
        - livros/ -> contêm arquivo crud_livros.blade.php com tabela de catálogo de livros, formulários de cadastro, edição/visualização e botão de excluir registro de livro
    - /routes/web.php -> arquivo com as rotas do CRUD

# Importante

### Há um conflito no javascript não resolvido sobre o reload ser realizado apenas no DataTable contendo os registros, onde deixei comentado no código este trecho do reload pois o mesmo de alguma forma impede o carregamento dos dados da tabela posteriormente.
