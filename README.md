# workshop-automacao-infra
- A pasta 1-exemplo_pratico possui duas subpastas. Uma contendo o exemplo prático de provisionamento com Vagrant e Puppet e uma outra subpasta contendo o exemplo prático de provisionamento com Docker.
- O site usado no teste está na pasta workshop-automacao-infra/1-exemplo_pratico/manifests/site/
- O Vagrantfile está em workshop-automacao-infra/1-exemplo_pratico/
- O arquivo do Puppet da máquina "app" é o arquivo "app.pp" e o da máquina "db" é o arquivo "db.pp", ambos dentro da pasta manifests.
- Após executar o Vagrant up, acessar o endereço http://192.168.50.10/site/ para validar o funcionamento.
