<?php

namespace RebelCode\WordPress\Admin\ListTable\Column;

use Dhii\Util\CallbackAwareTrait;
use RebelCode\WordPress\Admin\ListTable\ListTableInterface;
use RebelCode\WordPress\Admin\ListTable\Row\RowInterface;

/**
 * A list table column that uses a callback function for rendering.
 *
 * @since [*next-version*]
 */
class CallbackColumn extends AbstractBaseColumn
{
    use CallbackAwareTrait;

    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param string            $id       The action ID.
     * @param string            $label    The action label.
     * @param bool              $sortable True to make the column sortable, false to make it non-sortable.
     * @param ActionInterface[] $actions  The action instances.
     * @param callable|null     $callback The callback render function.
     */
    public function __construct($id, $label, $sortable = false, $actions = array(), callable $callback = null)
    {
        parent::__construct($id, $label, $sortable, $actions);

        $this->_setCallback($callback);
    }

    /**
     * Retrieves the arguments to pass to the callback render function.
     *
     * @since [*next-version*]
     *
     * @param ListTableInterface $listTable The list table.
     * @param RowInterface       $row       The row being rendered.
     *
     * @return array An array of arguments to pass to the callback.
     */
    protected function _getCallbackArgs(ListTableInterface $listTable, RowInterface $row)
    {
        return array($listTable, $row);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    protected function _renderContent(ListTableInterface $listTable, RowInterface $row)
    {
        if (($callback = $this->_getCallback()) === null) {
            return '';
        }

        return (string) call_user_func_array($this->_getCallback(), $this->_getCallbackArgs($listTable, $row));
    }
}
