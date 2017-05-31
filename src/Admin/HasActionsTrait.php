<?php

namespace RebelCode\WordPress\Admin;

/**
 * Something that has actions.
 *
 * @since [*next-version*]
 */
trait HasActionsTrait
{
    /**
     * The actions.
     *
     * @since [*next-version*]
     *
     * @var ActionInterface[]
     */
    protected $actions;

    /**
     * Retrieves the actions.
     *
     * @since [*next-version*]
     *
     * @return ActionInterface[]
     */
    protected function _getActions()
    {
        return $this->actions;
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
    protected function _setActions(array $actions)
    {
        $this->_clearActions()->_addManyActions($actions);

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
    protected function _addAction(ActionInterface $action)
    {
        $this->actions[$action->getId()] = $action;

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
    protected function _addManyActions(array $actions)
    {
        foreach ($actions as $action) {
            $this->_addAction($action);
        }

        return $this;
    }

    /**
     * Checks if this instance contains the given action.
     *
     * @since [*next-version*]
     *
     * @param ActionInterface $action The action instance.
     *
     * @return bool True if the action was found, false if not.
     */
    protected function _hasAction(ActionInterface $action)
    {
        return $this->_hasActionId($action->getId());
    }

    /**
     * Checks if this instance contains the given action ID.
     *
     * @since [*next-version*]
     *
     * @param string $id The action ID.
     *
     * @return bool True if the action ID was found, false if not.
     */
    protected function _hasActionId($id)
    {
        return array_key_exists($id, $this->actions);
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
    protected function _getAction($id)
    {
        return $this->_hasActionId($id)
            ? $this->actions[$id]
            : null;
    }

    /**
     * Removes all actions from this instance.
     *
     * @since [*next-version*]
     *
     * @return $this
     */
    protected function _clearActions()
    {
        $this->actions = array();

        return $this;
    }
}
