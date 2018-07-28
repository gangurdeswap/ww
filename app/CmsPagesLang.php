<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsPagesLang extends Model {

    protected $fillable = [
        'cms_page_id', 'page_title', 'page_content', 'lang_id'
    ];

    public function getCms() {
        return $this->belongsTo('App\CmsPage', 'cms_page_id', 'id');
    }

}
