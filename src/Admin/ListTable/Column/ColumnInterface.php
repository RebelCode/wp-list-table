<?php

namespace RebelCode\WordPress\Admin\ListTable;

use Dhii\Block\BlockInterface;
use Dhii\Data\IdAwareInterface;
use RebelCode\WordPress\Action\ActionsAwareInterface;
use RebelCode\WordPress\LabelAwareInterface;

/**
 * Represents a list table column.
 *
 * @since [*next-version*]
 */
interface ColumnInterface extends
    IdAwareInterface,
    LabelAwareInterface,
    ActionsAwareInterface
{
    /**
     * Retrieves whether or not the column is sortable.
     *
     * @since [*next-version*]
     *
     * @return bool True if the column is sortable, false if not.
     */
    public function isSortable();

    /**
     * Retrieves the content for a specific item.
     *
     * @since [*next-version*]
     *
     * @param ListTableInterface $listTable The list table in which the column cell is being rendered.
     * @param mixed              $item      The item being rendered.
     *
     * @return BlockInterface|string
     */
    public function render(ListTableInterface $listTable, $item);
}
