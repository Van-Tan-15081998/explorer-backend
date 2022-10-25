<?php

namespace App\Services\Pronounce;

use App\Repositories\Pronounce\PronounceRepositoryInterface;
use Illuminate\Http\Request;

class PronounceService
{

    private $pronounceRepo;

    public function __construct(PronounceRepositoryInterface $pronounceRepo)
    {
        $this->pronounceRepo = $pronounceRepo;
    }

    public function save(Request $request, $word_id)
    {
        $data = $request->all();

        if ($pronounce = $this->pronounceRepo->save($data, $word_id)) {
            $returnData = [
                'word_id' => $pronounce->word_id,
                'us'  =>  $pronounce->us,
                'uk'  =>  $pronounce->uk,
            ];

            return $returnData;
        } else {
            return false;
        }
    }

    public function get($word_id)
    {
        return $this->pronounceRepo->get($word_id);
    }
}
