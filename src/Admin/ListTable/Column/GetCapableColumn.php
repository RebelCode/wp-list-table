<?php

namespace RebelCode\WordPress\Admin\ListTable\Column;

use Dhii\Data\GetCapableInterface;
use RebelCode\WordPress\Admin\ListTable\ListTableInterface;
use RebelCode\WordPress\Admin\ListTable\Row\RowInterface;

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
    protected function _renderContent(ListTableInterface $listTable, RowInterface $row)
    {
        $item = $row->getItem();

        return ($item instanceof GetCapableInterface)
            ? (string) $item->get($this->getId())
            : null;
    }
}
