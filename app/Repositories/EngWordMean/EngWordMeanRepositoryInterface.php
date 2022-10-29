<?php

namespace App\Repositories\EngWordMean;

interface EngWordMeanRepositoryInterface
{

    public function save($data);

    public function get($wordId);

    public function delete($id);

    public function update($id, $data);
}
