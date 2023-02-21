<?php

namespace ContainerCENG07B;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_SwaggerUi_ActionService extends App_KernelTestDebugContainer
{
    /**
     * Gets the public 'api_platform.swagger_ui.action' shared service.
     *
     * @return \ApiPlatform\Symfony\Bundle\SwaggerUi\SwaggerUiAction
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Symfony/Bundle/SwaggerUi/SwaggerUiAction.php';

        return $container->services['api_platform.swagger_ui.action'] = new \ApiPlatform\Symfony\Bundle\SwaggerUi\SwaggerUiAction(($container->privates['api_platform.metadata.resource.metadata_collection_factory.cached'] ?? $container->getApiPlatform_Metadata_Resource_MetadataCollectionFactory_CachedService()), ($container->services['.container.private.twig'] ?? $container->get_Container_Private_TwigService()), ($container->services['router'] ?? $container->getRouterService()), ($container->services['.container.private.serializer'] ?? $container->get_Container_Private_SerializerService()), ($container->privates['lexik_jwt_authentication.api_platform.openapi.factory'] ?? $container->load('getLexikJwtAuthentication_ApiPlatform_Openapi_FactoryService')), ($container->privates['api_platform.openapi.options'] ?? $container->load('getApiPlatform_Openapi_OptionsService')), ($container->privates['api_platform.swagger_ui.context'] ?? $container->load('getApiPlatform_SwaggerUi_ContextService')), $container->parameters['api_platform.formats'], '', '', false);
    }
}
