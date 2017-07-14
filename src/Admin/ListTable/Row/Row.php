<?php

namespace RebelCode\WordPress\Admin\ListTable\Row;

use RebelCode\WordPress\Admin\ListTable\ListTableInterface;

/**
 * A simple implementation of a list table row.
 *
 * @since [*next-version*]
 */
class Row extends AbstractRow implements RowInterface
{
    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param mixed    $id          The row ID.
     * @param mixed    $item        The row item.
     * @param string[] $htmlClasses The html classes.
     */
    public function __construct($id, $item, $htmlClasses = array())
    {
        $this->_setId($id)
            ->_setItem($item)
            ->_setHtmlClasses($htmlClasses);
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
    public function getItem()
    {
        return $this->_getItem();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function render(ListTableInterface $listTable)
    {
        return $this->_render($listTable);
    }
}
