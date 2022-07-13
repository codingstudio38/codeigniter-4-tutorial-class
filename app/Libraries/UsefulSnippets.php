<?php 
namespace App\Libraries;

use CodeIgniter\I18n\Time;

class UsefulSnippets {
	public function human($dt, $timezone)
	{
		return Time::parse($dt, $timezone)->humanize();
	}
}

?>