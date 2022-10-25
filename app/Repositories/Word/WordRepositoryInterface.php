<?php

namespace App\Repositories\Word;

interface WordRepositoryInterface
{

    public function save($data);

    public function getWord($data);

    public function deleteWord($id);

    public function updateWord($id, $data);

    public function getAllWord();

    public function getWordById($id);

    public function getTotalWordCount();

    public function getWordPaginate($data);
}
