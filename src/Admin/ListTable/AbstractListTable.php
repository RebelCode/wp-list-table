<?php

namespace RebelCode\WordPress\Admin\ListTable;

use RebelCode\WordPress\Admin\ActionInterface;
use RebelCode\WordPress\Admin\HasActionsTrait;
use RebelCode\WordPress\HasHtmlClassesTrait;
use RebelCode\WordPress\HasSingularPluralLabelsTrait;
use RebelCode\WordPress\HasAjaxFlagTrait;
use RebelCode\WordPress\HasPaginationTrait;
use Traversable;

/**
 * Wraps around the vanilla WordPress List Table to make it extendable.
 *
 * @since [*next-version*]
 */
abstract class AbstractListTable extends AbstractListTableWrapper
{
    use HasSingularPluralLabelsTrait;
    use HasActionsTrait;
    use HasPaginationTrait;
    use HasHtmlClassesTrait;
    use HasRowHtmlClassesTrait;
    use HasColumnsTrait;
    use HasHiddenColumnsTrait;
    use HasAjaxFlagTrait;
    use HasPrimaryColumnTrait;

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
     * Gets the items that should be loaded into the native WordPress List Table.
     *
     * @since [*next-version*]
     *
     * @return array
     */
    abstract protected function _getItems();

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
            $this->_getPrimaryColumn(),
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

        foreach ($actions as $action) {
            $bulkActions[$action->getId()] = $action->getLabel();
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
        $classes  = $this->_attr('class', $this->_getItemRowHtmlClasses($item));
        $content  = $this->_renderRowCells($item);
        $rendered = sprintf('<tr %s>%s</tr>', $classes, $content);

        ++$this->_cIndex;

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
        $me = $this;

        return array_reduce($this->_getColumns(), function ($buffer, $column) use ($item, $me) {
            return $buffer . $me->_renderCell($item, $column);
        }, '');
    }

    /**
     * Renders a single cell.
     *
     * @since [*next-version*]
     *
     * @param mixed                    $item   The item being rendered in the current row.
     * @param ListTableColumnInterface $column The column of the cell being rendered.
     *
     * @return string The rendered cell.
     */
    protected function _renderCell($item, ColumnInterface $column)
    {
        return $column->render($this, $item);
    }

    /**
     * Renders the contents of a cell.
     *
     * @since [*next-version*]
     *
     * @param mixed           $id     The ID of the item.
     * @param mixed           $item   The item being rendered.
     * @param ColumnInterface $column The column to render.
     *
     * @return string The rendered HTML.
     */
    protected function _renderCellContent($item, ColumnInterface $column)
    {
        return $column->render($item);
    }

    /**
     * Renders the given list of actions as row actions.
     *
     * @since [*next-version*]
     *
     * @param ActionInterface[] $actions The list of actions.
     *
     * @return string The rendered HTML.
     */
    protected function _renderRowActions($actions)
    {
        $rowActions = $this->_prepareRowActions($actions);

        return $this->row_actions($rowActions);
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
    protected function _prepareRowActions($actions)
    {
        $rowActions = array();

        foreach ($actions as $action) {
            $rowActions[$action->getId()] = sprintf(
                '<a href="?action=%1$s">%2$s</a>',
                $action->getId(),
                $action->getLabel()
            );
        }

        return $rowActions;
    }

    /**
     * Gets the HTML classes for a given item's row.
     *
     * @since [*next-version*]
     *
     * @param mixed $item The item to be displayed.
     *
     * @return array An array of HTML classes.
     */
    protected function _getItemRowHtmlClasses($item)
    {
        return $this->_getRowHtmlClasses();
    }

    /**
     * Gets the HTML classes for a given item's cell.
     *
     * @since [*next-version*]
     *
     * @param mixed                    $item   The item to be displayed.
     * @param ListTableColumnInterface $column The column.
     *
     * @return array An array of HTML classes.
     */
    protected function _getItemCellHtmlClasses($item, ColumnInterface $column)
    {
        $columnId = $column->getId();

        $classes = array($columnId, sprintf('column-%s', $columnId));

        if ($columnId === $this->_getPrimaryColumn()) {
            $classes[] = 'column-primary';
        }

        if (in_array($columnId, $this->_getHiddenColumns())) {
            $classes[] = 'hidden';
        }

        if (count($this->_getRowActions($item, $column))) {
            $classes[] = 'has-row-actions';
        }

        return $classes;
    }

    /**
     * Retrieves the row actions for a specific item's cell.
     *
     * @since [*next-version*]
     *
     * @param mixed                    $item   The item to be rendered.
     * @param ListTableColumnInterface $column The column.
     *
     * @return ActionInterface[] A list of actions.
     */
    protected function _getItemCellRowActions($item, ColumnInterface $column)
    {
        return $column->getActions();
    }

    /**
     * Generates an HTML attribute.
     *
     * @param string      $attr  The attribute name.
     * @param string|aray $value The string value or an array of values to be space separated.
     *
     * @return string The generated HTML string.
     */
    protected function _attr($attr, $value)
    {
        $valueStr = is_array($value)
            ? implode(' ', $value)
            : strval($value);

        return sprintf('%1$s="%2$s"', $attr, esc_attr($valueStr));
    }
}
