<?php

namespace App\Services;

use App\Exceptions\TrickyBugException;
use App\Exceptions\WrapperException;
use App\Exceptions\YourAwesomeException;

class YourOtherService
{
    public function processSlug(string $slug) {
        $this->doProcessSlug($slug);
    }

    private function doProcessSlug(string $slug) {
        $random = random_int(0, 3);
        if ($random == 0) {
            throw new YourAwesomeException($slug);
        }

        if ($random == 1) {
            throw new TrickyBugException($slug);
        }

        if ($random == 2) {
            $test = null;
            return $this->nullValue($test);
        }

        throw new WrapperException($slug, 0, new YourAwesomeException($slug));
    }

    private function nullValue(int $value) {

    }
}
