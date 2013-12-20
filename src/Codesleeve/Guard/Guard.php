<?php namespace Codesleeve\Guard;

use Lurker\Event\FilesystemEvent;
use Lurker\ResourceWatcher;

class Guard
{
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->runner = new ResourceWatcher;
    }

    public function start()
    {
        $events = $this->config['events'];
        $paths = $this->config['paths'];
        $runner = $this->runner;

        // register each path in lurker        
        foreach ($paths as $index => $path)
        {
            if (is_dir($path) || is_file($path))
            {
    			$runner->track("paths.{$index}", $path);
                $runner->addListener("paths.{$index}", function (FilesystemEvent $fsEvent) use ($events, $runner)
                {
                    foreach ($events as $event)
                    {
                        $event->listen($fsEvent, $runner);
                    }
                });
            }
		}

        // tell each event we are starting
        foreach ($events as $event)
        {
            $event->start($this);
        }

        // start the lurker runner
		$runner->start();
    }

    /**
     * Stops all the events we have running
     * 
     * @return [type] [description]
     */
    public function stop()
    {
        $events = $this->config['events'];
        foreach ($events as $event)
        {
            $event->stop();
        }
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setConfig(array $config)
    {
        $this->config = $config;
    }
}