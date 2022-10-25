<?php

namespace App\Services\WordMean;

use App\Repositories\WordMean\WordMeanRepositoryInterface;
use Illuminate\Http\Request;
use Exception;

use App\Exceptions\ValidationException;
use App\Services\ExampleByTypeWord\ExampleByTypeWordService;

class WordMeanService
{

    private $wordMeanRepo;
    private $exampleByTypeWordService;

    public function __construct(WordMeanRepositoryInterface $wordMeanRepo, ExampleByTypeWordService $exampleByTypeWordService)
    {
        $this->wordMeanRepo = $wordMeanRepo;
        $this->exampleByTypeWordService = $exampleByTypeWordService;
    }

    public function saveVieWordMeanByTypeWord($data)
    {
        $returnData = null;

        if ($wordMean = $this->wordMeanRepo->saveVieWordMean($data)) {
            $returnData = [
                'id' => $wordMean->id,
                'mean'  =>  $wordMean->mean,
                'word_id'  =>  $wordMean->word_id,
                'type_word_id'  =>  $wordMean->type_word_id,
            ];
        } else {
            return false;
        }

        return $returnData;
    }

    public function saveEngWordMeanByTypeWord($data)
    {
        $returnData = null;

        if ($wordMean = $this->wordMeanRepo->saveEngWordMean($data)) {
            $returnData = [
                'id' => $wordMean->id,
                'mean'  =>  $wordMean->mean,
                'word_id'  =>  $wordMean->word_id,
                'type_word_id'  =>  $wordMean->type_word_id,
            ];
        } else {
            return false;
        }

        return $returnData;
    }

    public function saveWordMeanPopularity(Request $request)
    {
        $data = $request->all();

        $returnData = null;

        if ($wordMean = $this->wordMeanRepo->saveWordMeanPopularity($data)) {
            $returnData = [
                'id' => $wordMean->id,
                'word_id' => $wordMean->word_id,
                'mean'  =>  $wordMean->mean,
                'is_popularity'  =>  $wordMean->is_popularity,
            ];
        } else {
            return false;
        }

        return $returnData;
    }

    public function getVieWordMeanByTypeWord($wordId)
    {

        $vieWordMeanByTypeWords = $this->wordMeanRepo->getVie($wordId);

        if (count($vieWordMeanByTypeWords) > 0) {
            foreach ($vieWordMeanByTypeWords as $key => $vieWordMeanByTypeWord) {
                $examples = $this->exampleByTypeWordService->getVie(
                    $vieWordMeanByTypeWord['word_id'],
                    $vieWordMeanByTypeWord['type_word_id'],
                    $vieWordMeanByTypeWord['id']
                );
                if ($examples) {
                    $vieWordMeanByTypeWords[$key]['examples'] = $examples;
                }
            }
        }

        return $vieWordMeanByTypeWords;
    }

    public function getEngWordMeanByTypeWord($wordId)
    {

        $engWordMeanByTypeWords =  $this->wordMeanRepo->getEng($wordId);

        if (count($engWordMeanByTypeWords) > 0) {
            foreach ($engWordMeanByTypeWords as $key => $engWordMeanByTypeWord) {
                $examples = $this->exampleByTypeWordService->getEng(
                    $engWordMeanByTypeWord['word_id'],
                    $engWordMeanByTypeWord['type_word_id'],
                    $engWordMeanByTypeWord['id']
                );
                if ($examples) {
                    $engWordMeanByTypeWords[$key]['examples'] = $examples;
                }
            }
        }

        return $engWordMeanByTypeWords;
    }
}
