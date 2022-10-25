<?php

namespace App\Repositories\ExampleByTypeWord;

interface ExampleByTypeWordRepositoryInterface
{

    public function saveVie($data, $wordMeanId);

    public function saveEng($data, $wordMeanId);

    public function get($data);

    public function getVie($wordId, $typeWordId, $wordMeanId);

    public function getEng($wordId, $typeWordId, $wordMeanId);

    public function delete($id);

    public function update($id, $data);
}
