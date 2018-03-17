<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function showPerLang($lang)
    {
        return Translation::getTranslationsForLocale($lang);
    }

    public function index()
    {
        return Translation::all();
    }

    public function show($id)
    {
        return $this->getOrfail($id);
    }

    public function update(Request $r, $id)
    {
        $translation = $this->getOrfail($id);
        $translation->fill($r->all());
        $translation->save();

        return $translation;
    }

    /**
     * @param $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $translation = $this->getOrfail($id);
        $translation->delete();

        return response()->json(true);
    }

    protected function getOrfail($id): Translation
    {
        return Translation::findOrFail($id);
    }
}
