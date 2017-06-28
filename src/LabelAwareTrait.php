<?php

namespace RebelCode\WordPress;

/**
 * Something that has a label.
 *
 * @since [*next-version*]
 */
trait LabelAwareTrait
{
    /**
     * The label.
     *
     * @since [*next-version*]
     *
     * @var string
     */
    protected $label;

    /**
     * Retrieves the label.
     *
     * @since [*next-version*]
     *
     * @return string
     */
    protected function _getLabel()
    {
        return $this->label;
    }

    /**
     * Sets the label.
     *
     * @since [*next-version*]
     *
     * @param string $label The label.
     *
     * @return $this
     */
    protected function _setLabel($label)
    {
        $this->label = $label;

        return $this;
    }
}
