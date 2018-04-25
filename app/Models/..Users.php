<?php

namespace App\Models;

use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable 
{
	use Notifiable;
	
	$user = DB::table('Users')->where('id',9)->get();

	
	//$user->notify(new InvoicePaid($invoice));	
	$when = Carbon::now()->addMinutes(10);
	Notification::send($user, new InvoicePaid($invoice))->delay($when));
	
	
	 public function routeNotificationForMail()
    {
        return $this->email;
    }
	
}
