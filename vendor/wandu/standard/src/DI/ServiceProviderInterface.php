<?php
namespace Wandu\Standard\DI;

interface ServiceProviderInterface
{
    /**
     * @param ContainerInterface $app
     * @return self
     */
    public function register(ContainerInterface $app);
}
