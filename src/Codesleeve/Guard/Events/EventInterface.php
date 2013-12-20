<?php namespace Codesleeve\Guard\Events;

interface EventInterface
{
    /**
     * This is called once when guard starts up.
     * 
     * @param  Codesleeve\Guard\Guard $guard
     * @return void
     */
	public function start($guard);

    /**
     * This is called once when guard is stopped.
     * 
     * @return void
     */
	public function stop();

    /**
     * This is called anytime a file guard is watching changes
     * 
     * @param  Event $event
     * @return 
     */
	public function listen($event);
}
