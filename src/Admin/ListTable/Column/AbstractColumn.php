<?php

namespace RebelCode\WordPress\Admin\ListTable\Column;

use Dhii\Util\String\StringableInterface;
use RebelCode\WordPress\Action\ActionsAwareTrait;
use RebelCode\WordPress\Admin\ListTable\ListTableInterface;
use RebelCode\WordPress\Admin\ListTable\Row\RowInterface;
use RebelCode\WordPress\Html\HtmlRenderCapableTrait;
use RebelCode\WordPress\IdAwareTrait;
use RebelCode\WordPress\LabelAwareTrait;

/**
 * Basic functionality for a column.
 *
 * @since [*next-version*]
 */
abstract class AbstractColumn
{
    use ActionsAwareTrait;
    use IdAwareTrait;
    use LabelAwareTrait;
    use HtmlRenderCapableTrait;

    /**
     * HTML tag for header column cells.
     *
     * @since [*next-version*]
     */
    const HTML_TAG_HEADER = 'th';

    /**
     * HTML tag for regular column cells.
     *
     * @since [*next-version*]
     */
    const HTML_TAG_REGULAR = 'td';

    /**
     * The column type.
     *
     * @since [*next-version*]
     *
     * @var int
     */
    protected $type;

    /**
     * Sortable flag.
     *
     * @since [*next-version*]
     *
     * @var bool
     */
    protected $sortable;

    /**
     * Retrieves whether the column is sortable or not.
     *
     * @since [*next-version*]
     *
     * @return bool True if sortable, false if not.
     */
    protected function _isSortable()
    {
        return $this->sortable;
    }

    /**
     * Sets whether the column is sortable.
     *
     * @since [*next-version*]
     *
     * @param bool $sortable True if sortable, false if not.
     *
     * @return $this
     */
    protected function _setSortable($sortable)
    {
        $this->sortable = $sortable;

        return $this;
    }

    /**
     * Retrieves the column type.
     *
     * @since [*next-version*]
     *
     * @return int
     */
    protected function _getType()
    {
        return $this->type;
    }

    /**
     * Sets the column type.
     *
     * @since [*next-version*]
     *
     * @param int $type The column type.
     *
     * @return $this
     */
    protected function _setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Retrieves the content for a specific item.
     *
     * @since [*next-version*]
     *
     * @param ListTableInterface $listTable The list table in which the column cell is being rendered.
     * @param RowInterface       $row       The row being rendered.
     *
     * @return string
     */
    protected function _render(ListTableInterface $listTable, RowInterface $row)
    {
        return $this->_tag(
            $this->_getHtmlTag($listTable, $row),
            $this->_getHtmlAttributes($listTable, $row),
            array(
                $this->_renderContent($listTable, $row),
                $this->_renderActions($listTable, $row),
                $this->_renderResponsiveToggleButton($listTable, $row),
            )
        );
    }

    /**
     * Retrieves the HTML tag to use for a particular cell.
     *
     * @since [*next-version*]
     *
     * @param ListTableInterface $listTable The list table.
     * @param RowInterface       $row       The row being rendered.
     *
     * @return string
     */
    protected function _getHtmlTag(ListTableInterface $listTable, RowInterface $row)
    {
        return ($this->_getType() === ColumnInterface::TYPE_HEADER)
            ? static::HTML_TAG_HEADER
            : static::HTML_TAG_REGULAR;
    }

    /**
     * Retrieves the HTML attributes for a particular cell.
     *
     * @since [*next-version*]
     *
     * @param ListTableInterface $listTable The list table instance.
     * @param RowInterface       $row       The row being rendered.
     *
     * @return string[]
     */
    protected function _getHtmlAttributes(ListTableInterface $listTable, RowInterface $row)
    {
        return array(
            'class'        => $this->_getHtmlClasses($listTable, $row),
            'data-colname' => $this->_getLabel(),
        );
    }

    /**
     * Retrieves the HTML classes to use for a particular cell.
     *
     * @since [*next-version*]
     *
     * @param ListTableInterface $listTable The list table instance.
     * @param RowInterface       $row       The row being rendered.
     *
     * @return string[]
     */
    protected function _getHtmlClasses(ListTableInterface $listTable, RowInterface $row)
    {
        $columnId = $this->getId();
        $classes  = array(
            $columnId,
            sprintf('column-%s', $columnId),
        );

        if ($columnId === $listTable->getPrimaryColumn()) {
            $classes[] = 'column-primary';
        }

        if (in_array($columnId, $listTable->getHiddenColumns())) {
            $classes[] = 'hidden';
        }

        if (count($this->getActions())) {
            $classes[] = 'has-row-actions';
        }

        return $classes;
    }

    /**
     * Renders the given list of actions as row actions.
     *
     * @since [*next-version*]
     *
     * @param ListTableInterface $listTable The list table instance.
     * @param RowInterface       $row       The row being rendered.
     *
     * @return string The rendered HTML.
     */
    protected function _renderActions(ListTableInterface $listTable, RowInterface $row)
    {
        $rowActions = array();

        foreach ($this->_getActions() as $_action) {
            $rowActions[$_action->getId()] = $this->_tag(
                'a',
                array(
                    'href' => sprintf(
                        '?item=%1$s&action=%2$s',
                        $row->getId(),
                        $_action->getId()
                    ),
                ),
                $_action->getLabel()
            );
        }

        return $listTable->row_actions($rowActions);
    }

    /**
     * Renders the responsive view toggle button.
     *
     * @since [*next-version*]
     *
     * @param ListTableInterface $listTable The list table.
     * @param RowInterface       $row       The row being rendered.
     *
     * @return string|StringableInterface
     */
    protected function _renderResponsiveToggleButton(ListTableInterface $listTable, RowInterface $row)
    {
        return $this->_tag('button', array('type' => 'button', 'class' => 'toggle-row'),
            $this->_tag('span', array('class' => 'screen-reader-text'), \__('Show more details'))
        );
    }

    /**
     * Renders the column cell contents.
     *
     * @since [*next-version*]
     *
     * @param ListTableInterface $listTable The list table.
     * @param RowInterface       $row       The row being rendered.
     *
     * @return string|StringableInterface
     */
    abstract protected function _renderContent(ListTableInterface $listTable, RowInterface $row);
}
