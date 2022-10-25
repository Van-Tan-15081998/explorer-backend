<?php

namespace App\Repositories\Word;

use App\Repositories\Word\WordRepositoryInterface;
use App\Models\WordModel;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ValidationException;

class WordMysqlRepository implements WordRepositoryInterface
{

    public function save($data)
    {
        // Kiểm tra dữ liệu đầu vào
        $validator = Validator::make(
            $data,
            $rules = [
                'word' => 'required|unique:words,word',
                'popularity' => 'required',
            ],
            $messages = [
                'required' => 'Trường :attribute là trường bắt buộc',
                'unique' => 'Đã tồn tại :attribute trong Database'
            ]
        );

        if ($validator->fails()) {

            $error = $validator->errors();

            throw new ValidationException($error->messages());
        }

        $word = new WordModel;

        $word->word = trim($data['word']);
        $word->popularity = $data['popularity'];

        $word->save();

        return $word;
    }

    public function getAllWord()
    {
        return WordModel::select('*')->get();
    }

    public function getWordById($id)
    {
        $word = WordModel::find($id);
        if ($word == []) {
            throw new \Exception('Don\'t have message id: ' . $id . '.');
        }

        return $word;
    }

    public function getWord($id)
    {
        return 101;
    }

    public function getTotalWordCount()
    {
        $totalWordCount = WordModel::count();
        return $totalWordCount;
    }

    public function getWordPaginate($data)
    {
        $limit  = 40;
        $offset = (int) $data['page'];

        return WordModel::select('*')
            ->offset(($offset - 1) * $limit)
            ->limit($limit)
            ->get();
    }

    public function deleteWord($id)
    {
        $word = WordModel::find($id);
        if ($word == []) {
            throw new \Exception('Don\'t have message id: ' . $id . '.');
        }

        return $word->delete();
    }

    public function updateWord($id, $data)
    {
        $word = WordModel::find($id);
        if ($word == []) {
            throw new \Exception('Don\'t have message id: ' . $id . '.');
        }

        $word->fill($data->all())
            ->save();

        return $word;
    }
}
