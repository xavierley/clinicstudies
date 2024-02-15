<?php

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'xl_clinicstudies',
    'list',
    [
        \Hellipse\XlClinicstudies\Controller\StudyController::class => 'list',
    ],
    [
        \Hellipse\XlClinicstudies\Controller\StudyController::class => 'list',
    ],
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
