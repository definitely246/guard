<?php namespace Codesleeve\Guard\Events;

interface EventInterface
{
	public function start($watcher);
	public function stop();
	public function listen($event);
}