<?php

namespace RebelCode\WordPress\Action;

use Dhii\Data\IdAwareInterface;
use RebelCode\WordPress\LabelAwareInterface;

/**
 * Something displayed to the user that represents an action that can be taken, perhaps on an entity.
 *
 * How an action is displayed is dependent on its use. It can be displayed as a button, a table row action,
 * a bulk action in a list, a link in a notice, etc.
 *
 * @since [*next-version*]
 */
interface ActionInterface extends IdAwareInterface, LabelAwareInterface
{
    /**
     * Invokes the action.
     *
     * @since [*next-version*]
     *
     * @param array $args Optional array of arguments.
     */
    public function invoke($args = array());
}
