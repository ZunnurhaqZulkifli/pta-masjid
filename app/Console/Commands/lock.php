<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class lock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:lock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the application';

    /**
     * Execute the console command.
     */

    public function rCommand($command) 
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



    public function handle()
    {
        $file = base_path('.env');

        if(file_exists($file)) {
            $this->error('Locking the application...');

            unlink($file);

            $this->info('Application locked !');

            $this->rCommand('composer dump-autoload');
            $this->rCommand('composer install');
        }
    }
}
