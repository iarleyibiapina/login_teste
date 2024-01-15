-Desafio IMDB

-para consumo de api com autenticação

criado um controller MovieControlle onde tem uma função index trazendo alguns dados de um filme que foi passado pelo parametro na rota, essa função foi criada para primeiramente testar se a conexão esta ok;

instalado dependencia guzzlehttp para requisições HTTP com o comando:
composer require guzzlehttp/guzzle

Utilizei um metodo chamado 'token()' que espera um token beare de autenticação, coloquei o token que enviado através do site e email.
após isso eu consigo passar parametros na url (?language) e trazer dados em portugues;

-Banco de dados,
Novamente utilizei um banco já existente, criado então um model MovieModel e uma migration create_movie

nomei a tabela de 'tab_filmes_tfi' me baseando na criação das migrations no projeto de enquetes
contem como colunas: nome, id (themovie), sinopse, avaliacao, data de lancamento e o caminho da imagem do filme.

durante a criação, rodei a migration porem me esqueci da coluna de id do filme. Para corrigir rodei o comando:
php artisan migrate:rollback

que volta uma migration e corrigi adicionando a nova coluna. (essa coluna é o id do filme para consultar na api);

Resolvi criar essa coluna para futuras consultas e pesquisas.

-Rotas:

criei 3 rotas, a primeira rota foi uma rota de testes, para fazer consultas de outros filmes e retornar seus dados.

a rota 'store-filme' - consulta a api e armazena dados do filme e o poster do filme no servidor/banco;
a rota 'get-filme' - consulta o banco de dados e retorna os dados do filme com base no id do theMovieDb;

-Controller:

criado um MovieController e nele contem 3 funções:

searchFilmeApi: esta função tinha como proposito testar a conexão e os dados consultados, por agora pode ser utilizada fazer realizar outras consultas a outros filmes;

storeFilme: espera um id do filme com base no theMovieDb como parametro e faz duas requisiões HTTP,
a primeira retorna os dados do filme filtrando o: 'id', 'nome', 'sinopse', 'avaliação', 'data de lançamento', 'path da imagem'.

a segunda requisição é feita especialmente para buscar a imagem, nessa segunda parte da função
a api retorna um 'banco de imagens', é basicamente 3 arrays contendo um outro array e cada um dados de uma imagem,onde eu queria acessar a primeira imagem dentro do caminho 'logo';

depois disso eu consultei a documentação da api e há uma url onde todas as imagens ficam salvas, no caso eu só precisaria do id da imagem, onde justamente eu consigo consultado a segunda requisição.

por film eu faço um tratamento da imagem para definir um novo nome para ela adicionando o nome do filme, uma hora atual e o id da imagem, essa imagem é salva no servidor e o caminho é salvo no banco.

-Notas:

tentei utilizar essa nova forma de comentar funçoes, ela ajuda bastante a descrever a função.
tambem utilizei o metodo de nomenclatura no banco com sufixos e prefixos de tabela.
confesso que o nome das variaveis poderiam melhorar, misturei muito inglês com português.
para testar utilizei o PostMan

-Desafio:

O maior desafio mesmo foi 'baixar' a imagem, o resto eu consegui codar sem muitas comlicações ou se tinha obstaculos consegui achar uma solução rápida.

-urls utilizadas:
https://developer.themoviedb.org/docs/authentication-application
https://developer.themoviedb.org/reference/movie-details
https://developer.themoviedb.org/reference/movie-images
https://image.tmdb.org/t/p/original
~PostMan para testar api;
https://laravel.com/docs/10.x/http-client
https://www.php.net/manual/pt_BR/function.str-replace
https://www.php.net/manual/pt_BR/function.str-replace
https://www.php.net/manual/pt_BR/function.file-get-contents.php
