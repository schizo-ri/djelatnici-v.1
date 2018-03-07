<?php

namespace App\Console\Commands;

use Mail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:Rodjendan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rođendan djelatnika';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $djelatnici = Employee::whereMonth('datum_rodjenja', '=', date('m'))->whereDay('datum_rodjenja', '=', date('d'))->get();
 
		foreach($djelatnici as $djelatnik) {
	 
			// Create a unique 8 character promo code for user
		//	$new_promo_code = new PromoCode([
		//		'promo_code' => str_random(8),
		//	]);
	 
			//$djelatnik->promo_code()->save($new_promo_code);
			
			// Send the email to user
			Mail::queue('email:Rodjendan', ['djelatnik' => $djelatnik], function ($mail) use ($djelatnik) {
				$mail->to('jelena.juras@duplico.hr') //($djelatnik['email'])
					->from('jelena.juras@duplico.hr', 'Duplico')
					->subject('Happy Birthday!');
			});
	 
		}
		$this->info('Birthday messages sent successfully!');
	}
}