# projeto final (server)
Chat para dar suporte aos clientes. (Server)

 Instalação
 <ol>
 <li>Faça um pull do projeto em um diretório local.</li>
 <li>Dentro do diretório do projeto, execute o comando [composer install] para instalar todas as dependências necessárias.</li>
 <li>Dentro do diretório do projeto, em [app/console/Commands/WebSocketServer.php], na linha 50 insira uma porta válida e na linha 51 insira um IP válido.</li>
 <li>Rode todas as migrations - [php artisan migrate].</li>
 <li>O projeto irá utilizar o Passport para gerenciar as authenticações dos usuários. Então execute o comando [php artisan passport:client --personal] para habilitar a biblioteca.</li>
 <li>Para inicializar o servidor localmente, use o comando [php artisan serve]. Ou para definir um host use [php artisan serve --host="0.0.0.0"] (seu host).</li>
 <li>Para inicializar o servidor websocket, use o comando [php artisan websocket:init]. (O servidor websocket irá escutar no host e a porta configurados no passo 3).</li>
 </ol>
