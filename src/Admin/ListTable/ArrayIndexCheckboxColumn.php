<?php

namespace RebelCode\WordPress\Admin\ListTable;

/**
 * A column that displays a checkbox that uses an array index for determining the item ID.
 *
 * @since [*next-version*]
 */
class ArrayIndexCheckboxColumn extends AbstractBaseCheckboxColumn implements ColumnInterface
{
    /**
     * The array index of the ID.
     *
     * @since [*next-version*]
     *
     * @var string|int
     */
    protected $idIndex;

    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param string|int $idIndex The array index to use as the ID.
     */
    public function __construct($idIndex)
    {
        parent::__construct('cb', '<input type="checkbox" />', false, array());

        $this->setIdField($idIndex);
    }

    /**
     * Retrieves the array index for the ID.
     *
     * @since [*next-version*]
     *
     * @return string|int
     */
    public function getIdIndex()
    {
        return $this->idIndex;
    }

    /**
     * Sets the array index to use for the ID.
     *
     * @since [*next-version*]
     *
     * @param string|int $idIndex The array index to use for the ID.
     *
     * @return $this
     */
    public function setIdField($idIndex)
    {
        $this->idIndex = $idIndex;

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    protected function _getItemId(ListTableInterface $listTable, $item)
    {
        $key = $this->getIdIndex();

        return (is_array($item) && isset($item[$key]))
            ? $item[$key]
            : null;
    }
}
