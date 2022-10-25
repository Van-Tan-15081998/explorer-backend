<?php

namespace App\Repositories\Example;

interface ExampleRepositoryInterface
{

    public function save($data);

    public function get($wordId);

    public function delete($id);

    public function update($id, $data);
}
