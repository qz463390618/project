<?php
/**
 * 用PhpStorm编辑器
 * 用户:Zwf
 * 创建时间:2020/2/26
 * 创建时间:11:24
 * 文件名:News_model.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class News_model extends CI_Model
{
	const TBL = 'news';
	public function __construct(){
		parent::__construct();
		$this->load->database('demo');
	}

	/**
	 * @access public
	 * @param  $data array
	 * @return bool
	 * 成功返回true  失败返回 false
	 */
	public function add_news($data)
	{
		//return true;
		return $this -> db ->insert(self::TBL,$data);
	}

	/**
	 * @access public
	 * @return array,查询的结果
	 */
	public function list_news()
	{
		$query = $this ->db ->get(self::TBL);
		return $query ->result_array();
	}
}
