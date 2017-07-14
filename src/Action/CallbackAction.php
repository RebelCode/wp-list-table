<?php

namespace RebelCode\WordPress\Action;

use Dhii\Util\CallbackAwareTrait;

/**
 * A simple implementation of an action that calls a callback when invoked.
 *
 * @since [*next-version*]
 */
class CallbackAction extends AbstractBaseAction implements ActionInterface
{
    use CallbackAwareTrait;

    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param string        $id       The action ID.
     * @param string        $label    The action label.
     * @param callable|null $callback The callback or null.
     */
    public function __construct($id, $label, callable $callback = null)
    {
        parent::__construct($id, $label);

        $this->_setCallback($callback);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function invoke($args = array())
    {
        if (($callback = $this->_getCallback()) === null) {
            return;
        }

        return call_user_func_array($callback, $this->_filterCallbackArgs($args));
    }

    /**
     * Filters the arguments to pass to the callback when invoked.
     *
     * @since [*next-version*]
     *
     * @param array $args The arguments passed to the action when it was invoked.
     *
     * @return array
     */
    protected function _filterCallbackArgs($args)
    {
        return $args;
    }
}
