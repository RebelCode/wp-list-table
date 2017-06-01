<?php

namespace RebelCode\WordPress\Admin\ListTable;

use Dhii\Data\GetCapableInterface;

/**
 * A column that renders data for an item that implements {@see Dhii\Data\GetCapableInterface}.
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
    protected function _renderContent(ListTableInterface $listTable, $item)
    {
        return ($item instanceof GetCapableInterface)
            ? (string) $item->get($this->getId())
            : null;
    }
}
