# Workshop Automação de Infraestrutura e Conteinerização

Neste workshop, abordamos conceitos de automação de infraestrutura, também conhecida como "Infraestrutura como Código" e realizamos demonstrações práticas da automatização de criação de máquinas virtuais, utilizando as ferramentas Vagrant e Puppet. Também falamos sobre conteiners e demonstramos o provisionamento de um ambiente utilizando o Docker. 
Contamos ainda com a participação do convidado Philipe Costa, que bateu um papo sobre o Ansible, poderosa ferramenta open source de automatização e provisionamento ágil. 
Tivemos também a presença do Psicólogo Vitor Santos, que nos trouxe a palestra "Conhecendo O Meu Eu Foda - Competências para se destacar e chegar em um nível extra". 

Neste repositório, estão os arquivos utilizados durante a apresentação e demonstração prática dos provisionamentos com Vagrant+Puppet e com Docker.

- A pasta "1-exemplo_pratico" possui duas subpastas. Uma contendo o exemplo prático de provisionamento com Vagrant e Puppet e uma outra subpasta contendo o exemplo prático de provisionamento com Docker.
- Na raiz do repositório você irá encontrar o arquivo da apresentação utilizada no workshop.

# Vagrant + Puppet
- Neste projeto, foi provisionado um ambiente contendo dois servidores. Um servidor contendo o  Apache hospedando um site simples de cadastro de pessoas (uma espécie de agenda online) e um outro servidor contendo o banco de dados MySQL, onde são persistidos os dados cadastrados por meio do site. No servidor do MySQL foi criado um banco de dados chamado "agenda" com uma tabela apenas, chamada "pessoa".
- O provider utilizado para a criação das máquinas foi o VirtualBox.
- O Vagrantfile está no diretório "workshop-automacao-infra/1-exemplo_pratico/vagrant/"
- O site com CRUD simples usado nos testes está na pasta "1-exemplo_pratico/manifests/site/" e foi baseado no projeto da Glaucia Lemos: https://github.com/glaucia86/projeto.crud.php
- Na pasta "1-exemplo_pratico/manifests/" se encontram os arquivos de provisionamento do Puppet, sendo que o arquivo "app.pp" é o arquivo de provisionamento da máquina do site e o arquivo "db.pp" é o arquivo de provisionamento da máquina de banco de dados.
- Lembrando que a pasta "manifests" é sincronizada com a pasta "/vagrant/manifests" existente dentro das máquinas virtuais criadas pelo Vagrant. Por isso, o Puppet instalado em cada uma das máquinas virtuais consegue, ao ser chamado, executar as instruções dos arquivos "app.pp" e "db.pp".
- Tanto o Vagrantfile quantos os arquivos do Puppet estão devidamente documentados com comentários nos códigos.

# Testando o projeto
- Primeiro baixe e instale o VirtualBox de acordo com o seu sistema operacional: https://www.virtualbox.org/wiki/Downloads
- Faça o mesmo para o Vagrant, baixe-o e instale-o de acordo com o seu SO: https://www.vagrantup.com/downloads.html
- Para executar o projeto, basta clonar este repositório, navegar até o diretório "workshop-automacao-infra/1-exemplo_pratico/vagrant/" e executar o comando vagrant up. Esse comando irá executar as intruções contidas no Vagrantfile para criar as máquinas virtuais. Conforme vocês vão ver dentro do Vagrantfile, na configuração de cada uma das máquinas existe uma linha chamando o Puppet. É o Puppet quem vai provisionar os recursos necessários em cada servidor, como o Apache, o PHP e o MySQL Server.
- Após executar o vagrant up, você deve acessar o endereço http://192.168.50.10/site/ para validar o funcionamento.
- A máquina do site estará com o IP 192.168.50.10 e a máquina de banco de dados estará com o IP 192.168.50.11


# Docker, docker build e Docker Compose
- Neste projeto, foi provisionado um ambiente contendo o mesmo site utilizado no exemplo de Vagrant+Puppet, porém, no exemplo com o Docker, o ambiente foi distribuído em 3 containers:
  - Um container do servidor web NGINX
  - Um segundo container rodando o PHP com o driver PDO (PHP Data Object)
  - E um terceiro container rodando o MySQL Server
- As imagens utilizadas no projeto foram baixadas do Docker Hub, sendo que a imagem do PHP não vem com o driver PDO instalado. Sendo assim, utilizou-se o docker build para criar, a partir da imagem oficial do PHP, uma nova imagem contendo o PHP e o PDO.
- Dentro da pasta  1-exemplo_pratico/docker/ você irá encontrar o seguinte conteúdo:
  - Arquivo site.conf - Este é um arquivo de configuração do NGINX, que informa ao servidor web qual é o nome da aplicação, onde ela deve procurar o index do site, onde devem ser salvos os arquivos de log, dentre outras configurações.
  - Arquivo Dockerfile - Esté o arquivo utilzado para fazer o build de nossa imagem do PHP. Neste arquivo constam as instruções para que o comando "docker build" possa baixar a imagem do PHP, instalar o driver PDO e criar uma nova imagem que aqui chamamos de "php-pdo-carryon".
  - Arquivo docker-compose.yml - Neste arquivo estão todas as instruções para a composição do ambiente. Nele, cada container é tratado como um serviço. Sendo assim, em cada um desses serviços estão especificados: A imagem utilizada para rodar o container, o nome do container, a porta a ser exposta, variáveis de ambiente, volumes compartilhados, dentre outras configurações.
  - Arquivo pessoa.sql - Conforme já dito, neste exemplo foi configurado um ambiente contendo um site que funciona como uma agenda online e um banco de dados MySQL. Assim como no exemplo de Vagrant+Puppet, foi criado um banco de dados chamado "agenda" com uma tabela chamada "pessoa". O arquivo "pessoa.sql" então será enviado para o container do MySQL e executado automaticamente para criar a tabela pessoa no banco de dados "agenda".
  - Diretório "data" - Esta pasta foi criada para funcionar como um volume compartilhado entre o container do MySQL e o host para que os arquivos do banco de dados também estejam disponíveis localmente. Essa pasta foi especificada dentro do arquivo docker-compose.yml.
  - 


