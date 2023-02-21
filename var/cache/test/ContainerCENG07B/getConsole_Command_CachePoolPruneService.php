<?php

namespace ContainerCENG07B;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConsole_Command_CachePoolPruneService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'console.command.cache_pool_prune' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\CachePoolPruneCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Command/CachePoolPruneCommand.php';

        $container->privates['console.command.cache_pool_prune'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\CachePoolPruneCommand(new RewindableGenerator(function () use ($container) {
            yield 'cache.app' => ($container->services['cache.app'] ?? $container->getCache_AppService());
            yield 'cache.system' => ($container->services['cache.system'] ?? $container->getCache_SystemService());
            yield 'cache.validator' => ($container->privates['cache.validator'] ?? $container->getCache_ValidatorService());
            yield 'cache.serializer' => ($container->privates['cache.serializer'] ?? $container->getCache_SerializerService());
            yield 'cache.annotations' => ($container->privates['cache.annotations'] ?? $container->getCache_AnnotationsService());
            yield 'cache.property_info' => ($container->privates['cache.property_info'] ?? $container->getCache_PropertyInfoService());
            yield 'cache.validator_expression_language' => ($container->services['cache.validator_expression_language'] ?? $container->getCache_ValidatorExpressionLanguageService());
            yield 'cache.security_expression_language' => ($container->privates['cache.security_expression_language'] ?? $container->getCache_SecurityExpressionLanguageService());
            yield 'cache.doctrine.orm.default.result' => ($container->privates['cache.doctrine.orm.default.result'] ?? $container->getCache_Doctrine_Orm_Default_ResultService());
            yield 'cache.doctrine.orm.default.query' => ($container->privates['cache.doctrine.orm.default.query'] ?? $container->getCache_Doctrine_Orm_Default_QueryService());
            yield 'api_platform.cache.route_name_resolver' => ($container->privates['api_platform.cache.route_name_resolver'] ?? $container->getApiPlatform_Cache_RouteNameResolverService());
            yield 'api_platform.cache.metadata.resource' => ($container->privates['api_platform.cache.metadata.resource'] ?? $container->getApiPlatform_Cache_Metadata_ResourceService());
            yield 'api_platform.cache.metadata.resource.legacy' => ($container->privates['api_platform.cache.metadata.resource.legacy'] ?? $container->getApiPlatform_Cache_Metadata_Resource_LegacyService());
            yield 'api_platform.cache.metadata.property.legacy' => ($container->privates['api_platform.cache.metadata.property.legacy'] ?? $container->getApiPlatform_Cache_Metadata_Property_LegacyService());
            yield 'api_platform.cache.subresource_operation_factory' => ($container->privates['api_platform.cache.subresource_operation_factory'] ?? $container->getApiPlatform_Cache_SubresourceOperationFactoryService());
            yield 'api_platform.cache.metadata.property' => ($container->privates['api_platform.cache.metadata.property'] ?? $container->getApiPlatform_Cache_Metadata_PropertyService());
            yield 'api_platform.cache.metadata.resource_collection' => ($container->privates['api_platform.cache.metadata.resource_collection'] ?? $container->getApiPlatform_Cache_Metadata_ResourceCollectionService());
            yield 'api_platform.cache.identifiers_extractor' => ($container->privates['api_platform.cache.identifiers_extractor'] ?? $container->getApiPlatform_Cache_IdentifiersExtractorService());
        }, 18));

        $instance->setName('cache:pool:prune');
        $instance->setDescription('Prune cache pools');

        return $instance;
    }
}
