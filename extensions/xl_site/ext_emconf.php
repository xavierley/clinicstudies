<?php

/**
 * Extension Manager/Repository config file for ext "xl_site".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'xl_site',
    'description' => '',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-12.4.99',
            'fluid_styled_content' => '12.4.0-12.4.99',
            'rte_ckeditor' => '12.4.0-12.4.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Hellipse\\\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Xavier Ley',
    'author_email' => 'xavierley@gmail.com',
    'author_company' => 'Hellipse',
    'version' => '1.0.0',
];
