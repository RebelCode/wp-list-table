<?php

namespace RebelCode\WordPress\Admin\ListTable;

use Dhii\Block\BlockInterface;
use Traversable;

/**
 * Something that represents a list table.
 *
 * @since [*next-version*]
 */
interface ListTableInterface extends BlockInterface
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

    /**
     * Retrieves the number of items per page.
     *
     * @since [*next-version*]
     *
     * @return int
     */
    public function getItemsPerPage();

    /**
     * Gets the current page number.
     *
     * @since [*next-version*]
     *
     * @return int
     */
    public function getCurrentPage();

    /**
     * Retrieves the total number of pages.
     *
     * @since [*next-version*]
     *
     * @return int
     */
    public function getTotalNumPages();

    /**
     * Renders the list table.
     *
     * @since [*next-version*]
     *
     * @return string
     */
    public function render();
}
