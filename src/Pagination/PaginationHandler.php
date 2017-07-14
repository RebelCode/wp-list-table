<?php

namespace RebelCode\WordPress\Pagination;

/**
 * A simple implementation for a pagination handler.
 *
 * @since [*next-version*]
 */
class PaginationHandler extends AbstractPaginationHandler implements PaginationHandlerInterface
{
    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param int $numItems     The total number of items.
     * @param int $itemsPerPage The maximum number of items per page.
     * @param int $currentPage  The current page number, 1-based.
     */
    public function __construct($numItems, $itemsPerPage, $currentPage = 1)
    {
        $this->_setNumItems($numItems)
            ->_setItemsPerPage($itemsPerPage)
            ->_setCurrentPage($currentPage);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getNumItems()
    {
        return $this->_getNumItems();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getNumPages()
    {
        return $this->_getNumPages();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getItemsPerPage()
    {
        return $this->_getItemsPerPage();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getCurrentPage()
    {
        return $this->_getCurrentPage();
    }
}
