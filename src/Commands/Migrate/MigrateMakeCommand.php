<?php

namespace EJLab\Laravel\MultiTenant\Commands\Migrate;

class MigrateMakeCommand extends \Illuminate\Database\Console\Migrations\MigrateMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:migration {name : The name of the migration.}
        {--create= : The table to be created.}
        {--table= : The table to migrate.}
        {--path= : The location where the migration file should be created.}
        {--T|tenant : Create migration for tenant database. }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new migration file for tenant database';

    protected function getMigrationPath()
    {
        $path = parent::getMigrationPath();
        if ($this->input->getOption('tenant')) {
            $path .= DIRECTORY_SEPARATOR.'tenant';
            if (!file_exists($path) || !is_dir($path)) mkdir($path);
        }

        return $path;
    }
}