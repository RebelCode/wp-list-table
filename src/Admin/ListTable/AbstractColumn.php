<?php

namespace RebelCode\WordPress\Admin\ListTable;

use Dhii\Util\String\StringableInterface;
use RebelCode\WordPress\Admin\ActionInterface;
use RebelCode\WordPress\Admin\HasActionsTrait;
use RebelCode\WordPress\HasIdTrait;
use RebelCode\WordPress\HasLabelTrait;
use Traversable;

/**
 * Basic functionality for a column.
 *
 * @since [*next-version*]
 */
abstract class AbstractColumn
{
    use HasActionsTrait;
    use HasIdTrait;
    use HasLabelTrait;

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
            '<td %1$s>%2$s %3$s %4$s</td>',
            $this->_renderAttributes($listTable, $item),
            $this->_renderContent($listTable, $item),
            $this->_renderActions($listTable, $item),
            $this->_renderResponsiveToggleButton($listTable, $item)
        );
    }

    /**
     * Gets the HTML classes to render.
     *
     * @since [*next-version*]
     *
     * @param ListTableInterface $listTable The list table instance.
     * @param mixed              $item      The item.
     *
     * @return string
     */
    protected function _getHtmlClasses(ListTableInterface $listTable, $item)
    {
        $id = $this->getId();

        $classes = array($id, sprintf('column-%s', $id));

        if ($id === $listTable->getPrimaryColumn()) {
            $classes[] = 'column-primary';
        }

        if (in_array($id, $listTable->getHiddenColumns())) {
            $classes[] = 'hidden';
        }

        if (count($this->_getActions())) {
            $classes[] = 'has-row-actions';
        }

        return $classes;
    }

    /**
     * Renders the attributes.
     *
     * @since [*next-version*]
     *
     * @param ListTableInterface $listTable The list table instance.
     * @param mixed              $item      The item.
     *
     * @return string|StringableInterface The rendered attributes.
     */
    protected function _renderAttributes(ListTableInterface $listTable, $item)
    {
        // Get data
        $label   = $this->_getLabel();
        $classes = $this->_getHtmlClasses($listTable, $item);

        // Render HTML
        $htmlClassAttr = $this->_attr('class', $classes);
        $htmlDataAttr  = $this->_attr('data-colname', $label);

        return sprintf('%1$s %2$s', $htmlClassAttr, $htmlDataAttr);
    }

    /**
     * Prepares the actions.
     *
     * @since [*next-version*]
     *
     * @param ActionInterface[]|Traversable $actions A list of action instances.
     *
     * @return $this
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
