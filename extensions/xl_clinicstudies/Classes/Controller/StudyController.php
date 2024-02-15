<?php

declare(strict_types=1);

namespace Hellipse\XlClinicstudies\Controller;

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \Hellipse\XlClinicstudies\Domain\Model\Dto\Search;
use \Hellipse\XlClinicstudies\Domain\Repository\StudyRepository;
use \TYPO3\CMS\Extbase\Pagination\QueryResultPaginator;
use \TYPO3\CMS\Core\Pagination\SimplePagination;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

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
     * studyRepository
     *
     * @var StudyRepository
     */
    protected $studyRepository;

    /**
     * NewsController constructor.
     * @param StudyRepository $studyRepository
     */
    public function __construct(
        StudyRepository $studyRepository
    ) {
        $this->studyRepository = $studyRepository;
    }

    /**
     * action list
     * @param Search $search
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(Search $search = null): \Psr\Http\Message\ResponseInterface
    {
        if($search === null){
            $search = GeneralUtility::makeInstance(Search::class);
            $studies = $this->studyRepository->findAll();
        } else {
            $studies = $this->studyRepository->findFilteredStudies($search);
        }

        $itemsPerPage = 1;
        $currentPageNumber = max(1,
            $this->request->hasArgument('currentPageNumber')
            ? (int)$this->request->getArgument('currentPageNumber') : 1
        );

        $paginator = new QueryResultPaginator($studies, $currentPageNumber, $itemsPerPage);
        $pagination = new SimplePagination($paginator);

        $prevPage = $currentPageNumber <= 1 ? 1 : $currentPageNumber - 1;
        $nextPage = $currentPageNumber < $paginator->getNumberOfPages()
            ? $currentPageNumber + 1 : $paginator->getNumberOfPages();

        $this->view->assignMultiple(
            [
                'prevPage' => $prevPage,
                'nextPage' => $nextPage,
                'pagination' => $pagination,
                'paginator' => $paginator,
            ]
        );

        // $this->view->assign('studies', $studies);
        $this->view->assign('search', $search);

        return $this->htmlResponse();
    }

}
