<?php

namespace RebelCode\WordPress\Admin\ListTable;

use Dhii\Util\String\StringableInterface;
use RebelCode\WordPress\Action\ActionInterface;
use RebelCode\WordPress\Action\ActionsAwareTrait;
use RebelCode\WordPress\IdAwareTrait;
use RebelCode\WordPress\LabelAwareTrait;
use Traversable;

/**
 * Basic functionality for a column.
 *
 * @since [*next-version*]
 */
abstract class AbstractColumn
{
    use RebelCode\WordPress\Action\ActionsAwareTrait;
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

     * Retrieves the content for a specific item.
     *
     * @since [*next-version*]
     *
     * @param ListTableInterface $listTable The list table in which the column cell is being rendered.
     * @param mixed              $item      The item being rendered.
     *
     * @return StringableInterface|string
     */
    protected function _render(ListTableInterface $listTable, $item)
    {
        return sprintf(
            '%2$s %3$s %4$s',
            $this->_renderContent($listTable, $item),
            $this->_renderActions($listTable, $item),
            $this->_renderResponsiveToggleButton($listTable, $item)
        );
    }

    /**
     * Prepares the actions.
     *
     * @since [*next-version*]
     *
     * @param ActionInterface[]|Traversable $actions A list of action instances.
     *
     * @return string[]
     */
    protected function _prepareActions($actions)
    {
        $result = array();

        foreach ($actions as $action) {
            $result[$action->getId()] = sprintf(
                '<a href="?action=%1$s">%2$s</a>',
                $action->getId(),
                $action->getLabel()
            );
        }

        return $result;
    }

    /**
     * Renders the given list of actions as row actions.
     *
     * @since [*next-version*]
     *
     * @param ListTableInterface $listTable The list table instance.
     * @param mixed              $item      The item.
     *
     * @return string The rendered HTML.
     */
    protected function _renderActions(ListTableInterface $listTable, $item)
    {
        $rowActions = $this->_prepareActions($this->_getActions());

        return $listTable->row_actions($rowActions);
    }

    /**
     * Renders the responsive view toggle button.
     *
     * @since [*next-version*]
     *
     * @param ListTableInterface $listTable The list table.
     * @param mixed              $item      The item.
     *
     * @return string|StringableInterface
     */
    protected function _renderResponsiveToggleButton(ListTableInterface $listTable, $item)
    {
        return sprintf(
            '<button type="button" class="toggle-row"><span class="screen-reader-text">%s</span></button>',
            __('Show more details')
        );
    }

    /**
     * Renders the column cell contents.
     *
     * @since [*next-version*]
     *
     * @param ListTableInterface $listTable The list table.
     * @param mixed              $item      The item.
     *
     * @return string|StringableInterface
     */
    abstract protected function _renderContent(ListTableInterface $listTable, $item);
}
