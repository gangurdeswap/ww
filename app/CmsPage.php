<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class CmsPage extends Model {

    protected $fillable = [
        'page_name',
    ];

    public function cmsLang() {
        return $this->hasOne('App\CmsPagesLang', 'cms_page_id', 'id')->where('lang_id', App::getLocale());
    }

}
