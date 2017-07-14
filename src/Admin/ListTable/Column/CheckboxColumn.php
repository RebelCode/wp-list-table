<?php

namespace RebelCode\WordPress\Admin\ListTable\Column;

use RebelCode\WordPress\Admin\ListTable\ListTableInterface;
use RebelCode\WordPress\Admin\ListTable\Row\RowInterface;

/**
 * A list table column that renders the selection checkbox.
 *
 * @since [*next-version*]
 */
class CheckboxColumn extends AbstractBaseColumn
{
    /**
     * Constructor.
     *
     * @since [*next-version*]
     */
    public function __construct()
    {
        parent::__construct('cb', '<input type="checkbox" />', false, array());

        $this->_setType(static::TYPE_HEADER);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    protected function _renderContent(ListTableInterface $listTable, RowInterface $row)
    {
        return sprintf(
            '<input id="cb-select-%1$s" type="checkbox" name="item[]" value="%1$s" />',
            $row->getId()
        );
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    protected function _getHtmlClasses(ListTableInterface $listTable, $row)
    {
        return array('check-column');
    }
}
