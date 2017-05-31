<?php

namespace RebelCode\WordPress;

/**
 * Something that has an ID.
 *
 * @since [*next-version*]
 */
trait HasIdTrait
{
    /**
     * The ID.
     *
     * @since [*next-version*]
     *
     * @var string
     */
    protected $id;

    /**
     * Retrieves the ID.
     *
     * @since [*next-version*]
     *
     * @return string
     */
    protected function _getId()
    {
        return $this->id;
    }

    /**
     * Sets the ID.
     *
     * @since [*next-version*]
     *
     * @param string $id The ID.
     *
     * @return $this
     */
    protected function _setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
