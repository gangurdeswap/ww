<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;

class SendWelcomeEmail implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $email;

    public function __construct($email) {
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public static function fromRequest($email) {
        return new static(
                $email
        );
    }

    public function handle() {
        $data = array();
        Mail::to($this->email, array())->send(new \App\Mail\TestEmail($data));
    }

}
