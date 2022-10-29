<?php

namespace App\Http\Controllers\Word;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Word\WordService;
use App\Services\Example\ExampleService;
use App\Services\ExampleByTypeWord\ExampleByTypeWordService;
use App\Models\TypeWordModel;

use App\Http\Requests\WordRequest;
use App\Http\Requests\WordMeanRequest;
use App\Http\Requests\ExampleRequest;
use App\Http\Requests\ExampleByTypeWordRequest;
use App\Http\Requests\EngWordMeanRequest;
use App\Http\Requests\WordMeanByTypeWordRequest;

use App\Exceptions\ValidationException;

class WordController extends Controller
{
    //
    private $WordService;
    private $ExampleService;
    private $ExampleByTypeWordService;

    public function __construct(
        WordService $WordService,
        ExampleService $ExampleService,
        ExampleByTypeWordService $ExampleByTypeWordService
    ) {
        $this->WordService    = $WordService;
        $this->ExampleService = $ExampleService;
        $this->ExampleByTypeWordService = $ExampleByTypeWordService;
    }

    public function getAll()
    {
        try {
            $data = $this->WordService->getAllWord();

            // return $this->sentResponseSuccessful($data);
            return response()->json($this->sentResponseSuccessful($data));
        } catch (\Exception $e) {
            return $this->sentResponseFail(100, $e->getMessage(), null);
        }
    }

    public function getWordById(Request $request)
    {
        try {

            $data = $this->WordService->getWordById($request->id);

            return $this->sentResponseSuccessful($data);
        } catch (\Exception $e) {

            return $this->sentResponseFail(100, $e->getMessage(), null);
        }
    }

    public function getWordPaginate(Request $request)
    {
        try {

            $data = $this->WordService->getWordPaginate($request);

            return $this->sentResponseSuccessful($data);
        } catch (\Exception $e) {

            return $this->sentResponseFail(100, $e->getMessage(), null);
        }
    }

    public function getTypeWord()
    {
        $typeWord = TypeWordModel::select('*')->get()->toArray();
        return $this->sentResponseSuccessful($typeWord);
    }

    public function save(Request $request)
    {
        try {

            $word = $this->WordService->save($request);

            return $this->sentResponseSuccessful($word);
        } catch (ValidationException $e) {

            return response()->json($this->sentResponseFail(1, $e->getValidationErrors(), null));
        } catch (\Exception $e) {

            return $this->sentResponseFail(100, $e->getMessage(), null);
        }
    }

    public function update(Request $request)
    {

        return $this->WordService->updateWord($request);
    }

    public function delete(Request $request)
    {
        $msgDeleteSuccess = "Delete word successfully";

        try {

            $delete = $this->WordService->deleteWord($request);
            return response()->json($this->sentResponseSuccessful($msgDeleteSuccess));
        } catch (\Exception $e) {

            return response()->json($this->sentResponseFail(1, $e->getMessage(), null));
        }
    }

    public function saveExample(Request $request)
    {
        try {
            $examples = $this->WordService->saveExample($request);
            return response()->json($this->sentResponseSuccessful($examples));
        } catch (ValidationException $e) {

            return response()->json($this->sentResponseFail(1, $e->getValidationErrors(), null));
        } catch (\Exception $e) {

            return response()->json($this->sentResponseFail(1, $e->getMessage(), null));
        }
    }

    public function saveVieWordMeanByTypeWord(WordMeanByTypeWordRequest $request)
    {
        try {
            $examples = $this->WordService->saveVieWordMeanByTypeWord($request);
            return response()->json($this->sentResponseSuccessful($examples));
        } catch (ValidationException $e) {

            return response()->json($this->sentResponseFail(1, $e->getValidationErrors(), null));
        } catch (\Exception $e) {

            return response()->json($this->sentResponseFail(1, $e->getMessage(), null));
        }
    }

    public function saveEngWordMeanByTypeWord(WordMeanByTypeWordRequest $request)
    {
        try {
            $examples = $this->WordService->saveEngWordMeanByTypeWord($request);
            return response()->json($this->sentResponseSuccessful($examples));
        } catch (ValidationException $e) {

            return response()->json($this->sentResponseFail(1, $e->getValidationErrors(), null));
        } catch (\Exception $e) {

            return response()->json($this->sentResponseFail(1, $e->getMessage(), null));
        }
    }

    public function saveEngWordMean(Request $request)
    {
        try {
            $engWordMean = $this->WordService->saveEngWordMean($request);
            return response()->json($this->sentResponseSuccessful($engWordMean));
        } catch (ValidationException $e) {

            return response()->json($this->sentResponseFail(1, $e->getValidationErrors(), null));
        } catch (\Exception $e) {

            return response()->json($this->sentResponseFail(1, $e->getMessage(), null));
        }
    }

    public function saveWordMeanPopularity(Request $request)
    {
        try {
            $wordMean = $this->WordService->saveWordMeanPopularity($request);
            return response()->json($this->sentResponseSuccessful($wordMean));
        } catch (ValidationException $e) {

            return response()->json($this->sentResponseFail(1, $e->getValidationErrors(), null));
        } catch (\Exception $e) {

            return response()->json($this->sentResponseFail(1, $e->getMessage(), null));
        }
    }

    public function saveExampleToVieWordMeanByTypeWord(Request $request)
    {
        try {
            $wordMean = $this->WordService->saveExampleToVieWordMeanByTypeWord($request);
            return response()->json($this->sentResponseSuccessful($wordMean));
        } catch (ValidationException $e) {

            return response()->json($this->sentResponseFail(1, $e->getValidationErrors(), null));
        } catch (\Exception $e) {

            return response()->json($this->sentResponseFail(1, $e->getMessage(), null));
        }
    }

    public function saveExampleToEngWordMeanByTypeWord(Request $request)
    {
        try {
            $wordMean = $this->WordService->saveExampleToEngWordMeanByTypeWord($request);
            return response()->json($this->sentResponseSuccessful($wordMean));
        } catch (ValidationException $e) {

            return response()->json($this->sentResponseFail(1, $e->getValidationErrors(), null));
        } catch (\Exception $e) {

            return response()->json($this->sentResponseFail(1, $e->getMessage(), null));
        }
    }

    public function deleteExampleOfVieWordMeanByTypeWord(Request $request)
    {
        try {
            $wordMean = $this->WordService->deleteExampleOfVieWordMeanByTypeWord($request);
            return response()->json($this->sentResponseSuccessful($wordMean));
        } catch (ValidationException $e) {

            return response()->json($this->sentResponseFail(1, $e->getValidationErrors(), null));
        } catch (\Exception $e) {

            return response()->json($this->sentResponseFail(1, $e->getMessage(), null));
        }
    }

    public function deleteExampleOfEngWordMeanByTypeWord(Request $request)
    {
        try {
            $wordMean = $this->WordService->deleteExampleOfEngWordMeanByTypeWord($request);
            return response()->json($this->sentResponseSuccessful($wordMean));
        } catch (ValidationException $e) {

            return response()->json($this->sentResponseFail(1, $e->getValidationErrors(), null));
        } catch (\Exception $e) {

            return response()->json($this->sentResponseFail(1, $e->getMessage(), null));
        }
    }

    public function updateVieWordMeanByTypeWord(Request $request)
    {
        try {
            $wordMean = $this->WordService->updateVieWordMeanByTypeWord($request);
            return response()->json($this->sentResponseSuccessful($wordMean));
        } catch (ValidationException $e) {

            return response()->json($this->sentResponseFail(1, $e->getValidationErrors(), null));
        } catch (\Exception $e) {

            return response()->json($this->sentResponseFail(1, $e->getMessage(), null));
        }
    }
    public function updateEngWordMeanByTypeWord(Request $request)
    {
        try {
            $wordMean = $this->WordService->updateEngWordMeanByTypeWord($request);
            return response()->json($this->sentResponseSuccessful($wordMean));
        } catch (ValidationException $e) {

            return response()->json($this->sentResponseFail(1, $e->getValidationErrors(), null));
        } catch (\Exception $e) {

            return response()->json($this->sentResponseFail(1, $e->getMessage(), null));
        }
    }
    public function deleteVieWordMeanByTypeWord(Request $request)
    {
        try {
            $wordMean = $this->WordService->deleteVieWordMeanByTypeWord($request);
            return response()->json($this->sentResponseSuccessful($wordMean));
        } catch (ValidationException $e) {

            return response()->json($this->sentResponseFail(1, $e->getValidationErrors(), null));
        } catch (\Exception $e) {

            return response()->json($this->sentResponseFail(1, $e->getMessage(), null));
        }
    }
    public function deleteEngWordMeanByTypeWord(Request $request)
    {
        try {
            $wordMean = $this->WordService->deleteEngWordMeanByTypeWord($request);
            return response()->json($this->sentResponseSuccessful($wordMean));
        } catch (ValidationException $e) {

            return response()->json($this->sentResponseFail(1, $e->getValidationErrors(), null));
        } catch (\Exception $e) {

            return response()->json($this->sentResponseFail(1, $e->getMessage(), null));
        }
    }
}
