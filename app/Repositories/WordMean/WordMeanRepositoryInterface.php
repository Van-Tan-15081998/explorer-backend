<?php

namespace App\Repositories\WordMean;

interface WordMeanRepositoryInterface
{

    public function saveVieWordMean($data);

    public function saveEngWordMean($data);

    public function saveWordMeanPopularity($data);

    public function getVie($wordId);

    public function getEng($wordId);

    public function deleteWordMean($id);

    public function updateWordMean($id, $data);
}
