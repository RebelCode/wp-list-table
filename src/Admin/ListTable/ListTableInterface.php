<?php

namespace RebelCode\WordPress\Admin\ListTable;

use Dhii\Block\BlockInterface;
use RebelCode\WordPress\Admin\ListTable\Column\ColumnInterface;
use RebelCode\WordPress\Pagination\PaginationHandlerInterface;
use Traversable;

/**
 * Something that represents a list table.
 *
 * @since [*next-version*]
 */
interface ListTableInterface extends BlockInterface, PaginationHandlerInterface
{
    /**
     * Retrieves the items in the list table.
     *
     * @since [*next-version*]
     *
     * @return array|Traversable
     */
    public function getItems();

    /**
     * Retrieves the columns.
     *
     * @since [*next-version*]
     *
     * @return ColumnInterface[] The columns.
     */
    public function getColumns();

    /**
     * Retrieves the primary column ID.
     *
     * @since [*next-version*]
     *
     * @return string
     */
    public function getPrimaryColumn();

    /**
     * Retrieves the list of hidden column IDs.
     *
     * @since [*next-version*]
     *
     * @return string[]
     */
    public function getHiddenColumns();
}
