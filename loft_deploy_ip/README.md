## Configuration
Add the following to your staging server _settings.local.php_ to only show border by ip.

    $conf['loft_deploy_ip_filter'] = 'include';
    $conf['loft_deploy_ip_ips'][] = '{your ip}';