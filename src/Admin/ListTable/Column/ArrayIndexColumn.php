<?php

namespace RebelCode\WordPress\Admin\ListTable\Column;

use RebelCode\WordPress\Admin\ListTable\ListTableInterface;
use RebelCode\WordPress\Admin\ListTable\Row\RowInterface;

/**
 * A column that displays the data for a specific index in an array item.
 *
 * @since [*next-version*]
 */
class ArrayIndexColumn extends AbstractBaseColumn
{
    /**
     * The array index to use for rendering.
     *
     * @since [*next-version*]
     *
     * @var int|string
     */
    protected $arrayIndex;

    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param string            $id         The action ID.
     * @param string            $label      The action label.
     * @param int|string        $arrayIndex The array index to use for rendering.
     * @param bool              $sortable   True to make the column sortable, false to make it non-sortable.
     * @param ActionInterface[] $actions    The action instances.
     */
    public function __construct($id, $label, $arrayIndex, $sortable = false, $actions = array())
    {
        parent::__construct($id, $label, $sortable, $actions);

        $this->setArrayIndex($arrayIndex);
    }

    /**
     * Retrieves the array index to use for rendering.
     *
     * @since [*next-version*]
     *
     * @return int|string
     */
    protected function getArrayIndex()
    {
        return $this->arrayIndex;
    }

    /**
     * Sets the array index to use for rendering.
     *
     * @since [*next-version*]
     *
     * @param mixed $arrayIndex
     *
     * @return ArrayIndexColumn
     */
    protected function setArrayIndex($arrayIndex)
    {
        $this->arrayIndex = $arrayIndex;

        return $this;
    }

    /**
     * Retrieves the data from an item based on a specific key.
     *
     * @since [*next-version*]
     *
     * @param string $key  The key.
     * @param array  $item The item, as an array of data.
     *
     * @return mixed The data, or null if no data was found for the given key.
     */
    protected function _getItemData($key, $item)
    {
        return (is_array($item) && isset($item[$key]))
            ? $item[$key]
            : null;
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    protected function _renderContent(ListTableInterface $listTable, RowInterface $row)
    {
        return (string) $this->_getItemData($this->getArrayIndex(), $row->getItem());
    }
}
