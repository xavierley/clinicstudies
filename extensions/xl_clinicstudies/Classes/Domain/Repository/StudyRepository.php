<?php

declare(strict_types=1);

namespace Hellipse\XlClinicstudies\Domain\Repository;

use Hellipse\XlClinicstudies\Domain\Model\Dto\Search;

/**
 * This file is part of the "Clinic Studies" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 Xavier Ley <xavierley@gmail.com>, Hellipse
 */

/**
 * The repository for Studies
 */
class StudyRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    public function findAll(): \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        return $query->execute();
    }

    public function findFilteredStudies(Search $search): \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);

        $constraints = [];

        if(!empty($search->getCondition())){
            $constraints[] = $query->like('condition', '%' . $search->getCondition() . '%');
        }
        if(!empty($search->getIntervention())){
            $constraints[] = $query->like('intervention', '%' . $search->getIntervention() . '%');
        }
        if(!empty($search->getLocation())){
            $constraints[] = $query->like('location', '%' . $search->getLocation() . '%');
        }
        if(!empty($search->getKeyword())){
            $constraints[] = $query->logicalOr(
                $query->like('summary', '%' . $search->getKeyword() . '%'),
                $query->like('description', '%' . $search->getKeyword() . '%'),
                $query->like('title', '%' . $search->getKeyword() . '%')
            );
        }
        if($search->getStatus() === true){
            $constraints[] = $query->equals('status', 1);
        }

        $constraintsFinal = $query->logicalAnd(...$constraints);
        $query->matching($constraintsFinal);

        $query->setOrderings([
            'studystart' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
        ]);

        return $query->execute();
    }

}
