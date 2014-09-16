<?php namespace MikeVrind\LaravelLanguage;

use Illuminate\Support\Facades\File;

class LanguageDoubles {

    /**
     * All unique language values
     *
     * @var array
     */
    protected $uniqueValues = [];

    /**
     * All double language values
     *
     * @var array
     */
    protected $doubleValues = [];

    public function __construct($scanLanguage) {

        foreach ( File::files(app_path('lang/'.$scanLanguage ) ) as $langFile )
        {
            if ( File::extension($langFile) == 'php' )
            {
                $this->scan_array(File::getRequire($langFile), pathinfo($langFile, PATHINFO_FILENAME));
            }
        }

    }

    private function scan_array(Array $data, $parentKey)
    {

        foreach ( $data as $arrKey => $arrValue )
        {

            if ( is_array ( $arrValue ) )
            {
                $this->scan_array($arrValue, $parentKey.'.'.$arrKey);
            }
            else
            {

                $languageKey = strtolower($parentKey.'.'.$arrKey);

                if ( array_key_exists($arrValue, $this->uniqueValues ) )
                {
                    $this->doubleValues[$arrValue][] = $languageKey;
                }
                else
                {
                    $this->uniqueValues[$arrValue] = $languageKey;
                }
            }

        }

    }

    public function getUniques() {
        return $this->uniqueValues;
    }

    public function getDoubles() {
        return $this->doubleValues;
    }


}