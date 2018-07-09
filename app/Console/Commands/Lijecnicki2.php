<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Registration;
use App\Models\EmployeeTermination;
Use Mail;
use DateTime;

class Lijecnicki2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:Lijecnicki2';

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
		$datum->modify('+7 days');
		$dan =date_format($datum,'d');
		$mjesec=date_format($datum,'m');
		$godina= date_format($datum,'Y');
		
		$djelatnici = Registration::join('employees','registrations.employee_id', '=', 'employees.id')->select('registrations.*','employees.first_name','employees.last_name')->whereYear('registrations.lijecn_pregled', '=', $godina)->whereMonth('registrations.lijecn_pregled', '=', $mjesec)->whereDay('registrations.lijecn_pregled', '=', $dan)->get();
		
		foreach($djelatnici as $djelatnik) {
			$otkaz = EmployeeTermination::where('employee_terminations.employee_id','=',$djelatnik->employee_id)->first();
			if(!$otkaz){
			$ime = $djelatnik->first_name;
			$prezime = $djelatnik->last_name;
			// Send the email to user
				Mail::queue('email.Lijecnicki', ['djelatnik' => $djelatnik,'ime' => $ime, 'prezime' => $prezime], function ($mail) use ($djelatnik ) {
					$mail->to('andrea.glivarec@duplico.hr')
						->cc('uprava@duplico.hr')
						->cc('matija.barberic@duplico.hr')
						->cc('koordinacija@duplico.hr')
						->from('info@duplico.hr', 'Duplico')
						->subject('Liječnički ' . ' pregled ' . ' - ' . $djelatnik->first_name . ' '. $djelatnik->last_name);
				});
			}
		}

		$this->info('Obavijest je poslana!');
    }
}
