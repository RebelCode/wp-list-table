<?php

namespace RebelCode\WordPress\Action;

/**
 * Base functionality for an action.
 *
 * @since [*next-version*]
 */
abstract class AbstractBaseAction extends AbstractAction implements ActionInterface
{
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
