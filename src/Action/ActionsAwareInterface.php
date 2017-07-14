<?php

namespace RebelCode\WordPress\Admin;

use RebelCode\WordPress\Action\ActionInterface;
use Traversable;

/**
 * Something that has actions.
 *
 * @since [*next-version*]
 */
interface ActionsAwareInterface
{
    /**
     * Gets the actions.
     *
     * @since [*next-version*]
     *
     * @return ActionInterface[]|Traversable The action instances.
     */
    public function getActions();
}
