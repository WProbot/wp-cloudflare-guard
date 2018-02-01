<?php

namespace TypistTech\WPCFG\Vendor\League\Container;

use TypistTech\WPCFG\Vendor\Interop\Container\ContainerInterface as InteropContainerInterface;

interface ImmutableContainerAwareInterface
{
    /**
     * Set a container
     *
     * @param \Interop\Container\ContainerInterface $container
     */
    public function setContainer(InteropContainerInterface $container);

    /**
     * Get the container
     *
     * @return \League\Container\ImmutableContainerInterface
     */
    public function getContainer();
}
