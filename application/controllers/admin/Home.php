<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home  extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();

        //$this->load->model([]);
    }
	
	public function index()
	{
		echo "<pre class='col-offset-4'>";
		printf("Right now is %s", Carbon\Carbon::now()->toDateTimeString());
		printf("Right now in Vancouver is %s", Carbon\Carbon::now('America/Vancouver'));  //implicit __toString()
		$tomorrow = Carbon\Carbon::now()->addDay();
		$lastWeek = Carbon\Carbon::now()->subWeek();
		$nextSummerOlympics = Carbon\Carbon::createFromDate(2016)->addYears(4);

		$officialDate = Carbon\Carbon::now()->toRfc2822String();

		$howOldAmI = Carbon\Carbon::createFromDate(1975, 5, 21)->age;

		$noonTodayLondonTime = Carbon\Carbon::createFromTime(12, 0, 0, 'Europe/London');

		$internetWillBlowUpOn = Carbon\Carbon::create(2038, 01, 19, 3, 14, 7, 'GMT');

		// Don't really want this to happen so mock now
		Carbon\Carbon::setTestNow(Carbon\Carbon::createFromDate(2000, 1, 1));

		// comparisons are always done in UTC
		if (Carbon\Carbon::now()->gte($internetWillBlowUpOn)) {
			die();
		}

		// Phew! Return to normal behaviour
		Carbon\Carbon::setTestNow();

		if (Carbon\Carbon::now()->isWeekend()) {
			echo 'Party!';
		}
		// Over 200 languages (and over 500 regional variants) supported:
		echo Carbon\Carbon::now()->subMinutes(2)->diffForHumans(); // '2 minutes ago'
		echo Carbon\Carbon::now()->subMinutes(2)->locale('zh_CN')->diffForHumans(); // '2分钟前'
		echo Carbon\Carbon::parse('2019-07-23 14:51')->isoFormat('LLLL'); // 'Tuesday, July 23, 2019 2:51 PM'
		echo Carbon\Carbon::parse('2019-07-23 14:51')->locale('fr_FR')->isoFormat('LLLL'); // 'mardi 23 juillet 2019 14:51'

		// ... but also does 'from now', 'after' and 'before'
		// rolling up to seconds, minutes, hours, days, months, years

		$daysSinceEpoch = Carbon\Carbon::createFromTimestamp(0)->diffInDays();
			$date = Carbon\Carbon::today();
		echo $date;   // output:  2017-01-21 00:00:00
		echo '<br/>'.$date->diffForHumans();  // output: 7 hours ago
		
		echo "</pre>";
		//die();
		$data['user'] = array();
		// $data['contents'] = $this->load->view("home/Home_view",$data,true);
		$this->load->view("admin/home/layout/main_wrapper_view",$data);
    
	}
}