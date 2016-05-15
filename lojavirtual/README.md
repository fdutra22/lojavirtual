Para usar basta copiar a pasta lojavirtual para a root do servidor. (Aplicação 1 servidor).

Para realizar a busca (METHOD GET) deve-se utilizar por exemplo: http://localhost/lojavirtual/pessoas/pessoa para uma busca para todos os registros
ou http://localhost/lojavirtual/pessoas/pessoa/1 para buscar por id e ainda http://localhost/lojavirtual/pessoas/pessoa/pedro para buscar por nome.

Para inserir (METHOD POST) basta usar http://localhost/lojavirtual/'nome tabela no plural'/'nome tabela singular'
Obs: deve ser enviado como post os nomes da coluna e os valores, eu utilizei o plugin do google chrome Postman para testar em uma tabela qualquer inclusive a que eu utilizei para desenvolver esse servidor restfull.

Para deletetar (METHOD DELETE) basta usar por exemplo: http://localhost/lojavirtual/pessoas/pessoa/1 onde é usado o id 1 para remover o registro do banco de dados.

E para atualizar (METHOD PUT) usar por exemplo http://localhost/lojavirtual/pessoas/pessoa e utilizar o metodo put 
obs: essa parte deve ser utilizado o cabeçalho do tipo x-www-form-urlencoded.

(Aplicação 2 cliente) em desenvolvimento.
