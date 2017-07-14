<?php

namespace RebelCode\WordPress\Admin\ListTable\Column;

use RebelCode\WordPress\Admin\ListTable\ListTableInterface;

/**
 * Description of AbstractCheckboxColumn.
 *
 * @since [*next-version*]
 */
class CheckboxColumn extends AbstractColumn
{
    /**
     * Gets the ID of an item.
     *
     * @since [*next-version*]
     *
     * @param ListTableInterface $listTable The list table.
     * @param mixed              $item      The item.
     *
     * @return string|int
     */
    abstract protected function _getRowActionItemId(ListTableInterface $listTable, $item);

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    protected function _renderContent(ListTableInterface $listTable, $item)
    {
        $id = $this->_getRowActionItemId($listTable, $item);

        return sprintf('<input id="cb-select-%1$s" type="checkbox" name="item[]" value="%1$s" />', $id);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    protected function _getHtmlClasses(ListTableInterface $listTable, $row)
    {
        return ['check-column'];
    }
}
