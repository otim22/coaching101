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
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);


// Hosts

host('174.138.32.252')
    ->user('deployer')
    ->identityFile('~/.ssh/deployerkey')
    ->set('branch', 'master')
    ->set('deploy_path', '/var/www/html/coaching101')
    ->set('http_user', 'www-data')
    ->set('writable_mode', 'chmod')
    ->set('use_relative_symlink', '0');

// Tasks

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'upload',
    'deploy:shared',
    'deploy:vendors',
    // 'deploy:writable',
    'artisan:storage:link',
    'artisan:view:clear',
    'artisan:cache:clear',
    'artisan:config:cache',
    'artisan:optimize',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

after('deploy:vendors', 'artisan:migrate');
