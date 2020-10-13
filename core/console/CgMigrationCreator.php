<?php


namespace core\console;


use Illuminate\Database\Migrations\MigrationCreator;

class CgMigrationCreator extends MigrationCreator
{

    /**
     * Get the path to the stubs.
     *
     * @return string
     */
    public function stubPath()
    {
        return ROOT_DIR . '/core/console/migrations/stubs';
    }

}