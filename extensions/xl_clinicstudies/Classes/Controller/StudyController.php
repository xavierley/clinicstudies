<?php

declare(strict_types=1);

namespace Hellipse\XlClinicstudies\Controller;

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \Hellipse\XlClinicstudies\Domain\Model\Dto\Search;
use \Hellipse\XlClinicstudies\Client\ClinicaltrialsClient;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Extbase\Property\TypeConverter\PersistentObjectConverter;

/*
use \Hellipse\XlClinicstudies\Domain\Repository\StudyRepository;
use \TYPO3\CMS\Extbase\Pagination\QueryResultPaginator;
use \TYPO3\CMS\Core\Pagination\SimplePagination;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
*/

/**
 * This file is part of the "Clinic Studies" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 Xavier Ley <xavierley@gmail.com>, Hellipse
 */

/**
 * StudyController
 */
class StudyController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * clinicaltrialsClient
     *
     * @var ClinicaltrialsClient
     */
    protected $clinicaltrialsClient;

    /**
     * NewsController constructor.
     * @param ClinicaltrialsClient $clinicaltrialsClient
     */
    public function __construct(
        ClinicaltrialsClient $clinicaltrialsClient
    ) {
        $this->clinicaltrialsClient = $clinicaltrialsClient;
    }

    public function initializeListAction()
    {
        // On set les params de recherche pour eviter de les passer en GET quand on navigue avec la pagination
        $requestArguments = $this->request->getArguments();
        $contentDatas = $this->request->getAttribute('currentContentObject')->data;

        if($requestArguments['search']){
            $GLOBALS['TSFE']->fe_user->setKey(
                'ses',
                'searchDatas-' . $contentDatas['pid'],
                $requestArguments['search']
            );
        } else {
            if(!empty($requestArguments['currentPage'])){
                $arguments = $GLOBALS['TSFE']->fe_user->getKey(
                    'ses',
                    'searchDatas-' . $contentDatas['pid']
                );
                $this->request = $this->request->withArgument('search', $arguments);
            }
        }

        if ($this->arguments->hasArgument('search')) {
            $propertyMappingConfiguration = $this->arguments['search']->getPropertyMappingConfiguration();
            $propertyMappingConfiguration->allowAllProperties();
            $propertyMappingConfiguration->setTypeConverterOption(
                'TYPO3\CMS\Extbase\Property\TypeConverter\PersistentObjectConverter',
                PersistentObjectConverter::CONFIGURATION_CREATION_ALLOWED,
                true
            );
        }
    }

    /**
     * action list
     * @param Search $search
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(Search $search = null): \Psr\Http\Message\ResponseInterface
    {
        $searchToken = "all";
        if($search !== null) {
            $searchConcat = $search->getCondition().
                $search->getKeyword().
                $search->getIntervention().
                $search->getLocation().
                $search->getStatus();

            $searchToken = md5($searchConcat);
        }

        $paginationMapping = $GLOBALS['TSFE']->fe_user->getKey('ses', 'paginationMapping-' . $searchToken) ?? [0 => '', 1 => ''];

        $currentPage = 1;
        if($this->request->hasArgument('currentPage')) {
            $currentPage = $this->request->getArgument('currentPage');
        }

        $currentPageToken = '';
        if($this->request->hasArgument('currentPage')){
            $currentPageToken = $paginationMapping[$currentPage] ?? '';
        }

        if($search === null){
            $search = GeneralUtility::makeInstance(Search::class);
            $studies = $this->clinicaltrialsClient->getAllStudies($currentPageToken);
        } else {
            $studies = $this->clinicaltrialsClient->findFilteredStudies($search, $currentPageToken);
        }

        if(
            !empty($studies['nextPageToken'])
            && !in_array($studies['nextPageToken'], $paginationMapping)
        ){
            $paginationMapping[] = $studies['nextPageToken'];
            $GLOBALS['TSFE']->fe_user->setKey('ses', 'paginationMapping-' . $searchToken, $paginationMapping);
        }

        $prevPage = $currentPage > 0 ? $currentPage - 1 : 0;
        $nextPage = !empty($studies['nextPageToken']) ? $currentPage + 1 : null;

        $this->view->assign('prevPage', $prevPage);
        $this->view->assign('nextPage', $nextPage);
        $this->view->assign('studies', $studies);
        $this->view->assign('search', $search);

        return $this->htmlResponse();
    }

}
