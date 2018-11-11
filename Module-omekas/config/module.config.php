<?php
return [
    'controllers' => [
        'factories' => [
            'XMLContent\Controller\Index' => 'XMLContent\Service\Controller\IndexControllerFactory',
        ],
    ],
    'api_adapters' => [
        'invokables' => [
            'XMLContent_entities' => 'XMLContent\Api\Adapter\EntityAdapter',
            'XMLContent_imports' => 'XMLContent\Api\Adapter\ImportAdapter',
        ],
    ],
    'translator' => [
        'translation_file_patterns' => [
            [
                'type' => 'gettext',
                'base_dir' => OMEKA_PATH . '/modules/XMLContent/language',
                'pattern' => '%s.mo',
                'text_domain' => null,
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            OMEKA_PATH . '/modules/XMLContent/view',
        ],
    ],
    'view_helpers' => [
        'invokables' => [
            'xmlPropertySelector' => 'XMLContent\View\Helper\PropertySelector',
        ],
        'factories' => [
            'mediaSidebar' => 'XMLContent\Service\ViewHelper\MediaSidebarFactory',
            'itemSidebar' => 'XMLContent\Service\ViewHelper\ItemSidebarFactory',
        ],
    ],
    'entity_manager' => [
        'mapping_classes_paths' => [
            OMEKA_PATH . '/modules/XMLContent/src/Entity',
        ],
    ],
    'form_elements' => [
        'factories' => [
            'XMLContent\Form\ImportForm' => 'XMLContent\Service\Form\ImportFormFactory',
            'XMLContent\Form\MappingForm' => 'XMLContent\Service\Form\MappingFormFactory',
        ],
    ],
    'xml_import1_mappings' => [
        'items' => [
            '\XMLContent\Mapping\PropertyMapping',
            '\XMLContent\Mapping\MediaMapping',
            '\XMLContent\Mapping\ItemMapping',
        ],
        'users' => [
            '\XMLContent\Mapping\UserMapping',
        ],
    ],
    'xml_import1_media_ingester_adapter' => [
        'url' => 'XMLContent\MediaIngesterAdapter\UrlMediaIngesterAdapter',
        'html' => 'XMLContent\MediaIngesterAdapter\HtmlMediaIngesterAdapter',
        'iiif' => null,
        'oembed' => null,
        'youtube' => null,
    ],
    'router' => [
        'routes' => [
            'admin' => [
                'child_routes' => [
                    'XMLContent' => [
                        'type' => 'Literal',
                        'options' => [
                            'route' => '/XMLContent',
                            'defaults' => [
                                '__NAMESPACE__' => 'XMLContent\Controller',
                                'controller' => 'Index',
                                'action' => 'index',
                            ],
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'past-imports' => [
                                'type' => 'Literal',
                                'options' => [
                                    'route' => '/past-imports',
                                    'defaults' => [
                                        '__NAMESPACE__' => 'XMLContent\Controller',
                                        'controller' => 'Index',
                                        'action' => 'past-imports',
                                    ],
                                ],
                            ],
                            'map' => [
                                'type' => 'Literal',
                                'options' => [
                                    'route' => '/map',
                                    'defaults' => [
                                        '__NAMESPACE__' => 'XMLContent\Controller',
                                        'controller' => 'Index',
                                        'action' => 'map',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'navigation' => [
        'AdminModule' => [
            
            [
                'label' => 'XML Import1',
                'route' => 'admin/XMLContent',
                'resource' => 'XMLContent\Controller\Index',
                'pages' => [
                    [
                        'label'      => 'Import', // @translate
                        'route'      => 'admin/XMLContent',
                        'resource'   => 'XMLContent\Controller\Index',
                    ],
                    [
                        'label'      => 'Import', // @translate
                        'route'      => 'admin/XMLContent/map',
                        'resource'   => 'XMLContent\Controller\Index',
                        'visible'    => false,
                    ],
                    [
                        'label'      => 'Past Imports', // @translate
                        'route'      => 'admin/XMLContent/past-imports',
                        'controller' => 'Index',
                        'action' => 'past-imports',
                        'resource' => 'XMLContent\Controller\Index',
                    ],
                ],
            ],
        ],
    ],
    'js_translate_strings' => [
        'Remove mapping', // @translate
        'Undo remove mapping', // @translate
        'Select an item type at the left before choosing a resource class.', // @translate
        'Select an element at the left before choosing a property.', // @translate
        'Please enter a valid language tag.', // @translate
    ],
];