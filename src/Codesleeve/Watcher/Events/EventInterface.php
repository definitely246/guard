<?php namespace Codesleeve\Watcher\Events;

interface EventInterface
{
	public function listen($event, $watcher);
}