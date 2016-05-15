Para usar basta copiar para a root do servidor.
para a busca deve se utilizar por exemplo: http://localhost/lojavirtual/pessoas/pessoa para uma busca por todos os registros
ou http://localhost/lojavirtual/pessoas/pessoa/1 por buscar por id e ainda http://localhost/lojavirtual/pessoas/pessoa/pedro para buscar por nome.

Para inserir basta usar http://localhost/lojavirtual/'nome tabela no plurar'/'nome tabela singular'
Obs: deve ser enviado como post os nomes da coluna e os valores eu utilizei o plugin do google chrome Postman

Para deletetar basta usar por exemplo: http://localhost/lojavirtual/pessoas/pessoa/1 onde é usado o id 1 para remover o registro do banco de dados

e para atualizar usar por exemplo http://localhost/lojavirtual/pessoas/pessoa e utilizar o metodo put 
obs: essa parte contem alguns bugs.
