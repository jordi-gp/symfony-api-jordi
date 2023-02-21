<?php

namespace ContainerCENG07B;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Authenticator_Jwt_ApiService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'security.authenticator.jwt.api' shared service.
     *
     * @return \Lexik\Bundle\JWTAuthenticationBundle\Security\Authenticator\JWTAuthenticator
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authenticator/AuthenticatorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authenticator/AbstractAuthenticator.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/EntryPoint/AuthenticationEntryPointInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/lexik/jwt-authentication-bundle/Security/Authenticator/ForwardCompatAuthenticatorTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/lexik/jwt-authentication-bundle/Security/Authenticator/JWTAuthenticator.php';

        $a = ($container->services['lexik_jwt_authentication.jwt_manager'] ?? $container->load('getLexikJwtAuthentication_JwtManagerService'));

        if (isset($container->privates['security.authenticator.jwt.api'])) {
            return $container->privates['security.authenticator.jwt.api'];
        }
        $b = ($container->services['event_dispatcher'] ?? $container->getEventDispatcherService());

        if (isset($container->privates['security.authenticator.jwt.api'])) {
            return $container->privates['security.authenticator.jwt.api'];
        }

        return $container->privates['security.authenticator.jwt.api'] = new \Lexik\Bundle\JWTAuthenticationBundle\Security\Authenticator\JWTAuthenticator($a, $b, ($container->privates['lexik_jwt_authentication.extractor.chain_extractor'] ?? $container->load('getLexikJwtAuthentication_Extractor_ChainExtractorService')), ($container->privates['security.user.provider.concrete.users'] ?? $container->load('getSecurity_User_Provider_Concrete_UsersService')), NULL);
    }
}
