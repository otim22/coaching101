<?php

namespace Deployer;

require 'vendor/deployer/deployer/recipe/laravel.php';
require 'vendor/deployer/deployer/contrib/php-fpm.php';
require 'vendor/deployer/deployer/contrib/npm.php';

set('application', 'Coaching101');
set('repository', 'git@github.com:otim22/coaching101.git');
set('php_fpm_version', '7.4');

host('prod')
    ->set('remote_user', 'lapwony')
    ->set('identity_file', '~/.ssh/lapwonykey')
    ->set('branch', 'master')
    ->set('hostname', '167.71.47.82')
    ->set('deploy_path', '/var/www/oncloudlearning.com');

// task('dev', [
//     'deploy:prepare',
//     'deploy:vendors',
//     'artisan:storage:link',
//     'artisan:view:cache',
//     'artisan:config:cache',
//     'artisan:migrate',
//     'composer:install',
//     'npm:install',
//     'artisan:migrate:fresh',
//     'artisan:db:seed',
//     'artisan:optimize',
//     'npm:run:prod',
//     'deploy:publish',
//     'php-fpm:reload',
// ]);

task('prod', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'artisan:migrate',
    'composer:install',
    'npm:install',
    'artisan:optimize',
    'npm:run:prod',
    'deploy:publish',
    'php-fpm:reload',
]);

task('composer:install', function () {
    cd('{{release_or_current_path}}');
    run('composer install');
});

task('npm:run:prod', function () {
    cd('{{release_or_current_path}}');
    run('npm run prod');
});

after('deploy:failed', 'deploy:unlock');
