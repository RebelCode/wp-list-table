<?php

namespace RebelCode\WordPress\Admin\ListTable;

use RebelCode\WordPress\Action\ActionInterface;
use RebelCode\WordPress\Admin\ListTable\Column\ColumnInterface;
use RebelCode\WordPress\Admin\ListTable\Row\Row;
use Traversable;

/**
 * A simple list table implementation that shows a list of items.
 *
 * This implementation works with any keyed iterable list of items, including native arrays. The item row IDs are
 * determined by the item's key in the array by default. This can be changed by specifying the array key of an item's
 * ID during construction.
 *
 * @since [*next-version*]
 */
class ListTable extends AbstractBaseListTable implements ListTableInterface
{
    /**
     * The items.
     *
     * @since [*next-version*]
     *
     * @var array
     */
    protected $_items;

    /**
     * The key of the item's ID.
     *
     * @since [*next-version*]
     *
     * @var string
     */
    protected $itemIdKey;

    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param array|Traversable             $items     The items to show in the table.
     * @param ColumnInterface[]|Traversable $columns   The columns for this table.
     * @param ActionInterface[]|Traversable $actions   The bulk actions.
     * @param int|null                      $numItems  The total number of relevant items, not necessarily all shown
     *                                                 in the table. If null, the length of $items is used.
     * @param int|string|null               $itemIdKey The item ID array key.
     */
    public function __construct($items, $columns, $numItems = null, $actions = array(), $itemIdKey = null)
    {
        parent::__construct();

        $numItems = ($numItems === null)
            ? count($items)
            : $numItems;

        $this->_setItems($items)
            ->_setColumns($columns)
            ->_setNumItems($numItems)
            ->_setActions($actions)
            ->_setItemIdKey($itemIdKey);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    protected function _getItems()
    {
        return $this->_items;
    }

    /**
     * Sets the items to be shown in the table.
     *
     * @since [*next-version*]
     *
     * @param array|Traversable $items The items to show in the table.
     *
     * @return $this
     */
    protected function _setItems($items)
    {
        $this->_items = $items;

        return $this;
    }

    /**
     * Retrieves the item ID array key.
     *
     * @since [*next-version*]
     *
     * @return string
     */
    protected function _getItemIdKey()
    {
        return $this->itemIdKey;
    }

    /**
     * Sets the item ID array key.
     *
     * @since [*next-version*]
     *
     * @param string $itemIdKey The item ID array key.
     *
     * @return $this
     */
    protected function _setItemIdKey($itemIdKey)
    {
        $this->itemIdKey = $itemIdKey;

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    protected function _createRow($item)
    {
        $id = is_null($key = $this->_getItemIdKey())
            ? array_search($item, $this->_getItems())
            : $item[$key];

        return new Row($id, $item);
    }
}
