<?php

namespace RebelCode\WordPress;

use Dhii\Collection\CollectionInterface;

/**
 * Something that has a collection.
 *
 * @since [*next-version*]
 */
interface CollectionAwareInterface
{
    /**
     * Retrieves the collection.
     *
     * @since [*next-version*]
     *
     * @return CollectionInterface The collection instance.
     */
    public function getCollection();
}
