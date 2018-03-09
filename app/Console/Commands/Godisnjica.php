<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Registration;
Use Mail;
use DateTime;

class Godisnjica extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:Godisnjica';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Djelatnik ima godišnjicu rada u Duplicu';

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
		$djelatnici = Registration::join('employees','registrations.employee_id', '=', 'employees.id')->select('registrations.*','employees.first_name','employees.last_name')->whereMonth('datum_prijave', '=', date('m'))->whereDay('datum_prijave', '=', date('d'))->get();
		
		foreach($djelatnici as $djelatnik) {
			$date1 = new DateTime($djelatnik->datum_prijave); 
			$date2 = new DateTime("now"); 
			$interval = $date1->diff($date2); 
			$years = $interval->format('%y'); 
			
			if($years == 5 || $years == 10 || $years == 15 || $years == 20) {
			// Send the email to user
				Mail::queue('email.Godisnjica', ['djelatnik' => $djelatnik], function ($mail) use ($djelatnik) {
					$mail->to('zeljko.rendulic@duplico.hr')
						->cc('jelena.juras@duplico.hr')
						->from('jelena.juras@duplico.hr', 'Duplico')
						->subject('Godišnjica rada ' . $djelatnik->first_name . ' '. $djelatnik->last_name);
				});
			}
		}

		$this->info('Obavijest je poslana!');
    }
}
