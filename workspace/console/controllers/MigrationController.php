<?php


namespace workspace\console\controllers;


use core\App;
use core\console\CgMigrationCreator;
use core\console\ConsoleController;
use core\Debug;
use Illuminate\Database\Migrations\DatabaseMigrationRepository;
use Illuminate\Database\Migrations\MigrationCreator;
use Illuminate\Database\Migrations\Migrator;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;
use Illuminate\Filesystem\Filesystem;
use core\ArgvParser;

class MigrationController extends ConsoleController
{
    //create migrations table
    public function actionCreateMigrationTable()
    {
        try {
            App::$db->schema->create('migration', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('migration', 255);
                $table->integer('batch');
            });
            $this->out->r("Success", 'green');
        }
        catch (\Exception $e){
            $this->out->r($e->getMessage(), 'red');
        }
    }

    // create migrations
    public function actionCreate()
    {
        try {
            if (!isset($this->argv['name'])) {
                throw new \Exception('Missing migration "--name" specified');
            }
            $m = new CgMigrationCreator(new Filesystem());

            $path = isset($this->argv['path']) ? $this->argv['path'] : 'console/migrations';

            $res = $m->create(
                $this->argv['name'],
                WORKSPACE_DIR . '/' . $path,
                isset($this->argv['table']) ? $this->argv['table'] : null,
                !isset($this->argv['update'])
            );
            $this->out->r(basename($res) . " created", 'green');
        } catch (\Exception $e) {
            $this->out->r('Message: ' .$e->getMessage(), 'red');
        }
    }

    //execute migrations
    public function actionRun()
    {
        try {
            $dmr = new DatabaseMigrationRepository(App::$db->capsule->getDatabaseManager(), 'migration');

            $m = new Migrator($dmr, App::$db->capsule->getDatabaseManager(), new Filesystem());
            $migrationPaths = array_merge(App::$migrationsPaths, [WORKSPACE_DIR . '/console/migrations']);
            $res = $m->run($migrationPaths);
            foreach ($res as $re){
                $this->out->r(basename($re), 'green');
            }
        }
        catch (\Exception $e){
            $this->out->r('Message: ' .$e->getMessage(), 'red');
        }
    }

    public function actionRollback()
    {
        try {
            $dmr = new DatabaseMigrationRepository(App::$db->capsule->getDatabaseManager(), 'migration');

            $m = new Migrator($dmr, App::$db->capsule->getDatabaseManager(), new Filesystem());
            $migrationPaths = array_merge(App::$migrationsPaths, [WORKSPACE_DIR . '/console/migrations']);
            $res = $m->rollback($migrationPaths);
            foreach ($res as $re){
                $this->out->r(basename($re), 'green');
            }
        }
        catch (\Exception $e){
            $this->out->r('Message: ' .$e->getMessage(), 'red');
        }
    }
}