<?php

namespace RebelCode\WordPress;

/**
 * Something that has HTML classes.
 *
 * @since [*next-version*]
 */
trait HtmlClassesAwareTrait
{
    /**
     * The HTML classes.
     *
     * @since [*next-version*]
     *
     * @var array
     */
    protected $htmlClasses;

    /**
     * Gets the HTML classes.
     *
     * @since [*next-version*]
     *
     * @return array
     */
    protected function _getHtmlClasses()
    {
        return $this->htmlClasses;
    }

    /**
     * Sets the HTML classes.
     *
     * @since [*next-version*]
     *
     * @param array $htmlClasses The HTML classes.
     *
     * @return $this
     */
    protected function _setHtmlClasses($htmlClasses)
    {
        $this->htmlClasses = $htmlClasses;

        return $this;
    }

    /**
     * Adds an HTML class.
     *
     * @since [*next-version*]
     *
     * @param string $htmlClass The HTML class to add.
     *
     * @return $this
     */
    protected function _addHtmlClass($htmlClass)
    {
        array_push($this->htmlClasses, $htmlClass);

        return $this;
    }

    /**
     * Removes an HTML class.
     *
     * @since [*next-version*]
     *
     * @param string $htmlClass The HTML class to remove.
     *
     * @return $this
     */
    protected function _removeHtmlClass($htmlClass)
    {
        $index = $this->_indexOfHtmlClass($htmlClass);

        if ($index) {
            array_splice($this->htmlClasses, $index);
        }

        return $this;
    }

    /**
     * Gets the index of an HTML class.
     *
     * @since [*next-version*]
     *
     * @param string $htmlClass The HTML class to search for.
     *
     * @return int
     */
    protected function _indexOfHtmlClass($htmlClass)
    {
        return array_search($htmlClass, $this->htmlClasses);
    }
}
