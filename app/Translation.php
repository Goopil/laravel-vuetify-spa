<?php

namespace App;

use Spatie\TranslationLoader\LanguageLine;

/**
 * Class Translation
 * @package App
 * @mixin \Eloquent
 */
class Translation extends LanguageLine
{
    protected $table = 'language_lines';

    public static function boot()
    {
        parent::boot();
        static::saved(function (Translation $languageLine) {
            $languageLine->flushCollectionCache();
        });

        static::deleted(function (Translation $languageLine) {
            $languageLine->flushCollectionCache();
        });
    }


    public static function getCacheKeyForCollection(string $locale): string
    {
        return "spatie.translation-loader.all.{$locale}";
    }

    public static function getTranslationsForLocale(string $locale): array
    {
        return \Cache::rememberForever(static::getCacheKeyForCollection($locale), function () use ($locale) {
            return static::query()->get()
                    ->reduce(function ($lines, LanguageLine $languageLine) use ($locale) {
                        array_set($lines, $languageLine->group . '.' . $languageLine->key, $languageLine->getTranslation($locale));

                        return $lines;
                    }) ?? [];
        });
    }

    public function flushCollectionCache()
    {
        foreach ($this->getTranslatedLocales() as $locale) {
            \Cache::forget(static::getCacheKeyForCollection($locale));
        }
    }

}
