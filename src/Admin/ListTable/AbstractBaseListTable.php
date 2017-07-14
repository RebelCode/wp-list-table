<?php

namespace RebelCode\WordPress\Admin\ListTable;

/**
 * Base functionality for a WordPress list table.
 *
 * @since [*next-version*]
 */
abstract class AbstractBaseListTable extends AbstractListTable implements ListTableInterface
{
    /**
     * Default number of items per page.
     *
     * @since [*next-version*]
     */
    const DEFAULT_NUM_ITEMS_PER_PAGE = 20;

    /**
     * Default singular item label.
     *
     * @since [*next-version*]
     */
    const DEFAULT_SINGULAR_LABEL = 'Item';

    /**
     * Default plural item label.
     *
     * @since [*next-version*]
     */
    const DEFAULT_PLURAL_LABEL = 'Items';

    /**
     * Default table HTML classes.
     *
     * @since [*next-version*]
     */
    const DEFAULT_HTML_CLASSES = 'widefat fixed';

    /**
     * Parameterless constructor.
     *
     * @since [*next-version*]
     */
    public function __construct()
    {
        // \WP_List_Table constructor
        parent::__construct();

        $this->_setColumns(array())
             ->_setPrimaryColumn(null)
             ->_setHiddenColumns(array())
             ->_setNumItems(0)
             ->_setItemsPerPage(static::DEFAULT_NUM_ITEMS_PER_PAGE)
             ->_setCurrentPage(1)
             ->_setSingularLabel(static::DEFAULT_SINGULAR_LABEL)
             ->_setPluralLabel(static::DEFAULT_PLURAL_LABEL)
             ->_setHtmlClasses(array(static::DEFAULT_HTML_CLASSES))
             ->_setActions(array())
        ;
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getItems()
    {
        return $this->_getItems();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getColumns()
    {
        return $this->_getColumns();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getPrimaryColumn()
    {
        return $this->_determinePrimaryColumn();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getHiddenColumns()
    {
        return $this->_getHiddenColumns();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getItemsPerPage()
    {
        return $this->_getItemsPerPage();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getCurrentPage()
    {
        return $this->_getCurrentPage();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getNumItems()
    {
        return $this->_getNumItems();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getNumPages()
    {
        return $this->_getNumPages();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function render()
    {
        return $this->_render();
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function __toString()
    {
        return $this->_render();
    }
}
