# Autor: CarryOn Tech

# Atualizar as listas de pacotes disponíveis
exec { "apt-update":
  command => "/usr/bin/apt-get update"
}
# Instalar o MySQL Server
package { ["mysql-server"]:
  ensure => installed
}
# Criar o service do MySQL Server
service { "mysql":
    ensure => running,
    enable => true,
    hasstatus => true,
    hasrestart => true,
    require => Package["mysql-server"]
}

# Liberar acesso remoto para que a instância app possa se conectar ao banco
# Obs: Essa configuração também pode ser feita configurando regras de firewall
# Porém, para esse Workshop, a configuração abaixo basta

exec { "liberaracessoremoto":
    command => "sed -i 's/bind-address/#bind-address/' /etc/mysql/my.cnf",
    path => "/bin",
    require => Package["mysql-server"],
    notify => Service["mysql"]
}



# Criar o banco de dados com o nome "agenda"
exec {"criarbanco":
  command => "mysqladmin -u root create agenda",
  unless => "mysql -u root agenda",
  path => "/usr/bin",
  require => Package["mysql-server"]
}

#  Criar o arquivo "/opt/scripbanco.sql" a partir do script sql disponível no diretório "manifests" do host hospedeiro
file { "/opt/scriptbanco.sql":
    source => "/vagrant/manifests/site/pessoa.sql",
    owner => "mysql",
    group => "mysql",
    mode => 0644,
    require => Package["mysql-server"]
}

# Criar o usuário "agenda" e dar acesso total para esse usuário ao banco "agenda"
exec { "mysql-password" :
    command => "mysql -uroot -e \"GRANT ALL PRIVILEGES ON * TO 'agenda'@'%' IDENTIFIED BY 'agenda';\" agenda",
    unless  => "mysql -uagenda -pminha-senha agenda",
    path => "/usr/bin",
    require => Exec["criarbanco"]
}

# Executar o script "pessoa.sql" para criar a tabela "pessoa" no banco de dados "agenda"
exec {"criarestrutura":
  command => "mysql -uagenda -pagenda < /vagrant/manifests/site/pessoa.sql",
  path => "/usr/bin",
  require => Package["mysql-server"]
}

