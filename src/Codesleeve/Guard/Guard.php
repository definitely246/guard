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

		$runner->start();
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