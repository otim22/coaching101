<?php

namespace Deployer;

require 'vendor/deployer/deployer/recipe/laravel.php';
require 'vendor/deployer/deployer/contrib/php-fpm.php';
require 'vendor/deployer/deployer/contrib/npm.php';

set('application', 'Coaching101');
set('repository', 'git@github.com:otim22/coaching101.git');
set('php_fpm_version', '7.4');

host('production')
    ->set('remote_user', 'lapwony')
    ->set('identity_file', '~/.ssh/lapwonykey')
    ->set('branch', 'master')
    ->set('hostname', '167.71.47.82')
    ->set('deploy_path', '/var/www/oncloudlearning.com')
    ->set('http_user', 'www-data')
    ->set('writable_mode', 'chmod');

task('dev', [
    'deploy:info',
    'deploy:prepare',
    'deploy:release',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:cache:clear',
    'artisan:config:cache',
    'artisan:optimize',
    'artisan:migrate',
    'artisan:db:seed',
    'npm:install',
    'npm:run:prod',
    'deploy:publish',
    'php-fpm:reload',
    'deploy:unlock',
]);

task('prod', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:cache:clear',
    'artisan:config:cache',
    'artisan:optimize',
    'artisan:migrate',
    'composer:install',
    'npm:install',
    'npm:run:prod',
    'deploy:publish',
    'php-fpm:reload',
    'deploy:unlock',
]);

task('npm:run:prod', function () {
    cd('{{release_path}}');
    run('npm run prod');
});

after('deploy:failed', 'deploy:unlock');
