<?php

namespace srag\DIC\SrLearningProgressPDBlock\Plugin;

/**
 * Interface Pluginable
 *
 * @package srag\DIC\SrLearningProgressPDBlock\Plugin
 */
interface Pluginable
{

    /**
     * @return PluginInterface
     */
    public function getPlugin() : PluginInterface;


    /**
     * @param PluginInterface $plugin
     *
     * @return static
     */
    public function withPlugin(PluginInterface $plugin)/*: static*/ ;
}
