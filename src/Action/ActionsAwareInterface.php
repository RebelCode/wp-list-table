<?php

namespace RebelCode\WordPress\Action;

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
