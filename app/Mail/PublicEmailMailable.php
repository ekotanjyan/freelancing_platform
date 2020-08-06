<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\EmailHelper;
use App\SiteManagement;

class PublicEmailMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Setting scope of the variables
     *
     * @access public
     *
     * @var string $type
     *
     * @var collection $template
     *
     * @var array $email_params
     *
     */
    public $type;
    public $template;
    public $email_params;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($type, $template, $email_params = array())
    {
        $this->type = $type;
        $this->template = $template;
        $this->email_params = $email_params;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from_email = EmailHelper::getEmailFrom();
        $from_email_id = EmailHelper::getEmailID();
        $subject = !empty($this->template->subject) ? $this->template->subject : '';
        $email_message = '';

        if ($this->type == 'contact_us') {
            $email_message = $this->prepareContactUs($this->email_params);
        }

        $message = $this->from($from_email, $from_email_id)
            ->subject($subject)->view('emails.index')
            ->with(['html' => $email_message]);

        return $message;
    }

    /**
     * Proposal submitted
     *
     * @param array $email_params Email Parameters
     *
     * @access public
     *
     * @return string
     */
    public function prepareContactUs($email_params)
    {
        extract($email_params);

        $signature = EmailHelper::getSignature();

        $app_content = "CONACT US new request,<br>
                      <strong>Name</strong>: %name%<br>
                      <strong>Subject</strong>: %subject%<br>
                      <strong>Email</strong>: %email%<br>
                      <strong>Message</strong>: %message%<br>

                      %signature%,";

        $app_content = str_replace("%name%", $name, $app_content);
        $app_content = str_replace("%subject%", $subject, $app_content);
        $app_content = str_replace("%email%", $email, $app_content);
        $app_content = str_replace("%message%", $message, $app_content);
        $app_content = str_replace("%signature%", $signature, $app_content);

        $body = EmailHelper::getEmailHeader();
        $body .= $app_content;
        $body .= EmailHelper::getEmailFooter();
        return $body;
    }
}
