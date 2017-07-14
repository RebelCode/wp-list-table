<?php

namespace RebelCode\WordPress\Action;

use RebelCode\WordPress\IdAwareTrait;
use RebelCode\WordPress\LabelAwareTrait;

/**
 * Abstract functionality for an action.
 *
 * @since [*next-version*]
 */
abstract class AbstractAction
{
    use IdAwareTrait;
    use LabelAwareTrait;
}
