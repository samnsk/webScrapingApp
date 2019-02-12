<?php

/**
 * cron情報を管理するクラス
 * Class CronShell
 */
class CronShell extends AppShell
{

	public function main()
	{
		$cmd = 'echo \''.trim($this->getStr()).'\' > '.PATH_TO_APP_DIR.'/cron/cron';
		exec($cmd);
	}

	public function getStr()
	{
		$str = '';
		$str = $str."30 00 * * * ".PATH_TO_APP_DIR."Console/cake amazon_scraping\n";
		return $str;
	}

}
