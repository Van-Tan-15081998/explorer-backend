<?php

namespace App\Services\Example;

use App\Repositories\Example\ExampleMysqlRepository;
use App\Repositories\Example\ExampleRepositoryInterface;
use Illuminate\Http\Request;
use Exception;

class ExampleService
{

    private $ExampleRepo;

    public function __construct(ExampleRepositoryInterface $ExampleRepo)
    {
        $this->ExampleRepo = $ExampleRepo;
    }

    public function save(Request $request)
    {
        $exampleData = $request->examples;

        $returnData = null;

        foreach ($exampleData as $example) {
            if ($example = $this->ExampleRepo->save($example)) {
                $returnData[] = [
                    'id'    => $example->id,
                    'example'  =>  $example->example,
                    'word_id' =>  $example->word_id,
                ];
            }
        }

        return $returnData;
    }

    public function get($wordId)
    {
        return $this->ExampleRepo->get($wordId);
    }
}
