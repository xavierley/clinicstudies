<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:xl_clinicstudies/Resources/Private/Language/locallang_db.xlf:tx_xlclinicstudies_domain_model_study',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title,tx_xlclinicstudies_condition,intervention,location,summary,description',
        'iconfile' => 'EXT:xl_clinicstudies/Resources/Public/Icons/tx_xlclinicstudies_domain_model_study.gif',
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'types' => [
        '1' => ['showitem' => 'title, tx_xlclinicstudies_condition, intervention, location, status, studystart, summary, description, phases, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_xlclinicstudies_domain_model_study',
                'foreign_table_where' => 'AND {#tx_xlclinicstudies_domain_model_study}.{#pid}=###CURRENT_PID### AND {#tx_xlclinicstudies_domain_model_study}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'title' => [
            'exclude' => false,
            'label' => 'LLL:EXT:xl_clinicstudies/Resources/Private/Language/locallang_db.xlf:tx_xlclinicstudies_domain_model_study.title',
            'description' => 'LLL:EXT:xl_clinicstudies/Resources/Private/Language/locallang_db.xlf:tx_xlclinicstudies_domain_model_study.title.description',
            'config' => [
                'type' => 'input',
                'size' => 0,
                'eval' => 'trim',
                'required' => true,
                'default' => ''
            ],
        ],
        'tx_xlclinicstudies_condition' => [
            'exclude' => false,
            'label' => 'LLL:EXT:xl_clinicstudies/Resources/Private/Language/locallang_db.xlf:tx_xlclinicstudies_domain_model_study.tx_xlclinicstudies_condition',
            'description' => 'LLL:EXT:xl_clinicstudies/Resources/Private/Language/locallang_db.xlf:tx_xlclinicstudies_domain_model_study.tx_xlclinicstudies_condition.description',
            'config' => [
                'type' => 'input',
                'size' => 0,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'intervention' => [
            'exclude' => false,
            'label' => 'LLL:EXT:xl_clinicstudies/Resources/Private/Language/locallang_db.xlf:tx_xlclinicstudies_domain_model_study.intervention',
            'description' => 'LLL:EXT:xl_clinicstudies/Resources/Private/Language/locallang_db.xlf:tx_xlclinicstudies_domain_model_study.intervention.description',
            'config' => [
                'type' => 'input',
                'size' => 0,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'location' => [
            'exclude' => false,
            'label' => 'LLL:EXT:xl_clinicstudies/Resources/Private/Language/locallang_db.xlf:tx_xlclinicstudies_domain_model_study.location',
            'description' => 'LLL:EXT:xl_clinicstudies/Resources/Private/Language/locallang_db.xlf:tx_xlclinicstudies_domain_model_study.location.description',
            'config' => [
                'type' => 'input',
                'size' => 0,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'status' => [
            'exclude' => false,
            'label' => 'LLL:EXT:xl_clinicstudies/Resources/Private/Language/locallang_db.xlf:tx_xlclinicstudies_domain_model_study.status',
            'description' => 'LLL:EXT:xl_clinicstudies/Resources/Private/Language/locallang_db.xlf:tx_xlclinicstudies_domain_model_study.status.description',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    ['label' => 'LLL:EXT:xl_clinicstudies/Resources/Private/Language/locallang_db.xlf:tx_xlclinicstudies_domain_model_study.status.label'],
                ],
                'default' => 0,
            ]
        ],
        'studystart' => [
            'exclude' => false,
            'label' => 'LLL:EXT:xl_clinicstudies/Resources/Private/Language/locallang_db.xlf:tx_xlclinicstudies_domain_model_study.studystart',
            'description' => 'LLL:EXT:xl_clinicstudies/Resources/Private/Language/locallang_db.xlf:tx_xlclinicstudies_domain_model_study.studystart.description',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date',
                'default' => time()
            ],
        ],
        'summary' => [
            'exclude' => false,
            'label' => 'LLL:EXT:xl_clinicstudies/Resources/Private/Language/locallang_db.xlf:tx_xlclinicstudies_domain_model_study.summary',
            'description' => 'LLL:EXT:xl_clinicstudies/Resources/Private/Language/locallang_db.xlf:tx_xlclinicstudies_domain_model_study.summary.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => 'true',
                'rows' => 15,
                'eval' => 'trim',
                'default' => ''
            ]
        ],
        'description' => [
            'exclude' => false,
            'label' => 'LLL:EXT:xl_clinicstudies/Resources/Private/Language/locallang_db.xlf:tx_xlclinicstudies_domain_model_study.description',
            'description' => 'LLL:EXT:xl_clinicstudies/Resources/Private/Language/locallang_db.xlf:tx_xlclinicstudies_domain_model_study.description.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => 'true',
                'rows' => 15,
                'eval' => 'trim',
                'default' => ''
            ]
        ],
        'phases' => [
            'exclude' => false,
            'label' => 'LLL:EXT:xl_clinicstudies/Resources/Private/Language/locallang_db.xlf:tx_xlclinicstudies_domain_model_study.phases',
            'description' => 'LLL:EXT:xl_clinicstudies/Resources/Private/Language/locallang_db.xlf:tx_xlclinicstudies_domain_model_study.phases.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_xlclinicstudies_domain_model_phase',
                'default' => 0,
                'minitems' => 0,
                'maxitems' => 1,
            ],

        ],

    ],
];
