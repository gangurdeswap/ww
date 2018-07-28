<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model {

    protected $table = 'contact_us';
    protected $fillable = [
        'email', 'message',
    ];

    public function getEmailAttribute($value) {
        return decrypt($value);
    }

    public function setEmailAttribute($value) {

        $this->attributes['email'] = encrypt($value);
    }

    public function getMessageAttribute($value) {
        return decrypt($value);
    }

    public function setMessageAttribute($value) {
        $this->attributes['message'] = encrypt($value);
    }

    public function replies() {
        return $this->hasOne('App\ContactUsReply', 'contact_us_id', 'id');
    }

}
