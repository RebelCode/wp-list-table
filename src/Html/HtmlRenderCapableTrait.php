<?php

namespace RebelCode\WordPress\Html;

/**
 * Something that is capable of rendering HTML.
 *
 * @since [*next-version*]
 */
trait HtmlRenderCapableTrait
{
    protected function _tag($tag, $attrs = array(), $content = '')
    {
        array_walk($attrs, function (&$val, $key) {
            $val = $this->_attr($key, $val);
        });

        $attrs   = implode(' ', $attrs);
        $content = is_array($content)
            ? implode(' ', $content)
            : $content;

        return sprintf('<%1$s %2$s>%3$s</%1$s>', $tag, $attrs, $content);
    }

    /**
     * Generates an HTML attribute.
     *
     * @param string       $attr  The attribute name.
     * @param string|array $value The string value or an array of values to be space separated.
     *
     * @return string The generated HTML string.
     */
    protected function _attr($attr, $value)
    {
        $valueStr = is_array($value)
            ? implode(' ', $value)
            : strval($value);

        return sprintf('%1$s="%2$s"', $attr, esc_attr($valueStr));
    }
}
