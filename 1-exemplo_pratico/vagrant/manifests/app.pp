# Autor: CarryOn Tech

# Atualizar as listas de pacotes disponíveis
exec { "apt-update":
  command => "/usr/bin/apt-get update"
}

# Instalar o Apache
package { ["apache2"]:
  ensure => installed
}

# Criar o service do Apache
service { "apache2":
  ensure => running,
  enable => true,
  hasstatus => true,
  hasrestart => true,
  require => Package["apache2"]

}
# Criar a pasta "/var/www/html/site" e copiar os arquivos do site para dentro desta pasta
exec { ["copyfiles"]:
  command => "mkdir /var/www/html/site && cp -r /vagrant/manifests/site/* /var/www/html/site",
  path => "/bin/",
  unless => "/bin/ls /var/www/html/site",
  require => Package["apache2"],
  notify => Service["apache2"]
}

# Instalar o PHP e os drivers necessários para a conexão com o MySQL
package { ["php5","php5-mysql","php5-sybase"]:
  ensure => installed,
  notify => Service["apache2"]
}

