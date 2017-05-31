<?php

namespace RebelCode\WordPress;

use Dhii\Collection\CollectionInterface;

/**
 * Something that has a collection.
 *
 * @since [*next-version*]
 */
trait HasCollectionTrait
{
    /**
     * The item collection.
     *
     * @since [*next-version*]
     *
     * @var CollectionInterface
     */
    protected $collection;

    /**
     * Retrieves the item collection.
     *
     * @since [*next-version*]
     *
     * @return CollectionInterface
     */
    protected function _getCollection()
    {
        return $this->collection;
    }

    /**
     * Sets the item collection.
     *
     * @since [*next-version*]
     *
     * @param CollectionInterface $collection The item collection.
     *
     * @return $this
     */
    protected function _setCollection(CollectionInterface $collection)
    {
        $this->collection = $collection;

        return $this;
    }
}
