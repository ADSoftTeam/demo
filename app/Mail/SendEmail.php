<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
    
	public $data;	

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
		$this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.feedback')		
                ->with([                  
                  'data' => $this->data,
                ])		
            ->subject("Обращение в техподдержку №{$this->data->id}")
			->from($this->data->email);
    }
}