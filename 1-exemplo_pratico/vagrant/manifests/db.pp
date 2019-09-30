# Autor: CarryOn Tech
exec { "apt-update":
  command => "/usr/bin/apt-get update"
}

package { ["mysql-server"]:
  ensure => installed
}

service { "mysql":
    ensure => running,
    enable => true,
    hasstatus => true,
    hasrestart => true,
    require => Package["mysql-server"]
}

# Criando o banco de dados com o nome agenda
exec {"criarbanco":
  command => "mysqladmin -u root create agenda",
  unless => "mysql -u root agenda",
  path => "/usr/bin",
  require => Package["mysql-server"]
}

file { "/opt/scriptbanco.sql":
    source => "/vagrant/manifests/site/pessoa.sql",
    owner => "mysql",
    group => "mysql",
    mode => 0644,
    require => Package["mysql-server"]
}

exec { "mysql-password" :
    command => "mysql -uroot -e \"GRANT ALL PRIVILEGES ON * TO 'agenda'@'%' IDENTIFIED BY 'agenda';\" agenda",
    unless  => "mysql -uagenda -pminha-senha agenda",
    path => "/usr/bin",
    require => Exec["criarbanco"]
}

exec {"criarestrutura":
  command => "mysql -uagenda -pagenda < /vagrant/manifests/site/pessoa.sql",
  path => "/usr/bin",
  require => Package["mysql-server"]
}

