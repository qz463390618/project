<?php
/**
 * 用PhpStorm编辑器
 * 用户:Zwf
 * 创建时间:2020/2/26
 * 创建时间:11:06
 * 文件名:News.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class News extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//载入news_model   可以使用$this ->user_model来操作
		$this -> load -> model('news_model','news');
	}

	public function showAdd()
	{
		$this -> load ->view('add.html');
	}

	public function doAdd()
	{
		$data['title'] = $this->input->post('title');
		$data['author'] = $this->input->post('author');
		$data['content'] = $this->input->post('content');
		$data['add_time'] = time();
		//获取表单响应的数据
		//$this ->news -> add_news($data);
		if($this -> news -> add_news($data))
		{
			echo '添加成功';
			header('location:'.site_url('news/list'));
		}else{
			echo '连接失败';
		}
	}

	public function newsList()
	{
		//var_dump($this -> news -> list_news());
		$data['news_list'] = $this -> news -> list_news();
		$this -> load -> view('news_list.html',$data);
	}

	public function delNews($id)
	{
		echo $id;
	}
}
