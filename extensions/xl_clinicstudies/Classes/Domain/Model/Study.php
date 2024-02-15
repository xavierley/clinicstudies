<?php

declare(strict_types=1);

namespace Hellipse\XlClinicstudies\Domain\Model;


/**
 * This file is part of the "Clinic Studies" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 Xavier Ley <xavierley@gmail.com>, Hellipse
 */

/**
 * Study
 */
class Study extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $title = null;

    /**
     * condition
     *
     * @var string
     */
    protected $condition = null;

    /**
     * intervention
     *
     * @var string
     */
    protected $intervention = null;

    /**
     * location
     *
     * @var string
     */
    protected $location = null;

    /**
     * status
     *
     * @var bool
     */
    protected $status = null;

    /**
     * studystart
     *
     * @var \DateTime
     */
    protected $studystart = null;

    /**
     * summary
     *
     * @var string
     */
    protected $summary = null;

    /**
     * description
     *
     * @var string
     */
    protected $description = null;

    /**
     * phases
     *
     * @var \Hellipse\XlClinicstudies\Domain\Model\Phase
     */
    protected $phases = null;

    /**
     * Returns the title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns the condition
     *
     * @return string
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * Sets the condition
     *
     * @param string $condition
     * @return void
     */
    public function setCondition(string $condition)
    {
        $this->condition = $condition;
    }

    /**
     * Returns the intervention
     *
     * @return string
     */
    public function getIntervention()
    {
        return $this->intervention;
    }

    /**
     * Sets the intervention
     *
     * @param string $intervention
     * @return void
     */
    public function setIntervention(string $intervention)
    {
        $this->intervention = $intervention;
    }

    /**
     * Returns the location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets the location
     *
     * @param string $location
     * @return void
     */
    public function setLocation(string $location)
    {
        $this->location = $location;
    }

    /**
     * Returns the status
     *
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the status
     *
     * @param bool $status
     * @return void
     */
    public function setStatus(bool $status)
    {
        $this->status = $status;
    }

    /**
     * Returns the boolean state of status
     *
     * @return bool
     */
    public function isStatus()
    {
        return $this->status;
    }

    /**
     * Returns the studystart
     *
     * @return \DateTime
     */
    public function getStudystart()
    {
        return $this->studystart;
    }

    /**
     * Sets the studystart
     *
     * @param \DateTime $studystart
     * @return void
     */
    public function setStudystart(\DateTime $studystart)
    {
        $this->studystart = $studystart;
    }

    /**
     * Returns the summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Sets the summary
     *
     * @param string $summary
     * @return void
     */
    public function setSummary(string $summary)
    {
        $this->summary = $summary;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Returns the phases
     *
     * @return \Hellipse\XlClinicstudies\Domain\Model\Phase
     */
    public function getPhases()
    {
        return $this->phases;
    }

    /**
     * Sets the phases
     *
     * @param \Hellipse\XlClinicstudies\Domain\Model\Phase $phases
     * @return void
     */
    public function setPhases(\Hellipse\XlClinicstudies\Domain\Model\Phase $phases)
    {
        $this->phases = $phases;
    }
}
