<?php

namespace RebelCode\WordPress\Admin\ListTable;

use RebelCode\WordPress\Action\ActionInterface;
use RebelCode\WordPress\Action\ActionsAwareTrait;
use RebelCode\WordPress\Admin\ListTable\Column\ColumnInterface;
use RebelCode\WordPress\Admin\ListTable\Column\ColumnsAwareTrait;
use RebelCode\WordPress\Admin\ListTable\Row\RowInterface;
use RebelCode\WordPress\Html\HtmlClassesAwareTrait;
use RebelCode\WordPress\Pagination\PaginationAwareTrait;
use RebelCode\WordPress\SingularPluralLabelsAwareTrait;
use Traversable;

/**
 * Abstract functionality for a WordPress List Table.
 *
 * This abstract class introduces an alternative rendering method that uses rows and columns. Rows are created for each
 * item to be rendered, and are capable of rendering an item as a row. Columns define what is shown in the table's
 * header as well as control how data is rendered in corresponding cells.
 *
 * @see RowInterface
 * @see ColumnInterface
 * @since [*next-version*]
 */
abstract class AbstractListTable extends AbstractListTableWrapper
{
    use SingularPluralLabelsAwareTrait;
    use ActionsAwareTrait;
    use PaginationAwareTrait;
    use HtmlClassesAwareTrait;
    use ColumnsAwareTrait;
    use HiddenColumnsAwareTrait;
    use PrimaryColumnAwareTrait;

    /**
     * Gets the items that should be loaded into the native WordPress List Table.
     *
     * @since [*next-version*]
     *
     * @return array
     */
    abstract protected function _getItems();

    /**
     * Creates a row instance for the given item.
     *
     * @since [*next-version*]
     *
     * @param mixed $item The item.
     *
     * @return RowInterface
     */
    abstract protected function _createRow($item);

    /**
     * Renders the list table.
     *
     * @since [*next-version*]
     *
     * @return string The rendered list table.
     */
    protected function _render()
    {
        ob_start();

        $this->_prepare()->display();

        return ob_get_clean();
    }

    /**
     * Prepares the list table before rendering.
     *
     * @since [*next-version*]
     *
     * @return $this
     */
    protected function _prepare()
    {
        $this->_prepareItems()
            ->_prepareColumnHeaders();

        return $this;
    }

    /**
     * Prepares the items.
     *
     * This method SHOULD load the items into the $items property.
     *
     * @since [*next-version*]
     *
     * @return $this
     */
    protected function _prepareItems()
    {
        $this->items = $this->_getItems();

        return $this;
    }

    /**
     * Prepares the column headers.
     *
     * Loads the column header info into the native WordPress List Table property.
     *
     * @return $this
     */
    protected function _prepareColumnHeaders()
    {
        $this->_column_headers = $this->_getColumnHeaders();

        return $this;
    }

    /**
     * Retrieves the column headers.
     *
     * @since [*next-version*]
     *
     * @return array An array containing the column labels, hidden column IDs, sortable column IDs and primary column ID.
     */
    protected function _getColumnHeaders()
    {
        return array(
            $this->_getColumnLabels(),
            $this->_getHiddenColumns(),
            $this->_getSortableColumns(),
            $this->_determinePrimaryColumn(),
        );
    }

    /**
     * Retrieves the list of column labels.
     *
     * @since [*next-version*]
     *
     * @return string[] A list of string labels.
     */
    protected function _getColumnLabels()
    {
        return array_map(function ($column) {
            return $column->getLabel();
        }, $this->_getColumns());
    }

    /**
     * Retrieves the list of sortable column IDs.
     *
     * @since [*next-version*]
     *
     * @return string[] A list of string IDs.
     */
    protected function _getSortableColumns()
    {
        $sortable = array();

        foreach ($this->_getColumns() as $_colId => $_column) {
            if ($_column->isSortable()) {
                $sortable[$_colId] = array($_colId, false);
            }
        }

        return $sortable;
    }

    /**
     * Determines the primary column.
     *
     * If the primary column property is null, the first regular column is determined to be the primary.
     *
     * @since [*next-version*]
     *
     * @return int|string The primary column ID.
     */
    protected function _determinePrimaryColumn()
    {
        if (!is_null($primary = $this->_getPrimaryColumn())) {
            return $primary;
        }

        foreach ($this->_getColumns() as $_column) {
            if ($_column->getType() === ColumnInterface::TYPE_REGULAR) {
                return $_column->getId();
            }
        }

        return;
    }

    /**
     * Prepares the bulk actions.
     *
     * @since [*next-version*]
     *
     * @param ActionInterface[]|Traversable $actions A list of action instances.
     *
     * @return $this
     */
    protected function _prepareBulkActions(array $actions)
    {
        $bulkActions = array();

        foreach ($actions as $_action) {
            $bulkActions[$_action->getId()] = $_action->getLabel();
        }

        return $bulkActions;
    }

    /**
     * Renders a row.
     *
     * @since [*next-version*]
     *
     * @param mixed $item The Item to be rendered in the row.
     *
     * @return string The rendered row.
     */
    protected function _renderRow($item)
    {
        $row      = $this->_createRow($item);
        $rendered = $row->render($this);

        /*
        $classes  = $this->_attr('class', $this->_getItemRowHtmlClasses($item));
        $content  = $this->_renderRowCells($item);
        $rendered = sprintf('<tr %s>%s</tr>', $classes, $content);

        ++$this->_cIndex;
        */

        return $rendered;
    }

    /**
     * Renders the cells for a specific item row.
     *
     * @since [*next-version*]
     *
     * @param mixed $item The item being rendered.
     *
     * @return string The rendered HTML.
     */
    protected function _renderRowCells($item)
    {
        // No output needed. The rows and columns will handle cell rendering

        return '';
    }
}
