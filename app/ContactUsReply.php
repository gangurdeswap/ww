<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsReply extends Model {

    protected $fillable = [
        'reply_text', 'contact_us_id',
    ];

    public function replies() {
        return $this->belongsTo('App\ContactUs', 'contact_us_id', 'id');
    }

}
