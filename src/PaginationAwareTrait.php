<?php

namespace RebelCode\WordPress;

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
    protected $totalNumItems;

    /**
     * The total number of pages.
     *
     * @since [*next-version*]
     *
     * @var int
     */
    protected $totalNumPages;

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
    protected function _getTotalNumItems()
    {
        return $this->totalNumItems;
    }

    /**
     * Sets the total number of items.
     *
     * @since [*next-version*]
     *
     * @param int $totalNumItems The total number of items.
     *
     * @return $this
     */
    protected function _setTotalNumItems($totalNumItems)
    {
        $this->totalNumItems = $totalNumItems;

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
    protected function _getTotalNumPages()
    {
        return $this->totalNumPages;
    }

    /**
     * Sets the total number of pages.
     *
     * @since [*next-version*]
     *
     * @param int $totalNumPages The total number of pages.
     *
     * @return $this
     */
    protected function _setTotalNumPages($totalNumPages)
    {
        $this->totalNumPages = $totalNumPages;

        return $this;
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
