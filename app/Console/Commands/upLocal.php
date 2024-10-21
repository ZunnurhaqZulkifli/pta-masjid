<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class upLocal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:up-local';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $this->rCommand('php artisan optimize');
        // $this->rCommand('php artisan serve --port=8000 --host=127.0.0.1');
        // $this->rCommand('ngrok http http://127.0.0.1:8000');
    }
}
