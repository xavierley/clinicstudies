<?php

declare(strict_types=1);

namespace Hellipse\XlClinicstudies\Client;

use TYPO3\CMS\Core\Http\RequestFactory;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

final class ClinicaltrialsClient
{
    private const API_URL = 'https://clinicaltrials.gov/api/v2/studies?countTotal=true';

    // We need the RequestFactory for creating and sending a request,
    // so we inject it into the class using constructor injection.
    public function __construct(
        private readonly RequestFactory $requestFactory,
    ) {}

    /**
     *
     */
    public function getAllStudies(string $currentPageToken = ''): array
    {
        $additionalOptions = [
            'headers' => ['Cache-Control' => 'no-cache'],
            'allow_redirects' => false,
        ];

        $url = self::API_URL;
        if($currentPageToken !== '') {
            $url .= '&pageToken=' . $currentPageToken;
        }
        // Get a PSR-7-compliant response object
        $response = $this->requestFactory->request(
            $url,
            'GET',
            $additionalOptions
        );

        $content = $response->getBody()->getContents();

        return json_decode($content, true, flags: JSON_THROW_ON_ERROR);
    }

    /**
     *
     */
    public function findFilteredStudies(
        \Hellipse\XlClinicstudies\Domain\Model\Dto\Search $search,
        string $currentPageToken = ''
    ): array
    {
        $additionalOptions = [
            'headers' => ['Cache-Control' => 'no-cache'],
            'allow_redirects' => false,
        ];

        $url = self::API_URL;
        if($currentPageToken !== '') {
            $url .= '&pageToken=' . $currentPageToken;
        }
        if($search->getCondition()){
            $url .= '&query.cond=' . $search->getCondition();
        }
        if($search->getIntervention()){
            $url .= '&query.intr=' . $search->getIntervention();
        }
        if($search->getLocation()){
            $url .= '&query.locn=' . $search->getLocation();
        }
        if($search->getKeyword()){
            $url .= '&query.term=' . $search->getKeyword();
        }
        if($search->getStatus() === true){
            $url .= '&filter.overallStatus=RECRUITING';
        }
        // Get a PSR-7-compliant response object
        $response = $this->requestFactory->request(
            $url,
            'GET',
            $additionalOptions
        );

        $content = $response->getBody()->getContents();

        // DebuggerUtility::var_dump($content, 'TEST $content');

        return json_decode($content, true, flags: JSON_THROW_ON_ERROR);
    }
}
