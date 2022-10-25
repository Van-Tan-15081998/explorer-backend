<?php

namespace App\Repositories\Pronounce;

interface PronounceRepositoryInterface
{

    public function save($data, $word_id);

    public function get($wordId);

    public function delete($id);

    public function update($id, $data);
}
