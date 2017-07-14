<?php

namespace RebelCode\WordPress\Admin\ListTable\Column;

use RebelCode\WordPress\Admin\ListTable\ActionInterface;
use RebelCode\WordPress\Admin\ListTable\ListTableInterface;

/**
 * Base functionality for a column.
 *
 * @since [*next-version*]
 */
abstract class AbstractBaseColumn extends AbstractColumn implements ColumnInterface
{
    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param string            $id       The action ID.
     * @param string            $label    The action label.
     * @param bool              $sortable True to make the column sortable, false to make it non-sortable.
     * @param ActionInterface[] $actions  The action instances.
     */
    public function __construct($id, $label, $sortable = false, $actions = array())
    {
        $this->_setId($id)
             ->_setLabel($label)
             ->_setSortable($sortable)
             ->_setActions($actions)
             ->_setType(static::TYPE_REGULAR);
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

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getType()
    {
        return $this->_getType();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getActions()
    {
        return $this->_getActions();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function isSortable()
    {
        return $this->_isSortable();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function render(ListTableInterface $listTable, $item)
    {
        return $this->_render($listTable, $item);
    }
}
