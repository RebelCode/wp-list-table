<?php

namespace RebelCode\WordPress\Admin\ListTable;

/**
 * Something that has list table columns.
 *
 * @since [*next-version*]
 */
trait HasColumnsTrait
{
    /**
     * The columns.
     *
     * @since [*next-version*]
     *
     * @var ColumnInterface[]
     */
    protected $columns;

    /**
     * Retrieves the columns.
     *
     * @since [*next-version*]
     *
     * @return ColumnInterface[] The columns.
     */
    protected function _getColumns()
    {
        return $this->columns;
    }

    /**
     * Sets the columns.
     *
     * @since [*next-version*]
     *
     * @param ColumnInterface[] $columns An array of ColumnInterface instances.
     *
     * @return $this
     */
    protected function _setColumns(array $columns)
    {
        $this->_clearColumns()->_addManyColumns($columns);

        return $this;
    }

    /**
     * Adds a column.
     *
     * @since [*next-version*]
     *
     * @param ColumnInterface $column The column instance.
     *
     * @return $this
     */
    protected function _addColumn(ColumnInterface $column)
    {
        $this->columns[$column->getId()] = $column;

        return $this;
    }

    /**
     * Adds multiple columns.
     *
     * @since [*next-version*]
     *
     * @param ColumnInterface[] $columns The column instances.
     *
     * @return $this
     */
    protected function _addManyColumns(array $columns)
    {
        foreach ($columns as $column) {
            $this->_addColumn($column);
        }

        return $this;
    }

    /**
     * Checks whether this instance has a specific column.
     *
     * @since [*next-version*]
     *
     * @param ColumnInterface $column The column instance.
     *
     * @return bool True if the column was found, false if not.
     */
    protected function _hasColumn(ColumnInterface $column)
    {
        return $this->_hasColumnId($column->getId());
    }

    /**
     * Checks whether this instance has a column with a specific ID.
     *
     * @since [*next-version*]
     *
     * @param string $columnId The column ID.
     *
     * @return bool True if the column ID was found, false if not.
     */
    protected function _hasColumnId($columnId)
    {
        return \array_key_exists($columnId, $this->columns);
    }

    /**
     * Retrieves the column instance with a specific ID.
     *
     * @since [*next-version*]
     *
     * @param string $columnId The ID of the column.
     *
     * @return ColumnInterface|null The column instance if found, null if not.
     */
    protected function _getColumn($columnId)
    {
        return $this->_hasColumnId($columnId)
            ? $this->columns[$columnId]
            : null;
    }

    /**
     * Removes a specific column.
     *
     * @since [*next-version*]
     *
     * @param ColumnInterface $column The column instance.
     * 
     * @return $this
     */
    protected function _removeColumn(ColumnInterface $column)
    {
        $this->_removeColumnWithId($column->getId());

        return $this;
    }

    /**
     * Removes the column with a specific ID.
     *
     * @since [*next-version*]
     *
     * @param string $columnId The ID of the column.
     *
     * @return $this
     */
    protected function _removeColumnWithId($columnId)
    {
        unset($this->columns[$columnId]);

        return $this;
    }

    /**
     * Removes all the columns from this instance.
     *
     * @since [*next-version*]
     *
     * @return $this
     */
    protected function _clearColumns()
    {
        $this->columns = array();

        return $this;
    }
}
