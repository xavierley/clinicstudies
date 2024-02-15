<?php

namespace Hellipse\XlClinicstudies\Domain\Model\Dto;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Search extends AbstractEntity
{

    /**
     * search word in the field condition
     *
     * @var string
     */
    protected string $condition = '';

    /**
     * search word in the field intervention
     *
     * @var string
     */
    protected string $intervention = '';

    /**
     * search word in the field location
     *
     * @var string
     */
    protected string $location = '';

    /**
     * search word in the other text fields (like summary or description)
     *
     * @var string
     */
    protected string $keyword = '';

    /**
     * check if the status field is checked
     *
     * @var bool
     */
    protected bool $status = false;

    /**
     * @return string
     */
    public function getCondition(): string
    {
        return $this->condition;
    }

    /**
     * @param string $condition
     */
    public function setCondition(string $condition): void
    {
        $this->condition = $condition;
    }

    /**
     * @return string
     */
    public function getIntervention(): string
    {
        return $this->intervention;
    }

    /**
     * @param string $intervention
     */
    public function setIntervention(string $intervention): void
    {
        $this->intervention = $intervention;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param  string $location
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getKeyword(): string
    {
        return $this->keyword;
    }

    /**
     * @param string $keyword
     */
    public function setKeyword(string $keyword): void
    {
        $this->keyword = $keyword;
    }

    /**
     * @return bool
     */
    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }

}
