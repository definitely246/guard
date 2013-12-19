<?php namespace Codesleeve\Guard\Events;

interface EventInterface
{
	public function listen($event, $watcher);
}