<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bulk extends CI_Controller{

	public function bulkEdit(){
		/*$mysql_conf = array(
			'host' => '127.0.0.1:3306',
			'db' => 'db037',
			'db_user' => 'root',
			'db_pwd' => ''
		);*/
		$mysql_conf = array(
			'host' => '127.0.0.1:3306',
			'db' => 'db037',
			'db_user' => 's037user',
			'db_pwd' => 'W2@123321!@#d'
		);
		$mysqli =  new mysqli($mysql_conf['host'],$mysql_conf['db_user'],$mysql_conf['db_pwd']); //连接数据库
		!mysqli_connect_error() or die("连接失败！！");
		$mysqli -> query("set names 'utf8';");//编码转换
		$select_db = $mysqli -> select_db($mysql_conf['db']);
		if (!$select_db) {
			die("could not connect to the db:\n" .  $mysqli->error);
		}
		$beforeUrl = 'https://d.douyucdn.cn/wsd-pkg-div/2020/02/11/4b60e8738ec1879315b080696a3b0e1d_feiyou02_6.0.7.2_20200211173407.apk';
		$newUrl = 'https://d.douyucdn.cn/wsd-pkg-div/2020/02/14/30f385aef4d2104dbfe30202bd3e1387_feiyou02_6.0.7.3_20200214205010.apk';
		$sql = "select id from s037_game_pack where and_url = '{$beforeUrl}'";
		$res = $mysqli -> query($sql);
		$num = 0;
		$ids = array();
		while($row = $res -> fetch_assoc()){
			//var_dump($row['id']);
			$ids[] = $row['id'];
			$uSql = "update s037_game_pack set and_url='{$newUrl}' where id = {$row['id']}";
			$hyy=$mysqli->query($uSql);
			if($hyy){
				echo "成功更新";
				echo '<br>';
				$num ++;
			}else{
				print '更新失败Error:'.$mysqli->error;
			}

		}
		echo '<h3>'.$num.'</h3>';
	}

	public function test()
	{
		echo 123121;
	}
}
