<?php

namespace RebelCode\WordPress;

/**
 * Something that has singular and plural labels.
 *
 * @since [*next-version*]
 */
trait HasSingularPluralLabelsTrait
{
    /**
     * The singular label.
     *
     * @since [*next-version*]
     *
     * @var string
     */
    protected $singularLabel;

    /**
     * The plural label.
     *
     * @since [*next-version*]
     *
     * @var string
     */
    protected $pluralLabel;

    /**
     * Retrieves the singular label.
     *
     * @since [*next-version*]
     *
     * @return string
     */
    protected function _getSingularLabel()
    {
        return $this->singularLabel;
    }

    /**
     * Retrieves the plural label.
     *
     * @since [*next-version*]
     *
     * @return string
     */
    protected function _getPluralLabel()
    {
        return $this->pluralLabel;
    }

    /**
     * Sets the singular label.
     *
     * @since [*next-version*]
     *
     * @param string $singularLabel The singular label.
     *
     * @return $this
     */
    protected function _setSingularLabel($singularLabel)
    {
        $this->singularLabel = $singularLabel;

        return $this;
    }

    /**
     * Sets the plural label.
     *
     * @since [*next-version*]
     *
     * @param string $pluralLabel The plural label.
     *
     * @return $this
     */
    protected function _setPluralLabel($pluralLabel)
    {
        $this->pluralLabel = $pluralLabel;

        return $this;
    }
}
