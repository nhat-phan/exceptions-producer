<?php

namespace App\Services;

use App\Repositories\YourAwesomeRepository;

class YourAwesomeService
{
    /**
     * @var YourAwesomeRepository
     */
    private $repository;
    /**
     * @var YourOtherService
     */
    private $otherService;

    /**
     * YourAwesomeService constructor.
     * @param YourOtherService $otherService
     * @param YourAwesomeRepository $repository
     */
    public function __construct(
        YourOtherService $otherService,
        YourAwesomeRepository $repository
    ) {
        $this->repository = $repository;
        $this->otherService = $otherService;
    }

    /**
     * @param $input
     */
    public function getAllData($input)
    {
        $test = "this project is exception generator for Sentry Integration plugin";
        $this->getDataFromRepository($input, $test);
    }

    /**
     * @param string $slug
     */
    public function processData(string $slug)
    {
        $this->otherService->processSlug($slug);
    }

    /**
     * @param $a
     * @param $b
     * @return bool
     */
    private function getDataFromRepository($a, $b)
    {
        return $this->repository->getData($a);
    }
}
