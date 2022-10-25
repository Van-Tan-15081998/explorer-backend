<?php

namespace App\Repositories\WordMean;

use App\Repositories\WordMean\WordMeanRepositoryInterface;
use App\Models\WordMeanModel;
use Exception;
use Illuminate\Support\Facades\Validator;

use App\Exceptions\ValidationException;

class WordMeanMysqlRepository implements WordMeanRepositoryInterface
{

    public function saveVieWordMean($data)
    {
        $wordMean = null;

        // Kiểm tra dữ liệu đầu vào
        $validator = Validator::make(
            $data,
            $rules = [
                'mean' => 'required',
                'word_id' => 'required',
                'type_word_id' => 'required',
            ],
            $messages = [
                'required' => 'Trường :attribute là trường bắt buộc',
            ]
        );

        if ($validator->fails()) {

            $error = $validator->errors();

            throw new ValidationException($error->messages());
        }

        $canDuplicate = true; // Có thể tạo nhiều nghĩa cho một loại từ

        if ($canDuplicate) {
            $wordMean = new WordMeanModel;

            $wordMean->mean = trim($data['mean']);
            $wordMean->word_id = $data['word_id'];
            $wordMean->type_word_id = $data['type_word_id'];
            $wordMean->is_vie_mean = true;
            $wordMean->save();
        } else {
            $wordMean = WordMeanModel::updateOrCreate(
                ['type_word_id' => $data['type_word_id']], // Nếu đã tồn tại -> update
                [
                    'word_id' => $data['word_id'], // Tham số được set cả khi create hay update 
                    'mean' => $data['mean'], // Tham số được set cả khi create hay update 
                    'is_vie_mean' => true
                ],
            );
        }

        return $wordMean;
    }

    public function saveEngWordMean($data)
    {
        $wordMean = null;

        // Kiểm tra dữ liệu đầu vào
        $validator = Validator::make(
            $data,
            $rules = [
                'mean' => 'required',
                'word_id' => 'required',
                'type_word_id' => 'required',
            ],
            $messages = [
                'required' => 'Trường :attribute là trường bắt buộc',
            ]
        );

        if ($validator->fails()) {

            $error = $validator->errors();

            throw new ValidationException($error->messages());
        }

        $canDuplicate = true; // Có thể tạo nhiều nghĩa cho một loại từ

        if ($canDuplicate) {
            $wordMean = new WordMeanModel;

            $wordMean->mean = trim($data['mean']);
            $wordMean->word_id = $data['word_id'];
            $wordMean->type_word_id = $data['type_word_id'];
            $wordMean->save();
        } else {
            $wordMean = WordMeanModel::updateOrCreate(
                ['type_word_id' => $data['type_word_id']], // Nếu đã tồn tại -> update
                [
                    'word_id' => $data['word_id'], // Tham số được set cả khi create hay update 
                    'mean' => $data['mean'] // Tham số được set cả khi create hay update 
                ],
            );
        }

        return $wordMean;
    }

    public function saveWordMeanPopularity($data)
    {
        $wordMean = null;

        // Kiểm tra dữ liệu đầu vào
        $validator = Validator::make(
            $data,
            $rules = [
                'mean' => 'required',
                'word_id' => 'required',
                'is_popularity' => 'required',
            ],
            $messages = [
                'required' => 'Trường :attribute là trường bắt buộc',
            ]
        );

        if ($validator->fails()) {

            $error = $validator->errors();

            throw new ValidationException($error->messages());
        }

        $wordMean = WordMeanModel::updateOrCreate(
            ['word_id' => $data['word_id']],
            [
                'mean' => trim($data['mean']),
                'is_popularity' => $data['is_popularity']
            ],
        );

        return $wordMean;
    }

    public function getVie($wordId)
    {
        $returnData = [];

        $wordMeans = WordMeanModel::select('*')
            ->where(
                [
                    ['word_id', '=', $wordId],
                    ['is_vie_mean', '=', 1],
                    ['is_popularity', '=', 0]
                ]
            )->get();

        if (count($wordMeans) > 0) {
            foreach ($wordMeans as $wordMean) {
                $returnData[] = [
                    'id' => $wordMean['id'],
                    'word_id' => $wordMean['word_id'],
                    'mean' => $wordMean['mean'],
                    'type_word_id' => $wordMean['type_word_id'],
                    'is_vie_mean' => $wordMean['is_vie_mean'],
                    'examples' => [],
                ];
            }
        }

        return $returnData;
    }

    public function getEng($wordId)
    {
        $returnData = [];

        $wordMeans = WordMeanModel::select('*')
            ->where(
                [
                    ['word_id', '=', $wordId],
                    ['is_vie_mean', '=', 0],
                    ['is_popularity', '=', 0]
                ]
            )->get();

        if (count($wordMeans) > 0) {
            foreach ($wordMeans as $wordMean) {
                $returnData[] = [
                    'id' => $wordMean['id'],
                    'word_id' => $wordMean['word_id'],
                    'mean' => $wordMean['mean'],
                    'type_word_id' => $wordMean['type_word_id'],
                    'is_vie_mean' => $wordMean['is_vie_mean'],
                    'examples' => [],
                ];
            }
        }

        return $returnData;
    }

    public function deleteWordMean($id)
    {
    }

    public function updateWordMean($id, $data)
    {
    }
}
