<?php namespace Codesleeve\Guard\Commands;

use App;
use Illuminate\Console\Command;
use Codesleeve\Guard\Guard;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class WatchCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'guard:watch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Watches files and folders and runs the events in your pipeline config";

    /**
     * The signals we want to watch for when user closes guard watch
     * 
     * @var array
     */
    protected $signals = array(SIGTERM, SIGINT, SIGHUP, SIGUSR1);

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $guard = App::make('guard');
        $config = $guard->getConfig();
        
        $realpaths = array();
        $base = $config['base_path'];
        $paths = $config['paths'];
        $events = $config['events'];

        // tick use required as of PHP 4.3.0
        declare(ticks = 1);

        foreach ($this->signals as $signal)
        {
            pcntl_signal($signal, function($signal) use ($guard)
            {
                $guard->stop();
                exit;
            });
        }

        foreach ($paths as $path)
        {
            $realpath = realpath($base . '/'. $path);

            if ($realpath) {
                $realpaths[] = $realpath;
            }
        }

        $config['paths'] = $realpaths;
        $guard->setConfig($config);

        $this->line('Watcher started, waiting for changes...');
        $guard->start();
    }
}