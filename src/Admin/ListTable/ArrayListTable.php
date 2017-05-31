<?php

namespace RebelCode\WordPress\Admin\ListTable;

/**
 * A List Table that accepts an array of items, each being an array of data.
 *
 * @since [*next-version*]
 */
class ArrayListTable extends AbstractBaseListTable
{
    /**
     * The array of items.
     *
     * @since [*next-version*]
     *
     * @var array
     */
    protected $itemsArray;

    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param array $items The items.
     */
    public function __construct(array $items)
    {
        parent::__construct();

        $this->itemsArray = $items;
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    protected function _getItems()
    {
        return $this->itemsArray;
    }
}
