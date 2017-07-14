<?php

namespace RebelCode\WordPress\Pagination;

/**
 * Something that has pagination.
 *
 * @since [*next-version*]
 */
trait PaginationAwareTrait
{
    /**
     * The number of items per page.
     *
     * @since [*next-version*]
     *
     * @var int
     */
    protected $itemsPerPage;

    /**
     * The total number of items.
     *
     * @since [*next-version*]
     *
     * @var int
     */
    protected $numItems;

    /**
     * The current page number.
     *
     * @since [*next-version*]
     *
     * @var int
     */
    protected $currentPage;

    /**
     * Gets the total number of items.
     *
     * @since [*next-version*]
     *
     * @return int
     */
    protected function _getNumItems()
    {
        return $this->numItems;
    }

    /**
     * Sets the total number of items.
     *
     * @since [*next-version*]
     *
     * @param int $numItems The total number of items.
     *
     * @return $this
     */
    protected function _setNumItems($numItems)
    {
        $this->numItems = $numItems;

        return $this;
    }

    /**
     * Retrieves the number of items per page.
     *
     * @since [*next-version*]
     *
     * @return int
     */
    protected function _getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * Sets the number of items per page.
     *
     * @since [*next-version*]
     *
     * @param int $itemsPerPage
     *
     * @return $this
     */
    protected function _setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;

        return $this;
    }

    /**
     * Retrieves the total number of pages.
     *
     * @since [*next-version*]
     *
     * @return int
     */
    protected function _getNumPages()
    {
        return (int) ceil($this->_getNumItems() / $this->_getItemsPerPage());
    }

    /**
     * Gets the current page number.
     *
     * @since [*next-version*]
     *
     * @return int
     */
    protected function _getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * Sets the current page number.
     *
     * @since [*next-version*]
     *
     * @param int $currentPage The current page number.
     *
     * @return $this
     */
    protected function _setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;

        return $this;
    }
}
