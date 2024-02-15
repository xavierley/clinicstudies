<?php

namespace Hellipse\XlClinicstudies\Domain\Repository;

class PhaseRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    public function findAll(): \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        return $query->execute();
    }

}
