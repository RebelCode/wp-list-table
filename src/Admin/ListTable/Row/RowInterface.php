<?php

namespace RebelCode\WordPress\Admin\ListTable\Row;

use Dhii\Data\IdAwareInterface;
use RebelCode\WordPress\Admin\ListTable\ListTableInterface;

/**
 * Something that can be a list table row.
 *
 * @since [*next-version*]
 */
interface RowInterface extends IdAwareInterface
{
    /**
     * Retrieves the item that is rendered by this row.
     *
     * @since [*next-version*]
     *
     * @return mixed
     */
    public function getItem();

    /**
     * Renders the row for a specific list table.
     *
     * @since [*next-version*]
     *
     * @param ListTableInterface $listTable The list table for which to render this row.
     *
     * @return string The rendered content.
     */
    public function render(ListTableInterface $listTable);
}
