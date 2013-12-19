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
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $watcher = App::make('guard');

        $config = $watcher->getConfig();
        
        $realpaths = array();
        $base = $config['base_path'];
        $paths = $config['paths'];
        $events = $config['events'];

        foreach ($paths as $path)
        {
            $realpath = realpath($base . '/'. $path);

            if ($realpath) {
                $realpaths[] = $realpath;
            }
        }

        $config['paths'] = $realpaths;
        $watcher->setConfig($config);

        $this->line('Watcher started, waiting for changes...');
        $watcher->start();
    }
}