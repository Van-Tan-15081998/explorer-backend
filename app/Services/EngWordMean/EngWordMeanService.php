<?php

namespace App\Services\EngWordMean;

use App\Repositories\EngWordMean\EngWordMeanMysqlRepository;
use App\Repositories\EngWordMean\EngWordMeanRepositoryInterface;
use Illuminate\Http\Request;
use Exception;

class EngWordMeanService
{

    private $EngWordMeanRepo;

    public function __construct(EngWordMeanRepositoryInterface $EngWordMeanRepo)
    {
        $this->EngWordMeanRepo = $EngWordMeanRepo;
    }

    public function save(Request $request)
    {
        $data = $request->all();

        $returnData = null;

        if ($engWordMean = $this->EngWordMeanRepo->save($data)) {
            $returnData[] = [
                'id'    => $engWordMean->id,
                'mean'  =>  $engWordMean->mean,
                'example'  =>  $engWordMean->example,
                'word_id' =>  $engWordMean->word_id,
                'type_word_id'  =>  $engWordMean->type_word_id,
            ];
        }

        return $returnData;
    }

    public function get($wordId)
    {
        return $this->EngWordMeanRepo->get($wordId);
    }
}
