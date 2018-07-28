<?php

namespace App\Helpers;

class AdminConstant {

    /**
     * @param int $user_id User-id
     *
     * @return string
     */
    public static function getC($word) {

        $msg = \Illuminate\Support\Facades\Config::get('constants.' . $word);

        return $msg;
    }

}
