<?php

/**
 * cron設定情報を管理するクラス
 * Class CronShell
 */
class CronShell extends AppShell
{

	/**
	 * cron設定情報をファイルに書き出す
	 */
	public function main()
	{
		$cmd = 'echo \''.trim($this->getStr()).'\' > '.PATH_TO_APP_DIR.'/cron/cron';
		exec($cmd);
	}

	/**
	 * cronの設定情報を返します
	 * 新たにcron設定を追加する時はここに追記する
	 * @return string
	 */
	public function getStr()
	{
		$str = '';
		$str = $str."30 00 * * * ".PATH_TO_APP_DIR."Console/cake amazon_scraping\n";
		$str = $str."45 00 * * * ".PATH_TO_APP_DIR."Console/cake rakuten_scraping\n";
		$str = $str."00 01 * * * ".PATH_TO_APP_DIR."Console/cake yahoo_scraping\n";
		return $str;
	}

}
