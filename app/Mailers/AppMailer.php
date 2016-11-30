<?php

namespace App\Mailers;

use Illuminate\Contracts\Mail\Mailer;
use App\Models\User;

class AppMailer
{
    /**
     * The Laravel Mailer instance.
     *
     * @var Mailer
     */
    protected $mailer;
    /**
     * Admin Email
     *
     * @var string
     */
    protected $fromName;
    /**
     * The sender of the email.
     *
     * @var string
     */
    protected $from;
    /**
     * The recipient of the email.
     *
     * @var string
     */
    protected $to;
    /**
     * The view for the email.
     *
     * @var string
     */
    protected $view;
    /**
     * The data associated with the view for the email.
     *
     * @var array
     */
    protected $data = [];
    /**
     * Create a new app mailer instance.
     *
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
        $this->from = config('mail.from.address');
        $this->fromName = config('mail.from.name');
    }
    /**
     * EXAMPLE
     * Deliver the email confirmation.
     *
     * @param  User $user
     * @return void
     */
    public function sendEmailConfirmationTo(User $user)
    {
        $this->to = $user->email;
        $this->subject = 'Subject Name';
        $this->view = 'emails.confirm';
        $this->data = compact('user');
        $this->deliver();
    }
    /**
     * Deliver the email.
     *
     * @return void
     */
    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function ($message) {
            $message->from($this->from, $this->fromName)
                ->subject($this->subject)
                ->to($this->to);
        });
    }
}