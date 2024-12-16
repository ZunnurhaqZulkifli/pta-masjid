<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:start {seed?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically setup the application for server and local deployment.';

    /**
     * Execute the console command.
     */

     protected function rCommand($command)
    {
        $process = proc_open($command, [
            1 => ['pipe', 'w'], // stdout
            2 => ['pipe', 'w'], // stderr
        ], $pipes);

        if (is_resource($process)) {
            while ($line = fgets($pipes[1])) {
                $this->warn($line);
            }

            while ($line = fgets($pipes[2])) {
                $this->error($line);
            }

            fclose($pipes[1]);
            fclose($pipes[2]);

            return proc_close($process);
        }

        return 1;
    }

    protected function upLocal() {
        //
    }

    public function handle()
    {
        $seed = $this->argument('seed') == 'seed' ? true : false;

        $progress = $this->output->createProgressBar(100);
        $this->info(' ');
        $this->info('Starting the application startup process...');
        $this->info(' ');

        $progress->start();

        $this->info(' ');
        $this->info('Installing Composer dependencies...');
        $this->info(' ');

        exec('composer install', $output, $returnVar);
        $progress->advance(10);
        if ($returnVar !== 0) {
            $this->info(' ');
            $this->error('Composer installation failed!');
            return;
        }

        if($seed) {
            $this->info(' ');
            $this->warn('Auto Resetting Database...');
            $this->call('db:wipe');
            
            $this->info(' ');
            $this->info('Auto Migrating Database...');
            $this->info(' ');
            $this->call('migrate:fresh');
            
            $this->info('Auto Seed Database...');
            $this->info(' ');
            $this->call('db:seed');
            $this->info(' ');
        } else {
            $this->warn('Skipping Database Reset...');
        }

        $this->warn('Resetting Views...');
        $this->info(' ');
        $this->call('optimize');
        $this->call('config:clear');
        $this->info(' ');

        for($i = 0; $i < 10; $i++) {
            $progress->advance($i);
            sleep(0.1);
        }

        $this->info(' ');
        $this->info('Starting Valet dependencies...');
        $this->info(' ');

        // exec('valet start', $output, $valetStartupStatus);
        // if ($valetStartupStatus !== 0) {
        //     $this->info(' ');
        //     $this->error('Valet Startup failed!');
        //     return;
        // }

        // for($i = 0; $i < 20; $i++) {
        //     $progress->advance($i);
        //     sleep(1);
        // }

        // Installing NPM dependencies
        $this->info(' ');
        $this->info('Installing NPM dependencies...');
        $this->info(' ');

        $npmInstallStatus = $this->rCommand('npm install');
        $progress->advance(70);
        if ($npmInstallStatus !== 0) {
            $this->info(' ');
            $this->error('NPM installation failed!');
            return;
        }

        // Building assets
        $this->info(' ');
        $this->info('Building assets with NPM...');
        
        $this->info(' ');
        $npmBuildStatus = $this->rCommand('npm run dev');

        if ($npmBuildStatus !== 0) {
            $this->info(' ');
            $this->error('NPM install failed!');
            return;
        }

        $progress->finish();

        $this->info(' ');
        $this->info('Application setup complete!');

        if ($npmBuildStatus !== 0) {
            $this->info(' ');
            $this->error('NPM build failed!');
            return;
        }
    }
}
