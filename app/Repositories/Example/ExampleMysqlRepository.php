<?php

namespace App\Repositories\Example;

use App\Repositories\Example\ExampleRepositoryInterface;
use App\Models\ExampleModel;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ValidationException;
use Illuminate\Validation\Rule;

class ExampleMysqlRepository implements ExampleRepositoryInterface
{
    public function save($data)
    {
        // Kiểm tra dữ liệu đầu vào
        $validator = Validator::make(
            $data,
            $rules = [
                // Không cho phép trùng lập ví dụ cùng với id của từ vựng
                'example' => ['required', Rule::unique('examples')->where(function ($query) use ($data) {
                    return $query->where('example', $data['example'])
                        ->where('word_id', $data['word_id']);
                })],
                'word_id' => 'required',
            ],
            $messages = [
                'required' => 'Trường :attribute là trường bắt buộc',
                'unique' => 'Đã tồn tại :attribute trong Database'
            ]
        );

        if ($validator->fails()) {

            $error = $validator->errors();

            throw new ValidationException($error->messages(),);
        }

        $example = new ExampleModel;

        $example->example = trim($data['example']);
        $example->word_id = $data['word_id'];
        $example->save();

        return $example;
    }

    public function get($wordId)
    {
        $examples = ExampleModel::select('*')->where('word_id', $wordId)->get()->toArray();

        $returnData = [];

        if (count($examples) > 0) {
            foreach ($examples as $example) {
                $returnData[] = [
                    'id' => $example['id'],
                    'example' => $example['example'],
                    'word_id' => $example['word_id'],
                ];
            }
        }

        return $returnData;
    }

    public function delete($id)
    {
    }

    public function update($id, $data)
    {
    }
}
