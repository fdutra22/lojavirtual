lojavirtual
servidor de uma loja virtual com webservices restfull

Para usar basta copiar a pasta lojavirtual para a para web root do seu servidor. (Aplicação 1 servidor) e salvar o .htaccess.txt como .htaccess. Configurar tbm o arquivo dbconfig.php para o seu banco de dados entrando com a senha o nome do banco, usuario e host.

Para realizar a busca (METHOD GET) deve-se utilizar por exemplo: http://localhost/lojavirtual/pessoas/pessoa para uma busca por todos os registros ou http://localhost/lojavirtual/pessoas/pessoa/1 para buscar por id e ainda http://localhost/lojavirtual/pessoas/pessoa/pedro para buscar por nome.

Para inserir (METHOD POST) basta usar http://localhost/lojavirtual/'nome tabela no plural'/'nome tabela singular' Obs: deve ser enviado como post os nomes da coluna e os valores, eu utilizei o plugin do google chrome Postman para testar em uma tabela qualquer inclusive a que eu utilizei para desenvolver esse servidor restfull.

Para deletetar (METHOD DELETE) basta usar por exemplo: http://localhost/lojavirtual/pessoas/pessoa/1 onde é usado o id 1 para remover o registro do banco de dados.

E para atualizar (METHOD PUT) usar por exemplo http://localhost/lojavirtual/pessoas/pessoa e utilizar o metodo put obs: essa parte deve ser utilizado o cabeçalho do tipo x-www-form-urlencoded.

(Aplicação 2 cliente) em desenvolvimento.

Para usar a aplicação cliente basta digita localhost/clientevirtual.
Será chamada a pagina padrão index que não contem nada.
Para fazer uma consulta basta digitar localhost/clientevirtual/lista e digitar o nome da tabela a ser mostrado a lista.
E para inserir dados no banco digitar localhost/clientevirtual/cadastro e digitar no nome da tabela a ser inserido os dados.