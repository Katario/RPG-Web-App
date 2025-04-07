<?php

namespace Deployer;

require 'recipe/symfony.php';

// Config

set('repository', 'git@github.com:Katario/RPG-Web-App.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('51.210.100.20')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/app');

// Hooks

after('deploy:failed', 'deploy:unlock');
