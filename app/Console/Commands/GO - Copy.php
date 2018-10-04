<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Registration;
use App\Models\VacationRequest;
use App\Models\Employee;
Use Mail;
use DateTime;
use DateInterval;
use DatePeriod;

class GO extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:GO';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Izostanci';

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
		$dan = date_format($datum,'d');
		$mjesec = date_format($datum,'m');

		$izostanci = VacationRequest::join('employees','vacation_requests.employee_id', '=', 'employees.id')->select('vacation_requests.*', 'employees.first_name','employees.last_name')->orderBy('vacation_requests.zahtjev','ASC')->orderBy('employees.last_name','ASC')->get();
		
		$ova_godina = date_format($datum,'Y');
		$prosla_godina = date_format($datum,'Y')-1;
		$dan_izostanci = array();
		
		foreach($izostanci as $izostanak){
			if($izostanak->odobreno == 'DA'){
				$begin = new DateTime($izostanak->GOpocetak);
				$begin_dan = date_format($begin,'d');
				$begin_mjesec = date_format($begin,'m');
			
				$end = new DateTime($izostanak->GOzavršetak);
				$interval = DateInterval::createFromDateString('1 day');
				$period = new DatePeriod($begin, $interval, $end); // prije dodavanja minute 
				$end2 = $end->setTime(0,0,1);								// uračuna zadnji dan
				$period1 = new DatePeriod($begin, $interval, $end2);

				if($izostanak->zahtjev == 'Izlazak'){
					if($begin_dan == $dan & $begin_mjesec == $mjesec){
						array_push($dan_izostanci,array('ime' => $izostanak->first_name . ' ' . $izostanak->last_name, 'zahtjev' =>  $izostanak->zahtjev, 'period' => date('d.m.Y', strtotime( $izostanak->GOpocetak)) . ' - ' .  date('d.m.Y', strtotime($izostanak->GOzavršetak)), 'vrijeme' => $izostanak->vrijeme_od . ' - ' .  $izostanak->vrijeme_do, 'dani_GO' => '' , 'napomena' =>  $izostanak->napomena));
					}
				}
				if($izostanak->zahtjev == 'GO' || $izostanak->zahtjev == 'NPL' || $izostanak->zahtjev == 'Bolovanje'){
					/* izračun dana GO */
					$registration = Registration::where('registrations.employee_id', $izostanak->employee_id)->first();
					$stažY = 0;
					$stažM = 0;
					$stažD = 0;
					$stažDuplico = 0;
					$danaUk=0;
					$mjeseciUk=0;
					$godinaUk=0;
					$GO = 20;
					$danaPG = 0;
					$mjeseciPG =0;
					$godinaPG = 0;
					$danaUk_PG=0;
					$mjeseciUk_PG=0;
					$godinaUk_PG=0;
					$GO_PG = 20;
					$ukupnoGO =0;
					$ukupnoGO_PG = 0;
					/* Staž prijašnji */
					if($registration->staz) {
						$staž = $registration->staz;
						$staž = explode('-',$registration->staz);
						$stažY = $staž[0];
						$stažM = $staž[1];
						$stažD = $staž[2];
					}
					/* Staž Duplico */	
					$datum_1 = new DateTime($registration->datum_prijave);  /* datum prijave */
					$stažDuplico = $datum_1->diff($datum);  /* staž u Duplicu*/
					$godina = $stažDuplico->format('%y');  
					$mjeseci = $stažDuplico->format('%m');
					$dana = $stažDuplico->format('%d');
					/* Staž ukupan */
					if(($dana+$stažD) > 30){
						$danaUk = ($dana+$stažD) -30;
						$mjeseciUk = 1;
					}else {
						$danaUk = ($dana+$stažD);
					}
					if(($mjeseci+$stažM) > 12){
						$mjeseciUk += ($mjeseci+$stažM) -12;
						$godinaUk = 1;
					}else {
						$mjeseciUk += ($mjeseci+$stažM);
					}
					$godinaUk += ($godina + $stažY);
					/* Godišnji odmor - dani*/
					$GO += (int)($godinaUk/ 4) ;
					If($GO > 25){
						$GO = 25;
					} else {
						$GO = $GO;
					}
					/* Staž prošle godine */
					$datumPG = new DateTime($prosla_godina .'-12-31');   /* zadnji dan prošle godine */
					$godina_prijave = date_format($datum_1,'Y');   /* godina prijave */
					if($godina_prijave < $ova_godina){
						$stažDuplicoPG = $datum_1->diff($datumPG);  /* staž u Duplicu do 31.12*/
						$godinaPG = $stažDuplicoPG->format('%y');  
						$mjeseciPG = $stažDuplicoPG->format('%m');
						$danaPG = $stažDuplicoPG->format('%d');
					}
					/* Staž ukupan do 31.12.*/
					if(($danaPG+$stažD) > 30){
						$danaUk_PG = ($danaPG+$stažD) -30;
						$mjeseciUk_PG = 1;
					} else {
						$danaUk_PG = ($danaPG+$stažD);
					}
					if(($mjeseciPG+$stažM) > 12){
						$mjeseciUk_PG += ($mjeseciPG+$stažM) -12;
						$godinaUk_PG = 1;
					} else {
						$mjeseciUk_PG += ($mjeseciPG+$stažM);
					}
					$godinaUk_PG += ($godinaPG + $stažY);
					$GO_PG += (int)($godinaUk_PG/ 4) ;
					If($GO_PG > 25){
						$GO_PG = 25;
					} else {
						$GO_PG = $GO_PG;
					}
					foreach ($period as $dan1) { //ako je dan  GO !!!
						if(date_format($end,'Y') == $ova_godina){
							$ukupnoGO +=1;
						}
						if(date_format($end,'Y') == $prosla_godina){
							$ukupnoGO_PG +=1;
						}
						if(date_format($dan1,'N') < 6 ){
							$ukupnoGO += 1;
							$ukupnoGO_PG += 1;
						}
						if(date_format($dan1,'d') == '01' & date_format($dan1,'m') == '01' ||
							date_format($dan1,'d') == '06' & date_format($dan1,'m') == '01' ||
							date_format($dan1,'d') == '01' & date_format($dan1,'m') == '05' ||
							date_format($dan1,'d') == '22' & date_format($dan1,'m') == '06' ||
							date_format($dan1,'d') == '25' & date_format($dan1,'m') == '06' ||
							date_format($dan1,'d') == '15' & date_format($dan1,'m') == '08' ||
							date_format($dan1,'d') == '05' & date_format($dan1,'m') == '08' ||
							date_format($dan1,'d') == '08' & date_format($dan1,'m') == '10' ||
							date_format($dan1,'d') == '01' & date_format($dan1,'m') == '11' ||
							date_format($dan1,'d') == '25' & date_format($dan1,'m') == '12' ||
							date_format($dan1,'d') == '26' & date_format($dan1,'m') == '12'){
									$ukupnoGO -= 1;
									$ukupnoGO_PG -= 1;
							}
						}
						if(date_format($dan1,'d') == '02' & date_format($dan1,'m') == '04' & date_format($dan1,'Y') == '2018' ||
							date_format($dan1,'d') == '31' & date_format($dan1,'m') == '05' & date_format($dan1,'Y') == '2018'){
							$ukupnoGO -= 1;
						}
						
						if($prosla_godina == '2017'){
								$GO_PG = 0;
								$ukupnoGO_PG = 0;
							}
						
						$dani_GO = $GO - $ukupnoGO;
						
						if($begin == $end & $begin_dan == $dan & $begin_mjesec == $mjesec){
						array_push($dan_izostanci,array('ime' => $izostanak->first_name . ' ' . $izostanak->last_name, 'zahtjev' =>  $izostanak->zahtjev, 'period' => date('d.m.Y', strtotime( $izostanak->GOpocetak)), 'vrijeme' => $izostanak->vrijeme_od . ' - ' .  $izostanak->vrijeme_do, 'dani_GO' => $dani_GO, 'napomena' =>  $izostanak->napomena ));
						}else {
							$period_day = date_format($dan1,'d');
							$period_month = date_format($dan1,'m');
							if($period_day == $dan & $period_month == $mjesec || $begin == $end ){
								array_push($dan_izostanci,array('ime' => $izostanak->first_name . ' ' . $izostanak->last_name, 'zahtjev' =>  $izostanak->zahtjev, 'period' => date('d.m.Y', strtotime( $izostanak->GOpocetak)) . ' - ' .  date('d.m.Y', strtotime($izostanak->GOzavršetak)), 'vrijeme' => $izostanak->vrijeme_od . ' - ' .  $izostanak->vrijeme_do, 'dani_GO' => $dani_GO,  'napomena' =>  $izostanak->napomena, 'GO' => $GO,'ukupnoGO' => $ukupnoGO  ));
							}
						}
					}
				}
			}
		}
	
	// Send the email to user
		Mail::queue('email.GO', ['dan_izostanci' => $dan_izostanci], function ($mail) use ($datum) {
			$mail->to('jelena.juras@duplico.hr')
				->cc('jelena.juras@duplico.hr')
				->from('info@duplico.hr', 'Duplico')
				->subject('Izostanci ' . ' djelatnika -' . date_format($datum,'d.m.Y'));
		});
		
		$this->info('GO messages sent successfully!');
	}
}