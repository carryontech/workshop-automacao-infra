# Workshop Automação de Infraestrutura e Conteinerização

Neste workshop, abordamos conceitos de automação de infraestrutura, também conhecida como "Infraestrutura como Código" e realizamos demonstrações práticas da automatização de criação de máquinas virtuais, utilizando as ferramentas Vagrant e Puppet. Também falamos sobre conteiners e demonstramos o provisionamento de um ambiente utilizando o Docker. 
Contamos ainda com a participação do convidado Philipe Costa, que bateu um papo sobre o Ansible, poderosa ferramenta open source de automatização e provisionamento ágil. 
Tivemos também a presença do Psicólogo Vitor Santos, que nos trouxe a palestra "Conhecendo O Meu Eu Foda - Competências para se destacar e chegar em um nível extra". 

Neste repositório estão os arquivos utilizados durante a apresentação e demonstração prática dos provisionamentos com Vagrant+Puppet e com Docker.

- A pasta 1-exemplo_pratico possui duas subpastas. Uma contendo o exemplo prático de provisionamento com Vagrant e Puppet e uma outra subpasta contendo o exemplo prático de provisionamento com Docker.

# Vagrant + Puppet

- O Vagrantfile está em workshop-automacao-infra/1-exemplo_pratico/
- O site com CRUD simples usado nos testes está na pasta 1-exemplo_pratico/manifests/site/ e foi baseado no projeto da Glaucia Lemos: https://github.com/glaucia86/projeto.crud.php
- Na pasta 1-exemplo_pratico/manifests/ se encontram os arquivos de provisionamento do Puppet, sendo que o arquivo "app.pp" é o arquivo de provisionamento da máquina do site e o arquivo "db.pp" é o arquivo de provisionamento da máquina de banco de dados.
- Após executar o Vagrant up, acessar o endereço http://192.168.50.10/site/ para validar o funcionamento.
