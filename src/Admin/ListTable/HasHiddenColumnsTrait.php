<?php

namespace RebelCode\WordPress\Admin\ListTable;

/**
 * Something that has a list of hidden column IDs.
 *
 * @since [*next-version*]
 */
trait HasHiddenColumnsTrait
{
    /**
     * The list of hidden column IDs.
     *
     * @since [*next-version*]
     *
     * @var array
     */
    protected $hiddenColumns;

    /**
     * Retrieves the list of hidden column IDs.
     *
     * @since [*next-version*]
     *
     * @return string[]
     */
    protected function _getHiddenColumns()
    {
        return $this->hiddenColumns;
    }

    /**
     * Sets the hidden column IDs.
     *
     * @since [*next-version*]
     *
     * @param string[] $hiddenColumns An array of string IDs.
     *
     * @return $this
     */
    protected function _setHiddenColumns($hiddenColumns)
    {
        $this->hiddenColumns = $hiddenColumns;

        return $this;
    }

    /**
     * Sets whether a column is hidden or not.
     *
     * @since [*next-version*]
     *
     * @param string $columnId The column ID.
     * @param bool   $hidden   True to hide the column, false to show.
     *
     * @return $this
     */
    protected function _setColumnHidden($columnId, $hidden = true)
    {
        ($hidden)
            ? $this->_addHiddenColumn($columnId)
            : $this->_removeHiddenColumn($columnId);

        return $this;
    }

    /**
     * Adds a column ID to the list of hidden columns.
     *
     * @since [*next-version*]
     *
     * @param string $columnId The column ID.
     *
     * @return $this
     */
    protected function _addHiddenColumn($columnId)
    {
        array_push($this->hiddenColumns, $columnId);

        return $this;
    }

    /**
     * Removes the column ID from the list of hidden columns.
     *
     * @since [*next-version*]
     *
     * @param string $columnId The column ID.
     *
     * @return $this
     */
    protected function _removeHiddenColumn($columnId)
    {
        $index = array_search($columnId, $this->hiddenColumns);

        if ($index > -1) {
            array_splice($this->hiddenColumns, $index);
        }

        return $this;
    }
}
