<?php

namespace RebelCode\WordPress;

use Dhii\Collection\CollectionInterface;

/**
 * Something that has a collection.
 *
 * @since [*next-version*]
 */
trait CollectionAwareTrait
{
    /**
     * The item collection.
     *
     * @since [*next-version*]
     *
     * @var \RebelCode\WordPress\Collection\CollectionInterface
     */
    protected $collection;

    /**
     * Retrieves the item collection.
     *
     * @since [*next-version*]
     *
     * @return \RebelCode\WordPress\Collection\CollectionInterface
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
     * @param \RebelCode\WordPress\Collection\CollectionInterface $collection The item collection.
     *
     * @return $this
     */
    protected function _setCollection(CollectionInterface $collection)
    {
        $this->collection = $collection;

        return $this;
    }
}
