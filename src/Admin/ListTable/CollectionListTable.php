<?php

namespace RebelCode\WordPress\Admin\ListTable;

use RebelCode\WordPress\CollectionAwareInterface;
use RebelCode\WordPress\CollectionInterface;
use RebelCode\WordPress\HasCollectionTrait;

/**
 * A list table that displays items in a collection.
 *
 * @since [*next-version*]
 */
class CollectionListTable extends AbstractBaseListTable implements CollectionAwareInterface
{
    use HasCollectionTrait;

    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param CollectionInterface $collection The collection of items.
     */
    public function __construct(CollectionInterface $collection)
    {
        parent::__construct();

        $this->_setCollection($collection);
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
    public function getCollection()
    {
        return $this->_getCollection();
    }
}
