<?php

namespace RebelCode\WordPress\Admin;

use RebelCode\WordPress\HasIdTrait;
use RebelCode\WordPress\HasLabelTrait;

/**
 * Implementation of a simple action.
 *
 * @since [*next-version*]
 */
class Action implements ActionInterface
{
    use HasIdTrait;
    use HasLabelTrait;

    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param string $id    The action ID.
     * @param string $label The action label.
     */
    public function __construct($id, $label)
    {
        $this->_setId($id)
            ->_setLabel($label);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getId()
    {
        return $this->_getId();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getLabel()
    {
        return $this->_getLabel();
    }
}
