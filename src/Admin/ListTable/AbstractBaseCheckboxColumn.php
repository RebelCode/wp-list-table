<?php

namespace RebelCode\WordPress\Admin\ListTable;

/**
 * Description of AbstractCheckboxColumn.
 *
 * @since [*next-version*]
 */
abstract class AbstractBaseCheckboxColumn extends AbstractBaseColumn
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
    abstract protected function _getItemId(ListTableInterface $listTable, $item);

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    protected function _renderContent(ListTableInterface $listTable, $item)
    {
        $id = $this->_getItemId($listTable, $item);

        return sprintf('<input id="cb-select-%1$s" type="checkbox" name="item[]" value="%1$s" />', $id);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    protected function _render(ListTableInterface $listTable, $item)
    {
        return sprintf(
            '<th scope="row" %1$s>%2$s %3$s %4$s</th>',
            $this->_renderAttributes($listTable, $item),
            $this->_renderContent($listTable, $item),
            $this->_renderActions($listTable, $item),
            $this->_renderResponsiveToggleButton($listTable, $item)
        );
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    protected function _getHtmlClasses(ListTableInterface $listTable, $item)
    {
        return array('check-column');
    }
}
