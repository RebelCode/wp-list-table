<?php

namespace RebelCode\WordPress\Collection;

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
