<?php

namespace RebelCode\WordPress\Admin\ListTable;

/**
 * A column that displays the data for a specific index in an array item.
 *
 * @since [*next-version*]
 */
class ArrayIndexColumn extends AbstractBaseColumn
{
    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    protected function _renderContent(ListTableInterface $listTable, $item)
    {
        return (string) $this->_getItemData($this->_getId(), $item);
    }

    /**
     * Retrieves the data from an item based on a specific key.
     *
     * @since [*next-version*]
     *
     * @param string $key  The key.
     * @param array  $item The item, as an array of data.
     *
     * @return mixed The data, or null if no data was found for the given key.
     */
    protected function _getItemData($key, $item)
    {
        return (is_array($item) && isset($item[$key]))
            ? $item[$key]
            : null;
    }
}
