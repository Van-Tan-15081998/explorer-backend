<?php

namespace App\Repositories\ExampleByTypeWord;

use App\Repositories\ExampleByTypeWord\ExampleByTypeWordRepositoryInterface;
use App\Models\ExampleByTypeWordModel;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ValidationException;

class ExampleByTypeWordMysqlRepository implements ExampleByTypeWordRepositoryInterface
{
    public function saveEng($data, $wordMeanId)
    {
        // Kiểm tra dữ liệu đầu vào
        $validator = Validator::make(
            $data,
            $rules = [
                'example' => 'required',
                'type_word_id' => 'required',
                'word_id' => 'required',
            ],
            $messages = [
                'required' => 'Trường :attribute là trường bắt buộc',
            ]
        );

        if ($validator->fails()) {

            $error = $validator->errors();

            throw new ValidationException($error->messages(),);
        }

        $example = new ExampleByTypeWordModel;

        $example->example = trim($data['example']);
        $example->word_id = $data['word_id'];
        $example->type_word_id = $data['type_word_id'];
        $example->word_mean_id = $wordMeanId;
        $example->save();

        return $example;
    }

    public function saveVie($data, $wordMeanId)
    {
        // Kiểm tra dữ liệu đầu vào
        $validator = Validator::make(
            $data,
            $rules = [
                'example' => 'required',
                'type_word_id' => 'required',
                'word_id' => 'required',
            ],
            $messages = [
                'required' => 'Trường :attribute là trường bắt buộc',
            ]
        );

        if ($validator->fails()) {

            $error = $validator->errors();

            throw new ValidationException($error->messages(),);
        }

        $example = new ExampleByTypeWordModel;

        $example->example = trim($data['example']);
        $example->word_id = $data['word_id'];
        $example->type_word_id = $data['type_word_id'];
        $example->word_mean_id = $wordMeanId;
        $example->is_vie_mean = true;
        $example->save();

        return $example;
    }

    public function getVie($wordId, $typeWordId, $wordMeanId)
    {
        $examples = ExampleByTypeWordModel::select('*')
            ->where(
                [
                    ['word_id', '=', $wordId],
                    ['type_word_id', '=', $typeWordId],
                    ['is_vie_mean', '=', 1],
                    ['word_mean_id', '=', $wordMeanId],
                ]
            )->get()->toArray();

        $returnData = [];

        if (count($examples) > 0) {
            foreach ($examples as $example) {
                $returnData[] = [
                    'id' => $example['id'],
                    'example' => $example['example'],
                    'word_id' => $example['word_id'],
                    'type_word_id' => $example['type_word_id'],
                    'is_vie_mean' => $example['is_vie_mean'],
                    'word_mean_id' => $example['word_mean_id'],
                ];
            }
        }

        return $returnData;
    }

    public function getEng($wordId, $typeWordId, $wordMeanId)
    {
        $examples = ExampleByTypeWordModel::select('*')
            ->where(
                [
                    ['word_id', '=', $wordId],
                    ['type_word_id', '=', $typeWordId],
                    ['is_vie_mean', '=', 0],
                    ['word_mean_id', '=', $wordMeanId],
                ]
            )->get()->toArray();

        $returnData = [];

        if (count($examples) > 0) {
            foreach ($examples as $example) {
                $returnData[] = [
                    'id' => $example['id'],
                    'example' => $example['example'],
                    'word_id' => $example['word_id'],
                    'type_word_id' => $example['type_word_id'],
                    'is_vie_mean' => $example['is_vie_mean'],
                    'word_mean_id' => $example['word_mean_id'],
                ];
            }
        }

        return $returnData;
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
