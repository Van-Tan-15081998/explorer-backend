<?php

namespace App\Repositories\Pronounce;

use App\Repositories\Pronounce\PronounceRepositoryInterface;
use App\Models\PronounceModel;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ValidationException;

class PronounceMysqlRepository implements PronounceRepositoryInterface
{

    public function save($data, $word_id)
    {
        // Kiểm tra dữ liệu đầu vào
        $validator = Validator::make(
            $data,
            $rules = [
                'us' => 'required',
                'uk' => 'required',
            ],
            $messages = [
                'required' => 'Trường :attribute là trường bắt buộc',
            ]
        );

        if ($validator->fails()) {

            $error = $validator->errors();

            throw new ValidationException($error->messages(),);
        }

        $pronounce = PronounceModel::updateOrCreate(
            ['word_id' => $word_id],
            [
                'us' => trim($data['us']),
                'uk' => trim($data['uk'])
            ],
        );

        return $pronounce;
    }

    public function get($wordId)
    {
        $pronounce = PronounceModel::select('*')->where('word_id', $wordId)->first()->toArray();

        $returnData = null;

        // dd($pronounce);

        $returnData = [
            'id' => $pronounce['id'],
            'us' => $pronounce['us'],
            'uk' => $pronounce['uk']
        ];

        return $returnData;
    }

    public function delete($id)
    {
    }

    public function update($id, $data)
    {
    }
}
