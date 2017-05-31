<?php

namespace RebelCode\WordPress;

/**
 * Something that has an AJAX enable/disable flag.
 *
 * @since [*next-version*]
 */
trait HasAjaxFlagTrait
{
    /**
     * AJAX enabled flag.
     *
     * @since [*next-version*]
     *
     * @var bool
     */
    protected $ajaxEnabled;

    /**
     * Retrieves whether AJAX is enabled.
     *
     * @since [*next-version*]
     *
     * @return bool
     */
    protected function _isAjaxEnabled()
    {
        return $this->ajaxEnabled;
    }

    /**
     * Sets whether AJAX is enabled.
     *
     * @since [*next-version*]
     *
     * @param bool $ajaxEnabled True to enable AJAX, false to disable it.
     *
     * @return $this
     */
    protected function _setAjaxEnabled($ajaxEnabled)
    {
        $this->ajaxEnabled = $ajaxEnabled;

        return $this;
    }
}
