<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
Use Mail;

class Rodjendan extends Command
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

		// Send the email to user
			Mail::queue('email.Rodjendan', ['djelatnik' => $djelatnik], function ($mail) use ($djelatnik) {
				$mail->to('zeljko.rendulic@duplico.hr')
					->cc('jelena.juras@duplico.hr')
					->from('jelena.juras@duplico.hr', 'Duplico')
					->subject('Rođendan djelatnika ' . $djelatnik->first_name . ' '. $djelatnik->last_name);
			});
		}
		
		$this->info('Birthday messages sent successfully!');
	}
}