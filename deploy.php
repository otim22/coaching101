<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'Coaching101');

// Project repository
set('repository', 'git@github.com:otim22/coaching101.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', [
    '.env'
]);
add('shared_dirs', [
    'storage'
]);

// Writable dirs by web server
add('writable_dirs', [
    'storage',
    'bootstrap/cache'
]);

// Hosts

host('174.138.32.252')
    ->user('deployer')
    ->identityFile('~/.ssh/deployerkey')
    ->set('branch', 'master')
    ->set('deploy_path', '/var/www/html/coaching101')
    ->set('http_user', 'www-data')
    ->set('writable_mode', 'chmod')
    ->set('writable_chmod_mode', '0777')
    ->set('use_relative_symlink', '0');

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');
