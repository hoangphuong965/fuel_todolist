<?php
// Fuel initialization (inspired from index.php)
define('DOCROOT', __DIR__.DIRECTORY_SEPARATOR);
define('APPPATH', realpath(__DIR__.'/../fuel/app/')
 .DIRECTORY_SEPARATOR);
define('PKGPATH', realpath(__DIR__.'/../fuel/packages/')
 .DIRECTORY_SEPARATOR);
define('COREPATH', realpath(__DIR__.'/../fuel/core/')
 .DIRECTORY_SEPARATOR);
defined('FUEL_START_TIME') or define('FUEL_START_TIME', 
 microtime(true));
defined('FUEL_START_MEM') or define('FUEL_START_MEM',
 memory_get_usage());
require COREPATH.'classes'.DIRECTORY_SEPARATOR.'autoloader.php';
class_alias('Fuel\\Core\\Autoloader', 'Autoloader');
require APPPATH.'bootstrap.php';
echo 'FuelPHP is initialized...';

$task = Model_Task::find(3, array('from_cache' => false));
$project = $task->project;
// \Debug::dump('Project of task with id = 1', $project);

$project = Model_Project::find(2, array('from_cache' => false));
$tasks = $project->tasks;
// \Debug::dump('Tasks of project with id = 2', $tasks);

$projects = Model_Project::find('all', array('related' => 'tasks'));
foreach($projects as $project) {
    \Debug::dump (
        'LOOP 2: Tasks of project with id = '.$project->id,
        $project->tasks
    );
}
