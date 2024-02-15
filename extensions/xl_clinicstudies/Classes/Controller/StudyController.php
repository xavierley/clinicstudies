<?php

declare(strict_types=1);

namespace Hellipse\XlClinicstudies\Controller;

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \Hellipse\XlClinicstudies\Domain\Model\Dto\Search;
use \Hellipse\XlClinicstudies\Client\ClinicaltrialsClient;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

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

    /**
     * action list
     * @param Search $search
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(Search $search = null): \Psr\Http\Message\ResponseInterface
    {
        $currentPage = '';
        if($this->request->hasArgument('currentPage')) {
            $currentPage = $this->request->getArgument('currentPage');
        }

        if($search === null){
            $search = GeneralUtility::makeInstance(Search::class);
            $studies = $this->clinicaltrialsClient->getAllStudies($currentPage);
        } else {
            $studies = $this->clinicaltrialsClient->findFilteredStudies($search, $currentPage);
        }

        $this->view->assign('studies', $studies);
        $this->view->assign('search', $search);

        return $this->htmlResponse();
    }

}
