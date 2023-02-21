<?php

namespace Container2NhS9tj;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Firewall_Map_Context_ApiService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'security.firewall.map.context.api' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-bundle/Security/FirewallContext.php';

        $a = ($container->privates['security.exception_listener.api'] ?? $container->load('getSecurity_ExceptionListener_ApiService'));

        if (isset($container->privates['security.firewall.map.context.api'])) {
            return $container->privates['security.firewall.map.context.api'];
        }

        return $container->privates['security.firewall.map.context.api'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['security.channel_listener'] ?? $container->load('getSecurity_ChannelListenerService'));
            yield 1 => ($container->privates['debug.security.firewall.authenticator.api'] ?? $container->load('getDebug_Security_Firewall_Authenticator_ApiService'));
            yield 2 => ($container->privates['security.access_listener'] ?? $container->load('getSecurity_AccessListenerService'));
        }, 3), $a, NULL, ($container->privates['security.firewall.map.config.api'] ?? $container->load('getSecurity_Firewall_Map_Config_ApiService')));
    }
}
