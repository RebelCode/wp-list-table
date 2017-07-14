<?php

namespace RebelCode\WordPress\Pagination;

/**
 * Something that is aware of a pagination handler.
 *
 * @since [*next-version*]
 */
trait PaginationHandlerAwareTrait
{
    /**
     * The pagination handler instance.
     *
     * @since [*next-version*]
     *
     * @var PaginationHandlerInterface
     */
    protected $paginationHandler;

    /**
     * Retrieves the pagination handler instance.
     *
     * @since [*next-version*]
     *
     * @return PaginationHandlerInterface
     */
    protected function _getPaginationHandler()
    {
        return $this->paginationHandler;
    }

    /**
     * Sets the pagination handler instance.
     *
     * @since [*next-version*]
     *
     * @param PaginationHandlerInterface|null $paginationHandler
     *
     * @return $this
     */
    protected function _setPaginationHandler(PaginationHandlerInterface $paginationHandler = null)
    {
        $this->paginationHandler = $paginationHandler;

        return $this;
    }
}
