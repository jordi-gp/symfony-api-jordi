<?php

namespace ContainerR2XFIaz;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMaker_AutoCommand_MakeStateProcessorService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'maker.auto_command.make_state_processor' shared service.
     *
     * @return \Symfony\Bundle\MakerBundle\Command\MakerCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'console'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'Command.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'maker-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'MakerCommand.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'maker-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'MakerInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'maker-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Maker'.\DIRECTORY_SEPARATOR.'AbstractMaker.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'core'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Symfony'.\DIRECTORY_SEPARATOR.'Maker'.\DIRECTORY_SEPARATOR.'MakeStateProcessor.php';

        $container->privates['maker.auto_command.make_state_processor'] = $instance = new \Symfony\Bundle\MakerBundle\Command\MakerCommand(new \ApiPlatform\Symfony\Maker\MakeStateProcessor(($container->privates['api_platform.metadata.resource.name_collection_factory.cached'] ?? $container->getApiPlatform_Metadata_Resource_NameCollectionFactory_CachedService())), ($container->privates['maker.file_manager'] ?? $container->load('getMaker_FileManagerService')), ($container->privates['maker.generator'] ?? $container->load('getMaker_GeneratorService')));

        $instance->setName('make:state-processor');
        $instance->setDescription('Creates an API Platform state processor');

        return $instance;
    }
}
