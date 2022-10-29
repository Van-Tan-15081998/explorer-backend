<?php

namespace App\Services\Word;

use App\Repositories\Word\WordRepository;
use App\Repositories\Word\WordRepositoryInterface;
use Illuminate\Http\Request;
use App\Services\Pronounce\PronounceService;
use App\Services\Example\ExampleService;
use App\Services\ExampleByTypeWord\ExampleByTypeWordService;
use App\Services\WordMean\WordMeanService;
use Exception;
use App\Services\EngWordMean\EngWordMeanService;

use Illuminate\Support\Facades\Validator;
use App\Exceptions\ValidationException;

class WordService
{

    private $WordRepo;
    private $PronounceService;
    private $ExampleService;
    private $ExampleByTypeWordService;
    private $WordMeanService;
    private $EngWordMeanService;

    public function __construct(
        WordRepositoryInterface $WordRepo,
        PronounceService $PronounceService,
        ExampleService $ExampleService,
        ExampleByTypeWordService $ExampleByTypeWordService,
        WordMeanService $WordMeanService,
        EngWordMeanService $EngWordMeanService
    ) {
        $this->WordRepo = $WordRepo;
        $this->PronounceService = $PronounceService;
        $this->ExampleService = $ExampleService;
        $this->ExampleByTypeWordService = $ExampleByTypeWordService;
        $this->WordMeanService = $WordMeanService;
        $this->EngWordMeanService = $EngWordMeanService;
    }

    public function getAllWord()
    {
        $data = $this->WordRepo->getAllWord();
        $returnData = [];

        foreach ($data as $e) {
            if (!empty($e)) {
                $returnData[] = [
                    'id'        =>  $e->id,
                    'word'      =>  $e->word,
                    'popularity' =>  $e->popularity
                ];
            }
        }

        return $returnData;
    }

    public function getWordById($id)
    {
        $dataWord = $this->WordRepo->getWordById($id);
        $returnData = [];

        $dataWordExamples = $this->ExampleService->get($dataWord->id);
        // return $dataWordExamples;

        $dataWordPronounce = $this->PronounceService->get($dataWord->id);
        // return $dataWordPronounce;

        $dataVieWordMeanByTypeWords = $this->WordMeanService->getVieWordMeanByTypeWord($dataWord->id);
        // return $dataVieWordMeanByTypeWords;

        $dataEngWordMeanByTypeWords = $this->WordMeanService->getEngWordMeanByTypeWord($dataWord->id);
        // return $dataEngWordMeanByTypeWords;

        $dataWordMeanPopularity = $this->WordMeanService->getWordMeanPopularity($dataWord->id);
        // return $dataWordMeanPopularity;

        $dataEngWordMean = $this->EngWordMeanService->get($dataWord->id);
        // return $dataWordMeanPopularity;

        $returnData = [
            'id'        =>  $dataWord->id,
            'word'      =>  $dataWord->word,
            'popularity' =>  $dataWord->popularity,
            'word_mean_popularity' => $dataWordMeanPopularity,
            'examples'  => $dataWordExamples,
            'pronounce' => $dataWordPronounce,
            'vie_word_mean_by_type_word' => $dataVieWordMeanByTypeWords,
            'eng_word_mean_by_type_word' => $dataEngWordMeanByTypeWords,
            'eng_word_mean'  => $dataEngWordMean
        ];

        return $returnData;
    }

    public function getWordPaginate($condition)
    {

        $totalWordCount = $this->WordRepo->getTotalWordCount();

        if ($condition['page'] === null) {
            $condition['page'] = 0;
        }
        if ($condition['page'] < 0) {
            return [];
        }

        $data = $this->WordRepo->getWordPaginate($condition);

        $returnData = [];

        $returnData['total_word_count'] = intval($totalWordCount);

        foreach ($data as $e) {
            if (!empty($e)) {
                $returnData['data_word'][] = [
                    'id'        =>  $e['id'],
                    'word'      =>  $e['word'],
                    'popularity' =>  $e['popularity'],
                    'pronounce' =>  $e->pronounce == null ? new \stdClass() : $e->pronounce,
                    'mean'      =>  $e->mean == null ? new \stdClass() : $e->mean,
                ];
            }
        }

        return $returnData;
    }

    public function save(Request $request)
    {
        $data = $request->all();

        $returnData = null;

        // Kiểm tra dữ liệu đầu vào ban đầu
        $validator = Validator::make(
            $data,
            $rules = [
                'word' => 'required|unique:words,word',
                'popularity' => 'required',
                'us' => 'required',
                'uk' => 'required',
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

        if ($word = $this->WordRepo->save($data)) {

            if ($pronounce = $this->PronounceService->save($request, $word->id)) {

                $returnData = [
                    'id'    => $word->id,
                    'word'  =>  $word->word,
                    'popularity' =>  $word->popularity,
                    'us' => $pronounce['us'],
                    'uk' => $pronounce['uk'],
                ];
            }
        }

        return $returnData;
    }

    public function updateWord(Request $request)
    {
        $data = $this->WordRepo->updateWord($request->input('id'), $request);
        if ($data != false) {
            $returnData = new \stdClass();
            $returnData->title = $request->input('word');

            return $returnData;
        } else {
            throw new \Exception('Can\'t update word');
        }
    }

    public function deleteWord(Request $request)
    {
        $data = $this->WordRepo->deleteWord($request->id);
        return $data;
    }

    public function saveExample(Request $request)
    {
        return $this->ExampleService->save($request);
    }

    public function saveVieWordMeanByTypeWord(Request $request)
    {
        $returnData = null;

        $wordMeanByTypeWords = $request->word_mean_by_type_words;

        foreach ($wordMeanByTypeWords as $wordMeanByTypeWord) {

            if ($wordMean = $this->WordMeanService->saveVieWordMeanByTypeWord($wordMeanByTypeWord)) {
                $examples = $wordMeanByTypeWord['examples'];

                if (is_array($examples) && count($examples) > 0) {
                    if ($wordMeanByTypeWordExamples = $this->ExampleByTypeWordService->saveVie($examples, $wordMean['id'])) {
                        $returnData[] = [
                            'word_mean_by_type_word' => $wordMean,
                            'examples' => $wordMeanByTypeWordExamples
                        ];
                    }
                }
            }
        }

        return $returnData;
    }

    public function saveEngWordMeanByTypeWord(Request $request)
    {
        $returnData = null;

        $wordMeanByTypeWords = $request->word_mean_by_type_words;

        foreach ($wordMeanByTypeWords as $wordMeanByTypeWord) {

            if ($wordMean = $this->WordMeanService->saveEngWordMeanByTypeWord($wordMeanByTypeWord)) {
                $examples = $wordMeanByTypeWord['examples'];

                if (is_array($examples) && count($examples) > 0) {
                    if ($wordMeanByTypeWordExamples = $this->ExampleByTypeWordService->saveEng($examples, $wordMean['id'])) {
                        $returnData[] = [
                            'word_mean_by_type_word' => $wordMean,
                            'examples' => $wordMeanByTypeWordExamples
                        ];
                    }
                }
            }
        }

        return $returnData;
    }

    public function saveWordMeanPopularity(Request $request)
    {
        return $this->WordMeanService->saveWordMeanPopularity($request);
    }

    public function saveEngWordMean(Request $request)
    {
        return $this->EngWordMeanService->save($request);
    }

    public function saveExampleToVieWordMeanByTypeWord(Request $request)
    {
        return $this->ExampleByTypeWordService->saveVieSingle($request);
    }

    public function saveExampleToEngWordMeanByTypeWord(Request $request)
    {
        return $this->ExampleByTypeWordService->saveEngSingle($request);
    }

    public function deleteExampleOfVieWordMeanByTypeWord(Request $request)
    {
        return $this->ExampleByTypeWordService->delete($request);
    }

    public function deleteExampleOfEngWordMeanByTypeWord(Request $request)
    {
        return $this->ExampleByTypeWordService->delete($request);
    }

    public function updateVieWordMeanByTypeWord(Request $request)
    {
        return $this->WordMeanService->updateVieWordMeanByTypeWord($request);
    }
    public function deleteVieWordMeanByTypeWord(Request $request)
    {
        return $this->WordMeanService->deleteVieWordMeanByTypeWord($request);
    }
    public function updateEngWordMeanByTypeWord(Request $request)
    {
        return $this->WordMeanService->updateEngWordMeanByTypeWord($request);
    }
    public function deleteEngWordMeanByTypeWord(Request $request)
    {
        return $this->WordMeanService->deleteEngWordMeanByTypeWord($request);
    }
}
