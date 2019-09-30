# Autor: CarryOn Tech
exec { "apt-update":
  command => "/usr/bin/apt-get update"
}

package { ["apache2"]:
  ensure => installed
}

service { "apache2":
  ensure => running,
  enable => true,
  hasstatus => true,
  hasrestart => true,
  require => Package["apache2"]

}

exec { ["copyfiles"]:
  command => "mkdir /var/www/html/site && cp -r /vagrant/manifests/site/* /var/www/html/site",
  path => "/bin/",
  unless => "/bin/ls /var/www/html/site",
  require => Package["apache2"],
  notify => Service["apache2"]
}

package { ["php5","php5-mysql","php5-sybase"]:
  ensure => installed,
  notify => Service["apache2"]
}

