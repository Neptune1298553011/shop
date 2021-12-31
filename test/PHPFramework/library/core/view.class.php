<?php



/**
* 模版类
* 作者：alpha
* 联系：QQ：319224740
* 声明：本源码遵循开源协议，版权为作者所有，请勿用于商业用途
*/



class view
{
	var $source_string = '';    //保存载入模版字符
	var $default_template_path = '';   //默认模版路径
	var $tag_value = array();    //保存传递给模版变量的值
	var $result_string = '';  //解析后的字符

    function __construct()
	{
	}
	
	

	/**
	* 载入模版
	*/
	public function load_template($filename = '')
	{
        if($filename == '')
		{
			$filename  = alpha::$config[alpha::$app]['template_path'] . alpha::$method .  '.html';
		}
		else
		{
			$filename  = alpha::$config[alpha::$app]['template_path'] . $filename .  '.html';
		}
		
		if(!file_exists($filename))
		{
			$this->source_string = "$filename Not Found!";
		}	
		else
		{
			$this->source_string =  file_get_contents($filename);   
		}	
		
		return $this->source_string;
	}


	
	/**
	*模版解析
	*只能匹配两个大括号
	*如果要使用其他符号
	*则需要修改函数
	*两个大括号必须成对
	*解析的模版版中javascript和css尽量写在外部文件
	*避免冲突
	*空格换行等也算字符，在标签里有这些字符就是不同的字符，请注意
	*/
	public function parse_template()
	{
		$this->result_string = isset($this->source_string) ? $this->source_string : '';
		$str = str_split($this->source_string);
		$start = array();
		$count = count($str);
		for($i = 0 ; $i < $count ; $i++)
		{
			if($str[$i] == '{')
			{
				array_push($start,$i);		
			}
		}
		$end = array();
		$count = count($str);
		for($i = 0 ; $i < $count ; $i++)
		{
			if($str[$i] == '}')
			{
				array_push($end,$i);
			}
		}
        $count_start = count($start);
		$count_end = count($end);
		if($count_start != $count_end)
		{
			$this->result_string  = "大括号不配对";
			return $this->result_string;
		}
		$tag = array();
		for($i = 0 ; $i <$count_start ; $i++)
		{
			$str_start = $start[$i];
			$str_end = $end[$i];
			$length = $end[$i] - $start[$i];	
			$tag_one = "";
			for($j = 1 ;$j < $length ; $j++)
			{
				$tag_one .=  $str[$str_start+$j];	
			}
			array_push($tag,$tag_one);
		}
		
		$count = count($tag);
		for($i = 0 ; $i <$count ; $i++)
		{
			if(array_key_exists($tag[$i], $this->tag_value))
			{
				$template_tag = '{' . $tag[$i] .'}';
				$this->result_string = str_replace($template_tag , $this->tag_value[$tag[$i]] ,$this->result_string );
			}
		}
		
		return $this->result_string;
	}


	
	/**
	*显示模版
	*/
	
	public function display($filename = '')
	{
		$this->load_template($filename);
		$content = $this->parse_template();
		echo($content);
	}
	
	
	/**
	*给模版传递变量
	*/
	public function assign($key, $value = null)
	{
		if ($key !=  "")
		{
			$this->tag_value[$key] = $value;
		}
		return $this->tag_value;	
	}


	
	/***
	*把数据流保存到html
	*转为静态网页
	*/
	public function save_to_html($filename = '' ,$path =  '')
	{
		$this->result_string = $this->load_template($filename);
		if($path == '')
		{
			$path =  alpha::$config[alpha::$app]['html_path'] . alpha::$control . '_' .alpha::$method .'.html';
		}
		else
		{
			$path =  alpha::$config[alpha::$app]['html_path'] . $filename .'.html';
		}
        if($this->result_string != '')
		{
			$contents = $this->parse_template();
		}
		else
		{
			$contents = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                        <html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
                        <body><div style="text-align:center; color:#F00;font-size:36px; margin-top:200px">产生了错误</div></body></html>'; 
		}
        file_put_contents($path,$contents);
	}


}




?>