<?php

namespace RebelCode\WordPress\Admin\ListTable;

/**
 * Something that has HTML classes for list table rows.
 *
 * @since [*next-version*]
 */
trait RowHtmlClassesAwareTrait
{
    /**
     * The table row HTML classes.
     *
     * @since [*next-version*]
     *
     * @var array
     */
    protected $rowHtmlClasses;

    /**
     * Gets the row HTML classes.
     *
     * @since [*next-version*]
     *
     * @return array
     */
    protected function _getRowHtmlClasses()
    {
        return $this->rowHtmlClasses;
    }

    /**
     * Sets the row HTML classes.
     *
     * @since [*next-version*]
     *
     * @param array $rowHtmlClasses The row HTML classes.
     *
     * @return $this
     */
    protected function _setRowHtmlClasses($rowHtmlClasses)
    {
        $this->rowHtmlClasses = $rowHtmlClasses;

        return $this;
    }

    /**
     * Adds a row HTML class.
     *
     * @since [*next-version*]
     *
     * @param string $rowHtmlClass The row HTML class to add.
     *
     * @return $this
     */
    protected function _addRowHtmlClass($rowHtmlClass)
    {
        array_push($this->rowHtmlClasses, $rowHtmlClass);

        return $this;
    }

    /**
     * Removes a row HTML class.
     *
     * @since [*next-version*]
     *
     * @param string $rowHtmlClass The row HTML class to remove.
     *
     * @return $this
     */
    protected function _removeRowHtmlClass($rowHtmlClass)
    {
        $index = $this->_indexOfRowHtmlClass($rowHtmlClass);

        if ($index) {
            array_splice($this->rowHtmlClasses, $index);
        }

        return $this;
    }

    /**
     * Gets the index of a row HTML class.
     *
     * @since [*next-version*]
     *
     * @param string $rowHtmlClass The row HTML class to search for.
     *
     * @return int
     */
    protected function _indexOfRowHtmlClass($rowHtmlClass)
    {
        return array_search($rowHtmlClass, $this->rowHtmlClasses);
    }
}
