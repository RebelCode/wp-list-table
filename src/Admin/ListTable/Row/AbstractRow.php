<?php

namespace RebelCode\WordPress\Admin\ListTable\Row;

use RebelCode\WordPress\Admin\ListTable\Column\ColumnInterface;
use RebelCode\WordPress\Admin\ListTable\ListTableInterface;
use RebelCode\WordPress\Html\HtmlClassesAwareTrait;
use RebelCode\WordPress\Html\HtmlRenderCapableTrait;

/**
 * Abstract functionality for a row.
 *
 * @since [*next-version*]
 */
abstract class AbstractRow
{
    use HtmlClassesAwareTrait;
    use HtmlRenderCapableTrait;

    /**
     * HTML tag for a row.
     *
     * @since [*next-version*]
     */
    const HTML_TAG_ROW = 'tr';

    /**
     * The row ID.
     *
     * @since [*next-version*]
     *
     * @var string|int
     */
    protected $id;

    /**
     * The list item.
     *
     * @since [*next-version*]
     *
     * @var mixed
     */
    protected $item;

    /**
     * Retrieves the row ID.
     *
     * @since [*next-version*]
     *
     * @return int|string
     */
    protected function _getId()
    {
        return $this->id;
    }

    /**
     * Sets the row ID.
     *
     * @since [*next-version*]
     *
     * @param int|string $id The new row ID.
     *
     * @return $this
     */
    protected function _setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Retrieves the list item.
     *
     * @since [*next-version*]
     *
     * @return mixed
     */
    protected function _getItem()
    {
        return $this->item;
    }

    /**
     * Sets the list item.
     *
     * @since [*next-version*]
     *
     * @param mixed $item The list item.
     *
     * @return AbstractRow
     */
    protected function _setItem($item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Renders the row.
     *
     * @since [*next-version*]
     *
     * @param ListTableInterface $listTable The list table for which to render.
     *
     * @return string
     */
    protected function _render(ListTableInterface $listTable)
    {
        $cells = array_map(
            function ($column) use ($listTable) {
                return $this->_renderCell($listTable, $column);
            },
            $listTable->getColumns()
        );

        return $this->_tag(static::HTML_TAG_ROW, array('class' => $this->_getHtmlClasses()), $cells);
    }

    /**
     * Renders a single cell.
     *
     * @since [*next-version*]
     *
     * @param ListTableInterface $listTable
     * @param ColumnInterface    $column
     *
     * @return string
     */
    protected function _renderCell(ListTableInterface $listTable, ColumnInterface $column)
    {
        return $column->render($listTable, $this);
    }
}
