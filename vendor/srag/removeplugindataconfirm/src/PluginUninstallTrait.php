<?php

namespace srag\RemovePluginDataConfirm\SrLearningProgressPDBlock;

/**
 * Trait PluginUninstallTrait
 *
 * @package srag\RemovePluginDataConfirm\SrLearningProgressPDBlock
 */
trait PluginUninstallTrait
{

    use BasePluginUninstallTrait;

    /**
     * @internal
     */
    protected final function afterUninstall() : void
    {

    }


    /**
     * @return bool
     *
     * @internal
     */
    protected final function beforeUninstall() : bool
    {
        return $this->pluginUninstall();
    }
}
