<?php

namespace RebelCode\WordPress\Admin\ListTable;

use RebelCode\WordPress\Admin\ListTable\Column\ColumnInterface;

/**
 * Wraps the native WordPress List Table for extendability.
 *
 * The native WordPress List Table is intended to be extended for narrow purposes.
 * This involves overriding methods such as `get_columns()` to return an associative array of column information.
 *
 * This class proxies these such methods to other abstract methods so that further levels of abstraction may
 * provide more functionality.
 *
 * @since [*next-version*]
 */
abstract class AbstractListTableWrapper extends \WP_List_Table
{
    /**
     * {@inheritdoc}
     *
     * @deprecated
     */
    public function get_columns()
    {
        return $this->_getColumns();
    }

    /**
     * {@inheritdoc}
     *
     * @deprecated
     */
    public function get_table_classes()
    {
        return $this->_getHtmlClasses();
    }

    /**
     * {@inheritdoc}
     *
     * @deprecated
     */
    public function get_bulk_actions()
    {
        return $this->_prepareBulkActions($this->_getActions());
    }

    /**
     * {@inheritdoc}
     *
     * @deprecated
     */
    public function prepare_items()
    {
        return $this->_prepare();
    }

    /**
     * {@inheritdoc}
     *
     * @deprecated
     */
    public function single_row($item)
    {
        echo $this->_renderRow($item);
    }

    /**
     * {@inheritdoc}
     *
     * @deprecated
     */
    public function single_row_columns($item)
    {
        echo $this->_renderRowCells($item);
    }

    /**
     * {@inheritdoc}
     *
     * @deprecated
     */
    public function get_pagenum()
    {
        return $this->_getCurrentPage();
    }

    /**
     * {@inheritdoc}
     *
     * @deprecated
     */
    public function get_items_per_page($option, $default = 20)
    {
        return $this->_getItemsPerPage();
    }

    /**
     * {@inheritdoc}
     *
     * @deprecated
     */
    public function get_total_items()
    {
        return $this->_getNumItems();
    }

    /**
     * {@inheritdoc}
     *
     * @deprecated
     */
    protected function set_pagination_args($args)
    {
        parent::set_pagination_args(array(
            'total_items' => $this->_getNumItems(),
            'total_pages' => $this->_getNumPages(),
            'per_page'    => $this->_getItemsPerPage(),
        ));
    }

    /**
     * Retrieves the columns.
     *
     * @since [*next-version*]
     *
     * @return ColumnInterface[] The columns.
     */
    abstract protected function _getColumns();

    /**
     * Gets the HTML classes.
     *
     * @since [*next-version*]
     *
     * @return array
     */
    abstract protected function _getHtmlClasses();

    /**
     * Retrieves the actions.
     *
     * @since [*next-version*]
     *
     * @return ActionInterface[]
     */
    abstract protected function _getActions();

    /**
     * Prepares the bulk actions for WordPress.
     *
     * @since [*next-version*]
     *
     * @param ActionInterface[]|Traversable $actions A list of action instances.
     *
     * @return array An array of action ID to action label pairs.
     */
    abstract protected function _prepareBulkActions(array $actions);

    /**
     * Prepares the list table before rendering.
     *
     * This method SHOULD make sure that the $items and $_column_headers properties are set.
     *
     * @since [*next-version*]
     *
     * @return $this
     */
    abstract protected function _prepare();

    /**
     * Renders a row.
     *
     * @since [*next-version*]
     *
     * @param mixed $item The Item to be rendered in the row.
     *
     * @return string The rendered row.
     */
    abstract protected function _renderRow($item);

    /**
     * Renders the cells for a specific item row.
     *
     * @since [*next-version*]
     *
     * @param mixed $item The item being rendered.
     *
     * @return string The rendered HTML.
     */
    abstract protected function _renderRowCells($item);

    /**
     * Gets the total number of items.
     *
     * @since [*next-version*]
     *
     * @return int
     */
    abstract protected function _getNumItems();

    /**
     * Retrieves the number of items per page.
     *
     * @since [*next-version*]
     *
     * @return int
     */
    abstract protected function _getItemsPerPage();

    /**
     * Retrieves the total number of pages.
     *
     * @since [*next-version*]
     *
     * @return int
     */
    abstract protected function _getNumPages();

    /**
     * Gets the current page number.
     *
     * @since [*next-version*]
     *
     * @return int
     */
    abstract protected function _getCurrentPage();
}
