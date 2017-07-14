<?php

namespace RebelCode\WordPress\Admin\ListTable;

use Dhii\Util\CallbackAwareTrait;
use RebelCode\WordPress\Admin\ListTable\Row\Row;
use RebelCode\WordPress\Collection\CollectionAwareInterface;
use RebelCode\WordPress\Collection\CollectionAwareTrait;
use RebelCode\WordPress\Collection\CollectionInterface;

/**
 * A list table that displays items in a collection.
 *
 * @since [*next-version*]
 */
class CollectionListTable extends AbstractBaseListTable implements CollectionAwareInterface
{
    use CollectionAwareTrait;
    use CallbackAwareTrait;

    /**
     * The collection.
     *
     * @since [*next-version*]
     *
     * @var CollectionInterface
     */
    protected $collection;

    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param CollectionInterface $collection The collection of items.
     */
    public function __construct(
        CollectionInterface $collection,
        callable $idCallback,
        $columns,
        $numItems = null,
        $actions = array()
    ) {
        parent::__construct();

        $numItems = ($numItems === null)
            ? $collection->count()
            : $numItems;

        $this->_setCollection($collection)
             ->_setColumns($columns)
             ->_setNumItems($numItems)
             ->_setActions($actions)
             ->_setCallback($idCallback);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getCollection()
    {
        return $this->_getCollection();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    protected function _getItems()
    {
        return $this->_getCollection()->getItems();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    protected function _createRow($item)
    {
        $id = call_user_func_array($this->_getCallback(), array($item));

        new Row($id, $item);
    }
}
