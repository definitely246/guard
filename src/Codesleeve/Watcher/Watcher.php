<?php namespace Codesleeve\Watcher;

use Lurker\Event\FilesystemEvent;
use Lurker\ResourceWatcher;

class Watcher
{
    public function __construct(array $paths = array(), array $events = array())
    {
        $this->events = $events;
        $this->paths = $paths;
        $this->watcher = new ResourceWatcher;
    }

    public function start()
    {
        $events = $this->events;
        $watcher = $this->watcher;
        
        foreach ($this->paths as $index => $path)
        {
            if (is_dir($path) || is_file($path))
            {
    			$watcher->track("paths.{$index}", $path);
                $watcher->addListener("paths.{$index}", function (FilesystemEvent $fsEvent) use ($events, $watcher)
                {
                    foreach ($events as $event)
                    {
                        $event->listen($fsEvent, $watcher);
                    }
                });
            }
		}

		$watcher->start();
    }

    public function setPaths($paths)
    {
    	$this->paths = $paths;
    }

    public function setEvents($events)
    {
    	$this->events = $events;
    }
}