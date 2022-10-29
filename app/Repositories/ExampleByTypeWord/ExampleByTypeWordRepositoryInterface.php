<?php

namespace App\Repositories\ExampleByTypeWord;

interface ExampleByTypeWordRepositoryInterface
{

    public function saveVie($data, $wordMeanId);

    public function saveEng($data, $wordMeanId);

    public function saveVieSingle($data);

    public function saveEngSingle($data);

    public function get($data);

    public function getVie($wordId, $typeWordId, $wordMeanId);

    public function getEng($wordId, $typeWordId, $wordMeanId);

    public function delete($data);

    public function update($id, $data);
}
