<?php 

namespace App\Laravel\Services;

use App\Laravel\Models\Winner;
use App\Laravel\Models\EntryItem;
use Route,Str,Carbon,Input,DB,DateTime,DateInterval,DatePeriod;

class Helper{

	public static function digipep_transaction(array $param){
		$trans_id = $param['trans_token'];
		// .Str::upper(Str::random(6))

		$request = [
			'referenceCode' => $trans_id,
			'total' => $param['amount'],
			'firstname' => $param['first_name'],
			'middlename' => $param['middle_name'],
			'lastname' => $param['last_name'],
			'subMerchantCode' => "",
			'subMerchantName' => "",
			'title' => $param['title'],
			'successUrl' => $param['success_url'],
			'cancelUrl' => $param['cancel_url'],
			'returnUrl' => $param['return_url'],
			'details' => [
				'particularFee' => $param['particular_fee'],
				'penaltyFee' => $param['penalty_fee'],
				'dstFee' => $param['dst_fee'],
			]

		];

		return $request;
	}

	public static function business_scope($scope_code = NULL){
		switch(Str::upper($scope_code)){
			case 'CITYPROV':
				return "CITY/MUNICIPALITY";
			break;
			default:
				return Str::upper($scope_code);
		}
	}

	public static function format_num($n) {
	    $s = array("K", "M", "B", "T");
	    $out = "";
	    while ($n >= 1000 && count($s) > 0) {
	        $n = $n / 1000.0;
	        $out = array_shift($s);
	    }
	    return round($n, max(0, 3 - strlen((int)$n))) ."$out";
	}

	public static function status_badge($type){
		$result = "default";
		switch(Str::lower($type)){
			case 'inactive': $result = "light"; break;
			case 'active': $result = "success"; break;
		}
		return $result;
	}

  	/**
	 * Parse date to the specified format
	 *
	 * @param date $time
	 * @param string $format
	 *
	 * @return Date
	 */
	public static function date_format($time,$format = "M d, Y @ h:i a") {
		return $time == "0000-00-00 00:00:00" ? "" : date($format,strtotime($time));
	}

	/**
	 * Parse date to the 'date only' format
	 *
	 * @param date $time
	 * @param string $format
	 *
	 * @return Date
	 */
	public static function date_only($time) {
		return Self::date_format($time, "F d, Y");
	}

	/**
	 * Parse date to the 'time only' format
	 *
	 * @param date $time
	 * @param string $format
	 *
	 * @return Date
	 */
	public static function time_only($time) {
		return Self::date_format($time, "g:i A");
	}

	/**
	 * Parse date to the standard sql date format
	 *
	 * @param date $time
	 * @param string $format
	 *
	 * @return Date
	 */
	public static function date_db($time) {
		return $time == "0000-00-00 00:00:00" ? "" : date(env('DATE_DB',"Y-m-d"),strtotime($time));
	}

	/**
	 * Parse date to the standard sql datetime format
	 *
	 * @param date $time
	 * @param string $format
	 *
	 * @return date
	 */
	public static function datetime_db($time) {
		return $time == "0000-00-00 00:00:00" ? "" : date(env('DATETIME_DB',"Y-m-d H:i:s"),strtotime($time));
	}

	/**
	 * Parse date to a greeting
	 *
	 * @param date $time
	 *
	 * @return string
	 */
	public static function greet($time = NULL) {
		if(!$time) $time = Carbon::now();
		$hour = date("G",strtotime($time));
		
		if($hour < 5) {
			$greeting = "You woke up early";
		}elseif($hour < 10){
			$greeting = "Good morning";
		}elseif($hour <= 12){
			$greeting = "It's almost lunch";
		}elseif($hour < 18){
			$greeting = "Good afternoon";
		}elseif($hour <= 22){
			$greeting = "Good evening";
		}else{
			$greeting = "You must be working really hard";
		}

		return $greeting;
	}

	/**
	 * Get all months within a range
	 *
	 * @param date $time
	 *
	 * @return string
	 */
	public static function months_within_range($start, $end, $format = "F") {
		$start    = (new DateTime($start))->modify('first day of this month');
		$end      = (new DateTime($end))->modify('first day of next month');
		$interval = DateInterval::createFromDateString('1 month');
		$period   = new DatePeriod($start, $interval, $end);

		$months = [];
		foreach ($period as $dt) {
		    array_push($months, $dt->format($format));
		}
		return $months;
	}

	/**
	 * Shows time passed
	 *
	 * @param date $time
	 *
	 * @return string
	 */
	public function time_passed($time){
		$current_date = Carbon::now();
		$secsago = strtotime($current_date) - strtotime($time);
		$nice_date = 1;
		if ($secsago < 60):
			if($secsago < 30){ return "Just Now.";}
		    $period = $secsago == 1 ? '1 second'     : $secsago . ' seconds';
		elseif ($secsago < 3600) :
		    $period    =   floor($secsago/60);
		    $period    =   $period == 1 ? '1 minute' : $period . ' minutes';
		elseif ($secsago < 86400):
		    $period    =   floor($secsago/3600);
		    $period    =   $period == 1 ? '1 hour'   : $period . ' hours';
		elseif ($secsago < 432000):
		    $period    =   floor($secsago/86400);
		    $period    =   $period == 1 ? '1 day'    : $period . ' days';
		else:
		   $nice_date = 0;
		   $period = date("M d, Y",strtotime($time));
		endif;
		if($nice_date == 1)
			return $period." ago";
		else
			return $period;
	}

	/**
	 * Checks if route is active
	 *
	 * @param array $routes
	 * @param string $class
	 *
	 * @return string
	 */
	public static function is_active(array $routes, $class = "active") {
		return  in_array(Route::currentRouteName(), $routes) ? $class : NULL;
	}
	
	/**
	 * Generate seven uppercase characters randomly
	 *
	 * @return string
	 */
	public static function create_ucode(){
		return Str::upper(Str::random(7));
	}

	/**
	 * Create a filename
	 *
	 * @param string $extension
	 *
	 * @return string
	 */
	public static function create_filename($extension, $exclude_extension = false){
		return Str::lower(Str::random(10).date("mdYhs")) . (!$exclude_extension ? ".{$extension}"  : NULL) ;
	}

	/**
	 * Create a username
	 *
	 *
	 * @return string
	 */
	public static function create_username($name){
		return Self::get_slug('user','username',$name);
	}

	/**
	 * Gets the excerpt of a string
	 *
	 * @param string $str
	 *
	 * @return string
	 */
	public static function get_excerpt($str){
		$paragraphs = explode("<br>", $str);
	    return Str::words(strip_tags($paragraphs[0]),20);
	}

	/**
	 * Improved array diff method
	 *
	 * @param array $a
	 * @param array $b
	 *
	 * @return array
	 */
	public static function array_diff($a, $b) {
	    $map = $out = array();
	    foreach($a as $val) $map[$val] = 1;
	    foreach($b as $val) if(isset($map[$val])) $map[$val] = 0;
	    foreach($map as $val => $ok) if($ok) $out[] = $val;
	    return $out;
	}

	/**
	 * Gets the slug of a string
	 *
	 * @param string $str
	 * @param string $tbl
	 * @param string $col
	 *
	 * @return string
	 */
	public static function get_slug($tbl, $col, $val, $except_id = 0){
		$slug = Str::slug($val);
		$check_slug = DB::table($tbl)->where("{$col}",'like',"%{$val}%")->where('id', '<>', $except_id)->count();
		if($check_slug != 0) $slug .= ++$check_slug;
		return $slug;
	}

	/**
	 * Translates a number to a short alhanumeric version
	 *
	 * Translated any number up to 9007199254740992
	 * to a shorter version in letters e.g.:
	 * 9007199254740989 --> PpQXn7COf
	 *
	 * specifiying the second argument true, it will
	 * translate back e.g.:
	 * PpQXn7COf --> 9007199254740989
	 *
	 * @param mixed   $in	  String or long input to translate
	 * @param boolean $to_num  Reverses translation when true
	 * @param mixed   $pad_up  Number or boolean padds the result up to a specified length
	 * @param string  $pass_key Supplying a password makes it harder to calculate the original ID
	 *
	 * @return mixed string or long
	 */
	public static function alphaID($in, $to_num = false, $pad_up = false, $pass_key = null) {
		$out   =   '';
		$index = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$base  = strlen($index);

		if ($pass_key !== null) {
			// Although this function's purpose is to just make the
			// ID short - and not so much secure,
			// with this patch by Simon Franz (http://blog.snaky.org/)
			// you can optionally supply a password to make it harder
			// to calculate the corresponding numeric ID

			for ($n = 0; $n < strlen($index); $n++) {
				$i[] = substr($index, $n, 1);
			}

			$pass_hash = hash('sha256',$pass_key);
			$pass_hash = (strlen($pass_hash) < strlen($index) ? hash('sha512', $pass_key) : $pass_hash);

			for ($n = 0; $n < strlen($index); $n++) {
				$p[] =  substr($pass_hash, $n, 1);
			}

			array_multisort($p, SORT_DESC, $i);
			$index = implode($i);
		}

		if ($to_num) {
			$len = strlen($in) - 1;
			for ($t = $len; $t >= 0; $t--) {
				$bcp = bcpow($base, $len - $t);
				$out = $out + strpos($index, substr($in, $t, 1)) * $bcp;
			}
			if (is_numeric($pad_up)) {
				$pad_up--;
				if ($pad_up > 0) {
					$out -= pow($base, $pad_up);
				}
			}
		} else {
			// Digital number  -->>  alphabet letter code
			if (is_numeric($pad_up)) {
				$pad_up--;
				if ($pad_up > 0) {
					$in += pow($base, $pad_up);
				}
			}
			for ($t = ($in != 0 ? floor(log($in, $base)) : 0); $t >= 0; $t--) {
				$bcp = bcpow($base, $t);
				$a   = floor($in / $bcp) % $base;
				$out = $out . substr($index, $a, 1);
				$in  = $in - ($a * $bcp);
			}
		}
		return $out;
	}

	/**
	* Remove special chars from a string
	*
	* @var string $str
	*
	* @return int
	*/
	public static function str_clean($str){
	   $str = str_replace(' ', '-', $str); // Replaces all spaces with hyphens.
	   $str = preg_replace('/[^A-Za-z0-9\-]/', '', $str); // Removes special chars.
	   return preg_replace('/-+/', '-', $str); // Replaces multiple hyphens with single one.
	}

	/**
	* Formats a number to a money format
	*
	* @var string $amount
	*
	* @return int
	*/
	public static function money_format($amount){
		return number_format($amount,2,'.',',');
	}

	/**
	* Formats a number to a nice number format
	*
	* @var string $number
	*
	* @return int
	*/
	public static function nice_number($number){
		return number_format($number,0,'',',');
	}

	/**
	* Formats a string to a pre-defined units
	*
	* @var string $amount
	*
	* @return int
	*/
	public static function unit($str){
		$str = str_replace("_mo", " month(s)", $str);
		$str = str_replace("_yr", " year(s)", $str);
		return $str;
	}

	public static function mins_to_time($mins) {
		$seconds = $mins * 60;
	    $dtF = new \DateTime('@0');
	    $dtT = new \DateTime("@$seconds");
	    return $dtF->diff($dtT)->format('%aD %hH %iM');
	}

	public static function progress_color($percentage){
		if($percentage > 75){
			return "bg-success";
		}elseif($percentage > 50){
			return "bg-warning";
		}else{
			return "bg-danger";
		}
	}

	public static function get_subscription_color($status)
	{
		switch(strtolower($status))
		{
			case "freeze":
				return 'warning';

			case "cancelled":
				return 'secondary';

			case "unsubscribed":
				return 'danger';

			default:
				return "success";
		}
	}

	/**
	 * Create Input Date as Date using Carbon
	 * @param date DATE Y-m-d
	 */
	public static function create_date($date)
	{
		$array = explode("-",$date);
		$year = $array[0];
		$month = $array[1];
		$day = $array[2];

		$new_date = Carbon::createFromDate($year,$month,$day);

		return $new_date;
	}
}

// 