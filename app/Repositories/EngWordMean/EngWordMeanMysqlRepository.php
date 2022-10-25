<?php

namespace App\Repositories\EngWordMean;

use App\Repositories\EngWordMean\EngWordMeanRepositoryInterface;
use App\Models\EngWordMeanModel;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ValidationException;

class EngWordMeanMysqlRepository implements EngWordMeanRepositoryInterface
{
    public function save($data)
    {
        // Kiểm tra dữ liệu đầu vào
        $validator = Validator::make(
            $data,
            $rules = [
                'mean' => 'required',
                'example' => 'required',
                'word_id' => 'required',
                'type_word_id' => 'required',
            ],
            $messages = [
                'required' => 'Trường :attribute là trường bắt buộc',
            ]
        );

        if ($validator->fails()) {

            $error = $validator->errors();

            throw new ValidationException($error->messages(),);
        }

        $engWordMean = new EngWordMeanModel;

        $engWordMean->mean = trim($data['mean']);
        $engWordMean->example = trim($data['example']);
        $engWordMean->word_id = $data['word_id'];
        $engWordMean->type_word_id = $data['type_word_id'];
        $engWordMean->save();

        return $engWordMean;
    }

    public function get($data)
    {
    }

    public function delete($id)
    {
    }

    public function update($id, $data)
    {
    }
}
