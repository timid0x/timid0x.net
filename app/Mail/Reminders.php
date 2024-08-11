<?php
### TIMID0x - 2023-08-29T12:36:22.000-05:00
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class Reminders extends Mailable
{
    use Queueable, SerializesModels;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $today = Carbon::now()->format('M/Y');
           
        return $this->subject('Reminder ' . $today . ' - TL50data ')
            ->view('mails.reminder');
    }
}
