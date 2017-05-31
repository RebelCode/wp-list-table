<?php

namespace RebelCode\WordPress\Admin\ListTable;

use RebelCode\WordPress\Admin\ActionInterface;

/**
 * Wraps around the vanilla WordPress List Table to make it extendable.
 *
 * @since [*next-version*]
 */
abstract class AbstractBaseListTable extends AbstractListTable implements ListTableInterface
{
    const DEFAULT_PAGE           = 1;
    const DEFAULT_ITEMS_PER_PAGE = 20;
    const DEFAULT_NUM_PAGES      = 1;

    /**
     * Parameterless constructor.
     *
     * @since [*next-version*]
     */
    public function __construct()
    {
        parent::__construct();

        $this
            ->_setSingularLabel(__('Item'))
            ->_setPluralLabel(__('Items'))
            ->_setActions(array())
            ->_setAjaxEnabled(true)
            ->_setColumns(array())
            ->_setHiddenColumns(array())
            ->_setPrimaryColumn(null)
            ->_setHtmlClasses(array('widefat', 'fixed'))
            ->_setRowHtmlClasses(array())
            ->_setCurrentPage(static::DEFAULT_PAGE)
            ->_setItemsPerPage(static::DEFAULT_ITEMS_PER_PAGE)
            ->_setTotalNumPages(static::DEFAULT_NUM_PAGES)
            ->_setTotalNumItems(0);
    }

    /**
     * Renders the list table.
     *
     * @since [*next-version*]
     *
     * @return string The rendered list table.
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
        return $this->render();
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
     * Retrieves the singular label.
     *
     * @since [*next-version*]
     *
     * @return string
     */
    public function getSingularLabel()
    {
        return $this->_getSingularLabel();
    }

    /**
     * Retrieves the plural label.
     *
     * @since [*next-version*]
     *
     * @return string
     */
    public function getPluralLabel()
    {
        return $this->_getPluralLabel();
    }

    /**
     * Sets the singular label.
     *
     * @since [*next-version*]
     *
     * @param string $singularLabel The singular label.
     *
     * @return $this
     */
    public function setSingularLabel($singularLabel)
    {
        $this->_setSingularLabel($singularLabel);

        return $this;
    }

    /**
     * Sets the plural label.
     *
     * @since [*next-version*]
     *
     * @param string $pluralLabel The plural label.
     *
     * @return $this
     */
    public function setPluralLabel($pluralLabel)
    {
        $this->_setPluralLabel($pluralLabel);

        return $this;
    }

    /**
     * Retrieves the actions.
     *
     * @since [*next-version*]
     *
     * @return ActionInterface[]
     */
    public function getActions()
    {
        return $this->_getActions();
    }

    /**
     * Sets the actions.
     *
     * @since [*next-version*]
     *
     * @param ActionInterface[] $actions An array of ActionInterface instances.
     *
     * @return $this
     */
    public function setActions(array $actions)
    {
        $this->_setActions($actions);

        return $this;
    }

    /**
     * Adds an action.
     *
     * @since [*next-version*]
     *
     * @param ActionInterface $action The action instance.
     *
     * @return $this
     */
    public function addAction(ActionInterface $action)
    {
        $this->_addAction($action);

        return $this;
    }

    /**
     * Adds multiple actions.
     *
     * @since [*next-version*]
     *
     * @param ActionInterface[] $actions The actions instances.
     *
     * @return $this
     */
    public function addManyActions(array $actions)
    {
        $this->_addManyActions($actions);

        return $this;
    }

    /**
     * Checks if this instance contains an action with the given ID.
     *
     * @since [*next-version*]
     *
     * @param string $actionId The action ID.
     *
     * @return bool True if the action ID was found, false if not.
     */
    public function hasAction($actionId)
    {
        return $this->_hasActionId($actionId);
    }

    /**
     * Gets the action with a specific ID.
     *
     * @since [*next-version*]
     *
     * @param string $id The action ID.
     *
     * @return ActionInterface|null The action instance or null if the action ID was not found.
     */
    public function getAction($id)
    {
        return $this->_getAction($id);
    }

    /**
     * Gets the total number of items.
     *
     * @since [*next-version*]
     *
     * @return int
     */
    public function getTotalNumItems()
    {
        return $this->_getTotalNumItems();
    }

    /**
     * Sets the total number of items.
     *
     * @since [*next-version*]
     *
     * @param int $totalNumItems The total number of items.
     *
     * @return $this
     */
    public function setTotalNumItems($totalNumItems)
    {
        $this->_setTotalNumItems($totalNumItems);

        return $this;
    }

    /**
     * Retrieves the number of items per page.
     *
     * @since [*next-version*]
     *
     * @return int
     */
    public function getItemsPerPage()
    {
        return $this->_getItemsPerPage();
    }

    /**
     * Sets the number of items per page.
     *
     * @since [*next-version*]
     *
     * @param int $itemsPerPage
     *
     * @return $this
     */
    public function setItemsPerPage($itemsPerPage)
    {
        $this->_setItemsPerPage($itemsPerPage);

        return $this;
    }

    /**
     * Retrieves the total number of pages.
     *
     * @since [*next-version*]
     *
     * @return int
     */
    public function getTotalNumPages()
    {
        return $this->_getTotalNumPages();
    }

    /**
     * Sets the total number of pages.
     *
     * @since [*next-version*]
     *
     * @param int $totalNumPages The total number of pages.
     *
     * @return $this
     */
    public function setTotalNumPages($totalNumPages)
    {
        $this->_setTotalNumPages($totalNumPages);

        return $this;
    }

    /**
     * Gets the current page number.
     *
     * @since [*next-version*]
     *
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->_getCurrentPage();
    }

    /**
     * Sets the current page number.
     *
     * @since [*next-version*]
     *
     * @param int $currentPage The current page number.
     *
     * @return $this
     */
    public function setCurrentPage($currentPage)
    {
        $this->_setCurrentPage($currentPage);

        return $this;
    }

    /**
     * Gets the HTML classes.
     *
     * @since [*next-version*]
     *
     * @return array
     */
    public function getHtmlClasses()
    {
        return $this->_getHtmlClasses();
    }

    /**
     * Sets the HTML classes.
     *
     * @since [*next-version*]
     *
     * @param array $htmlClasses The HTML classes.
     *
     * @return $this
     */
    public function setHtmlClasses($htmlClasses)
    {
        $this->_setHtmlClasses($htmlClasses);

        return $this;
    }

    /**
     * Adds an HTML class.
     *
     * @since [*next-version*]
     *
     * @param string $htmlClass The HTML class to add.
     *
     * @return $this
     */
    public function addHtmlClass($htmlClass)
    {
        $this->_addHtmlClass($htmlClass);

        return $this;
    }

    /**
     * Removes an HTML class.
     *
     * @since [*next-version*]
     *
     * @param string $htmlClass The HTML class to remove.
     *
     * @return $this
     */
    public function removeHtmlClass($htmlClass)
    {
        $this->_removeHtmlClass($htmlClass);

        return $this;
    }

    /**
     * Gets the row HTML classes.
     *
     * @since [*next-version*]
     *
     * @return array
     */
    public function getRowHtmlClasses()
    {
        return $this->_getRowHtmlClasses();
    }

    /**
     * Sets the row HTML classes.
     *
     * @since [*next-version*]
     *
     * @param array $rowHtmlClasses The row HTML classes.
     *
     * @return $this
     */
    public function setRowHtmlClasses($rowHtmlClasses)
    {
        $this->_setRowHtmlClasses($rowHtmlClasses);

        return $this;
    }

    /**
     * Adds a row HTML class.
     *
     * @since [*next-version*]
     *
     * @param string $rowHtmlClass The row HTML class to add.
     *
     * @return $this
     */
    public function addRowHtmlClass($rowHtmlClass)
    {
        $this->_addRowHtmlClass($rowHtmlClass);

        return $this;
    }

    /**
     * Removes a row HTML class.
     *
     * @since [*next-version*]
     *
     * @param string $rowHtmlClass The row HTML class to remove.
     *
     * @return $this
     */
    public function removeRowHtmlClass($rowHtmlClass)
    {
        $this->_removeRowHtmlClass($rowHtmlClass);

        return $this;
    }

    /**
     * Retrieves the columns.
     *
     * @since [*next-version*]
     *
     * @return ColumnInterface[] The columns.
     */
    public function getColumns()
    {
        return $this->_getColumns();
    }

    /**
     * Sets the columns.
     *
     * @since [*next-version*]
     *
     * @param ColumnInterface[] $columns An array of ColumnInterface instances.
     *
     * @return $this
     */
    public function setColumns(array $columns)
    {
        $this->_setColumns($columns);

        return $this;
    }

    /**
     * Adds a column.
     *
     * @since [*next-version*]
     *
     * @param ColumnInterface $column The column instance.
     *
     * @return $this
     */
    public function addColumn(ColumnInterface $column)
    {
        $this->_addColumn($column);

        return $this;
    }

    /**
     * Adds multiple columns.
     *
     * @since [*next-version*]
     *
     * @param ColumnInterface[] $columns The column instances.
     *
     * @return $this
     */
    public function addManyColumns(array $columns)
    {
        $this->_addManyColumns($columns);

        return $this;
    }

    /**
     * Checks whether this instance has a column with a specific ID.
     *
     * @since [*next-version*]
     *
     * @param string $columnId The column ID.
     *
     * @return bool True if the column ID was found, false if not.
     */
    public function hasColumn($columnId)
    {
        return $this->_hasColumnId($columnId);
    }

    /**
     * Retrieves the column instance with a specific ID.
     *
     * @since [*next-version*]
     *
     * @param string $columnId The ID of the column.
     *
     * @return ColumnInterface|null The column instance if found, null if not.
     */
    public function getColumn($columnId)
    {
        return $this->_getColumn($columnId);
    }

    /**
     * Removes the column with a specific ID.
     *
     * @since [*next-version*]
     *
     * @param string $columnId The ID of the column.
     *
     * @return $this
     */
    public function removeColumn($columnId)
    {
        $this->_removeColumnWithId($columnId);

        return $this;
    }

    /**
     * Retrieves the list of hidden column IDs.
     *
     * @since [*next-version*]
     *
     * @return string[]
     */
    public function getHiddenColumns()
    {
        return $this->_getHiddenColumns();
    }

    /**
     * Sets the hidden column IDs.
     *
     * @since [*next-version*]
     *
     * @param string[] $hiddenColumns An array of string IDs.
     *
     * @return $this
     */
    public function setHiddenColumns($hiddenColumns)
    {
        $this->_setHiddenColumns($hiddenColumns);

        return $this;
    }

    /**
     * Sets whether a column is hidden or not.
     *
     * @since [*next-version*]
     *
     * @param string $columnId The column ID.
     * @param bool   $hidden   True to hide the column, false to show.
     *
     * @return $this
     */
    public function setColumnHidden($columnId, $hidden = true)
    {
        $this->_setColumnHidden($columnId, $hidden);

        return $this;
    }

    /**
     * Adds a column ID to the list of hidden columns.
     *
     * @since [*next-version*]
     *
     * @param string $columnId The column ID.
     *
     * @return $this
     */
    public function addHiddenColumn($columnId)
    {
        $this->_addHiddenColumn($columnId);

        return $this;
    }

    /**
     * Removes the column ID from the list of hidden columns.
     *
     * @since [*next-version*]
     *
     * @param string $columnId The column ID.
     *
     * @return $this
     */
    public function removeHiddenColumn($columnId)
    {
        $this->_removeHiddenColumn($columnId);

        return $this;
    }

    /**
     * Retrieves whether AJAX is enabled.
     *
     * @since [*next-version*]
     *
     * @return bool
     */
    public function isAjaxEnabled()
    {
        return $this->_isAjaxEnabled();
    }

    /**
     * Sets whether AJAX is enabled.
     *
     * @since [*next-version*]
     *
     * @param bool $ajaxEnabled True to enable AJAX, false to disable it.
     *
     * @return $this
     */
    public function setAjaxEnabled($ajaxEnabled)
    {
        $this->_setAjaxEnabled($ajaxEnabled);

        return $this;
    }

    /**
     * Retrieves the primary column ID.
     *
     * @since [*next-version*]
     *
     * @return string
     */
    public function getPrimaryColumn()
    {
        return $this->_getPrimaryColumn();
    }

    /**
     * Sets the primary column ID.
     *
     * @since [*next-version*]
     *
     * @param string $primaryColumn The primary column ID.
     *
     * @return $this
     */
    public function setPrimaryColumn($primaryColumn)
    {
        $this->_setPrimaryColumn($primaryColumn);

        return $this;
    }
}
