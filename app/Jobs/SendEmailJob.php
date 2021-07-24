<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\ReleaseVideo;
use App\Courses;
use Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $send_mail;
    protected $course_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($send_mail)
    {
        $this->send_mail = $send_mail;
        // $this->course_id = $course_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   

        // $course = Courses::where('course_id', $this->course_id)->first();

        $details = [

            'title' => "Return On Investment Kepada Bisnes",
            'description' => "Bahaya kalau sales jutaan ringgit setahun tapi bila tanya berapa saving terus geleng kepala. Ini sebab Return On Investment (ROI) penting dalam bisnes.",
            'image' => "arb-februari.jpg"

        ];   

        Mail::to($this->send_mail)->send(new ReleaseVideo());
    }
}
