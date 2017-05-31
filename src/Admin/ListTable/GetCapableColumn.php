<?php

namespace RebelCode\WordPress\Admin\ListTable;

/**
 * Description of GetCapableColumn.
 *
 * @since [*next-version*]
 */
class GetCapableColumn extends AbstractBaseColumn
{
    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function render($item)
    {
        return ($item instanceof GetCapableInterface)
            ? $item->get($this->getId())
            : null;
    }
}
