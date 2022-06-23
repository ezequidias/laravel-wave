<?php

namespace Qruto\LaravelWave\Commands;

use Illuminate\Console\Command;
use Qruto\LaravelWave\Events\SsePingEvent;

class Ping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sse:ping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ping server side event connections';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        while (true) {
            event(new SsePingEvent());
            $this->info(now().': Pinged');

            sleep(30);
        }

        return 0;
    }
}
