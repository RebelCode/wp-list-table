<?php

namespace RebelCode\WordPress\Admin\ListTable;

/**
 * Something that has a primary column indicator.
 *
 * @since [*next-version*]
 */
trait HasPrimaryColumnTrait
{
    /**
     * The primary column ID.
     *
     * @since [*next-version*]
     *
     * @var string
     */
    protected $primaryColumn;

    /**
     * Retrieves the primary column ID.
     *
     * @since [*next-version*]
     *
     * @return string
     */
    protected function _getPrimaryColumn()
    {
        return $this->primaryColumn;
    }

    /**
     * Sets the primary column ID.
     *
     * @since [*next-version*]
     *
     * @param string $primaryColumn The primary column ID.
     *
     * @return $this
     */
    protected function _setPrimaryColumn($primaryColumn)
    {
        $this->primaryColumn = $primaryColumn;

        return $this;
    }
}
