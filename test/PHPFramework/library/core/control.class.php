<?php



/**
* 模版类
* 作者：alpha
* 联系：QQ：319224740
* 声明：本源码遵循开源协议，版权为作者所有，请勿用于商业用途
*/



abstract class control
{
	
	function __construct()
	{
		$this->view = new view();		
	}
	
	/**
	* 显示模版
	*/
	public function display($filename = '')
	{
		$this->view->display($filename);
	}
	
	/**
	* 传递变量
	*/
	public function assign($key, $value = null)
	{
		$this->view->assign($key, $value);
	}


	
	/**
	* 保存为html，静态化
	*/
	public function save_to_html($filename = '' ,$path = '')
	{
		$this->view->save_to_html($filename , $path);
	}

	


	
	
	
}



?>