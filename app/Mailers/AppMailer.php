<?php

namespace App\Mailers;

use Illuminate\Contracts\Mail\Mailer;
use App\Models\User;
use App\Models\Vehicle;
use Log;
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
        $this->to = config('mail.from.address');
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
        $this->subject = 'Confirm Email Address';
        $this->view = 'emails.confirm';
        $this->data = compact('user');
        $this->deliver();
    }

    public function sendEmailChangeConfirmationTo(User $user)
    {
        $this->to = $user->email;
        $this->subject = 'Email Confirmation Change';
        $this->view = 'emails.change_email';
        $this->data = compact('user');
        $this->deliver();
    }

    public function sendPasswordChangeNotificationTo(User $user)
    {
        $this->to = $user->email;
        $this->subject = 'Password Changed';
        $this->view = 'emails.change_password';
        $this->data = compact('user');
        $this->deliver();
    }

    public function sendResetPasswordLinkTo(User $user)
    {
        $this->to = $user->email;
        $this->subject = 'Reset Password';
        $this->view = 'emails.reset_password';
        $this->data = compact('user');
        $this->deliver();
    }

    public function sendCreditApp($data)
    {
        $this->from = $data->email;
        $this->fromName = $data->name;
        $to_address = empty($data->dealer_email) ? config('mail.from.address'):$data->dealer_email;
        $this->to = $to_address;
        $this->subject = 'Credit Application';
        $this->view = 'emails.credit_app';
        $this->data = compact('data');
        $this->deliver();
    }

    public function sendContactForm($data)
    {
        $this->from = $data->email;
        $this->fromName = $data->name;
        $this->to = config('mail.from.address');
        $this->subject = 'Contact Form - '.$data->subject;
        $this->view = 'emails.contact_form';
        $this->data = compact('data');
        $this->deliver();
    }

    
    public function sendDealerContactForm($data)
    {
        $this->from = $data->email;
        $this->fromName = $data->name;
        $this->to = $data->dealer_email;
        $this->subject = 'Carsgone.com Vehicle Enquiry';
        $this->view = 'emails.dealer_contact_form';
        $this->data = compact('data');
        $this->deliver();
    }

    public function sendDealerFinanceForm($data, $vehicle)
    {
        $data->year = $vehicle->year;
        $data->make = $vehicle->make->make_name;
        $data->model = $vehicle->model->model_name;
        $data->price = $vehicle->price;
        $this->fromName = $data->name." via Carsgone";
        $this->to = $data->dealer_email;
        $this->subject = 'Carsgone.com Finance';
        $this->view = 'emails.dealer_finance_form';
        $this->data = compact('data');
        $this->deliver();
    }

    
    public function sendQuickFinanceForm($data)
    {
        $this->fromName = $data->name." via Carsgone";
        $this->subject = 'Carsgone.com Finance Callback';
        $this->view = 'emails.quick_credit_form';
        $this->data = compact('data');
        $this->deliver();
    }
    
    public function sendVehicleConfirmation($user, $vehicle)
    {
        $data['year'] = $vehicle->year;
        $data['make'] = $vehicle->make->make_name;
        $data['model'] = $vehicle->model->model_name;
        $data['price'] = $vehicle->price;
        $data['photo'] = $vehicle->photo();
        if(empty($data['photo']))
        {
            $data['photo'] = '/assets/images/placeholder.jpg';
        }
        $data['slug'] = $vehicle->slug;
        if(empty($user->token))
        {
            $user->token = str_random(30);
            $user->save();
        }
        $data['token'] = $user->token;
        $data['description'] = $vehicle->text;
        Log::info(url('/vehicle-confirm/').$data['slug'].'/'.$data['token']);
        $this->to = $user->email;
        $this->subject = 'Activate your Vehicle Ad';
        $this->view = 'emails.vehicle_confirm';
        $this->data = compact('data');
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