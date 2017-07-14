<?php

namespace RebelCode\WordPress\Pagination;

/**
 * Something that handles pagination for a display component.
 *
 * @since [*next-version*]
 */
interface PaginationHandlerInterface
{
    /**
     * Retrieves the total number of items.
     *
     * @since [*next-version*]
     *
     * @return int
     */
    public function getNumItems();

    /**
     * Retrieves the total number of pages.
     *
     * @since [*next-version*]
     *
     * @return int
     */
    public function getNumPages();

    /**
     * Retrieves the maximum number of items per page.
     *
     * @since [*next-version*]
     *
     * @return int
     */
    public function getItemsPerPage();

    /**
     * Retrieves the current page number.
     *
     * @since [*next-version*]
     *
     * @return int
     */
    public function getCurrentPage();
}
