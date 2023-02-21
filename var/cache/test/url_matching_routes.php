<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/login' => [[['_route' => 'login'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api(?'
                    .'|/\\.well\\-known/genid/([^/]++)(*:43)'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:78)'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:108)'
                        .'|contexts/([^.]+)(?:\\.(jsonld))?(*:147)'
                        .'|artistas(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:192)'
                            .'|(?:\\.([^/]++))?(*:215)'
                        .')'
                        .'|users(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:258)'
                            .'|(?:\\.([^/]++))?(*:281)'
                        .')'
                        .'|vinilos(?'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:326)'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:352)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:390)'
                            .')'
                        .')'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        43 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], null, null, false, true, null]],
        78 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        108 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        147 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        192 => [[['_route' => '_api_/artistas/{id}.{_format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Artista', '_api_operation_name' => '_api_/artistas/{id}.{_format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        215 => [[['_route' => '_api_/artistas.{_format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Artista', '_api_operation_name' => '_api_/artistas.{_format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        258 => [[['_route' => '_api_/users/{id}.{_format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users/{id}.{_format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        281 => [[['_route' => '_api_/users.{_format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_operation_name' => '_api_/users.{_format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        326 => [[['_route' => '_api_/vinilos/{id}.{_format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Vinilo', '_api_operation_name' => '_api_/vinilos/{id}.{_format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        352 => [
            [['_route' => '_api_/vinilos.{_format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Vinilo', '_api_operation_name' => '_api_/vinilos.{_format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => '_api_/vinilos.{_format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Vinilo', '_api_operation_name' => '_api_/vinilos.{_format}_post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        390 => [
            [['_route' => '_api_/vinilos/{id}.{_format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Vinilo', '_api_operation_name' => '_api_/vinilos/{id}.{_format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => '_api_/vinilos/{id}.{_format}_delete', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Vinilo', '_api_operation_name' => '_api_/vinilos/{id}.{_format}_delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
