<?php

namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/php-fpm.php';
require 'contrib/npm.php';

set('application', 'Coaching101');
set('repository', 'git@github.com:otim22/coaching101.git');
set('php_fpm_version', '7.4');

host('167.71.47.82')
    ->set('remote_user', 'root')
    ->set('hostname', 'oncloudlearning.com')
    ->set('deploy_path', '/var/www/{{hostname}}');

task('dev', [
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
    'artisan:db:seed',
    'composer:install',
    'npm:install',
    'npm:run:prod',
    'deploy:publish',
    'php-fpm:reload',
    'deploy:unlock',
    'cleanup',
    'success'
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
    'cleanup',
    'success'
]);

task('composer:install', function () {
    cd('{{release_path}}');
    run('composer install');
});

task('npm:run:prod', function () {
    cd('{{release_path}}');
    run('npm run prod');
});

after('deploy:failed', 'deploy:unlock');
