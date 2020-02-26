<?php
/**
 * 用PhpStorm编辑器
 * 用户:Zwf
 * 创建时间:2020/2/25
 * 创建时间:11:53
 * 文件名:Demo.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Demo extends CI_Controller
{
	public function test()
	{
		//var_dump($this->load);
		var_dump($this->uri->segment(3));
	}

	public function showUsers()
	{
		//装载数据库操作类
		$this -> load -> database();
		//装载成功后,会放入超级对象的属性中  默认属性名是db
		//$this -> db

		$sql = 'select * from test';
		$result = $this->db->query($sql);
		var_dump($result);

	}
}
