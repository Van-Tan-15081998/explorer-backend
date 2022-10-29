<?php

namespace App\Services\ExampleByTypeWord;

use App\Repositories\ExampleByTypeWord\ExampleByTypeWordMysqlRepository;
use App\Repositories\ExampleByTypeWord\ExampleByTypeWordRepositoryInterface;
use Illuminate\Http\Request;
use Exception;

class ExampleByTypeWordService
{

    private $ExampleByTypeWordRepo;

    public function __construct(ExampleByTypeWordRepositoryInterface $ExampleByTypeWordRepo)
    {
        $this->ExampleByTypeWordRepo = $ExampleByTypeWordRepo;
    }

    public function saveEng(array $examples, $wordMeanId)
    {
        $returnData = [];

        foreach ($examples as $example) {
            if ($exampleResult = $this->ExampleByTypeWordRepo->saveEng($example, $wordMeanId)) {
                $returnData[] = [
                    'id'    => $exampleResult->id,
                    'example'  =>  $exampleResult->example,
                    'word_id' =>  $exampleResult->word_id,
                    'type_word_id' =>  $exampleResult->type_word_id,
                ];
            }
        }

        return $returnData;
    }

    public function saveVie(array $examples, $wordMeanId)
    {
        $returnData = [];

        foreach ($examples as $example) {
            if ($exampleResult = $this->ExampleByTypeWordRepo->saveVie($example, $wordMeanId)) {
                $returnData[] = [
                    'id'    => $exampleResult->id,
                    'example'  =>  $exampleResult->example,
                    'word_id' =>  $exampleResult->word_id,
                    'type_word_id' =>  $exampleResult->type_word_id,
                    'is_vie_mean' => $exampleResult->is_vie_mean,
                ];
            }
        }

        return $returnData;
    }

    public function getVie($wordId, $typeWordId, $wordMeanId)
    {
        return $this->ExampleByTypeWordRepo->getVie($wordId, $typeWordId, $wordMeanId);
    }

    public function getEng($wordId, $typeWordId, $wordMeanId)
    {
        return $this->ExampleByTypeWordRepo->getEng($wordId, $typeWordId, $wordMeanId);
    }

    public function saveEngSingle(Request $request)
    {
        $returnData = [];

        if ($exampleResult = $this->ExampleByTypeWordRepo->saveEngSingle($request->all())) {
            $returnData = [
                'id'    => $exampleResult->id,
                'example'  =>  $exampleResult->example,
                'word_id' =>  $exampleResult->word_id,
                'type_word_id' =>  $exampleResult->type_word_id,
                'word_mean_id' => $exampleResult->word_mean_id,
            ];
        }

        return $returnData;
    }

    public function saveVieSingle(Request $request)
    {
        $returnData = [];

        if ($exampleResult = $this->ExampleByTypeWordRepo->saveVieSingle($request->all())) {
            $returnData = [
                'id'    => $exampleResult->id,
                'example'  =>  $exampleResult->example,
                'word_id' =>  $exampleResult->word_id,
                'type_word_id' =>  $exampleResult->type_word_id,
                'word_mean_id' => $exampleResult->word_mean_id,
                'is_vie_mean' => $exampleResult->is_vie_mean,
            ];
        }

        return $returnData;
    }

    public function delete(Request $request)
    {
        return  $this->ExampleByTypeWordRepo->delete($request);
    }
}
