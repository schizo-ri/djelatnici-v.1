<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Registration;
Use Mail;
use DateTime;

class Lijecnicki extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:Lijecnicki';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Liječnički pregled';

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
		$datum = new DateTime('now');
		$datum->modify('+1 month');
		$dan = date_format($datum,'d');
		$mjesec= date_format($datum,'m');
		$godina= date_format($datum,'Y');
		
		$djelatnici = Registration::join('employees','registrations.employee_id', '=', 'employees.id')->select('registrations.*','employees.first_name','employees.last_name')->whereYear('registrations.lijecn_pregled', '=', $godina)->whereMonth('registrations.lijecn_pregled', '=', $mjesec)->whereDay('registrations.lijecn_pregled', '=', $dan)->get();
		
		foreach($djelatnici as $djelatnik) {
	
			// Send the email to user
				Mail::queue('email.Lijecnicki', ['djelatnik' => $djelatnik], function ($mail) use ($djelatnik ) {
					$mail->to('andrea.glivarec@duplico.hr')
						->cc('uprava@duplico.hr')
						->cc('petrapaola.bockor@duplico.hr')
						->cc('jelena.juras@duplico.hr')
						->from('info@duplico.hr', 'Duplico')
						->subject('Liječnički ' . ' pregled ' . ' - ' . $djelatnik->first_name . ' '. $djelatnik->last_name);
				});
		}

		$this->info('Obavijest je poslana!');
    }
}
