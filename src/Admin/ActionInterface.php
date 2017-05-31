<?php

namespace RebelCode\WordPress\Admin;

use Dhii\Data\IdAwareInterface;
use RebelCode\WordPress\LabelAwareInterface;

/**
 * Something displayed to the user that represents an action that can be taken, perhaps on an entity.
 *
 * @since [*next-version*]
 */
interface ActionInterface extends IdAwareInterface, LabelAwareInterface
{
}
