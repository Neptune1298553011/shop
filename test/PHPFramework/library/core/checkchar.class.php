<?php
/**
*post/key/cookie输入检查类，这个类来自网络
*/

 class check_char{  

     private $getfilter = "'|(and|or)\\b.+?(>|<|=|in|like)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";  

     private $postfilter = "\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";  

     private $cookiefilter = "\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";  

     /**  

      * 构造函数  

     */ 

     public function __construct() {  

         foreach($_GET as $key=>$value){$this->stopattack($key,$value,$this->getfilter);}  

         foreach($_POST as $key=>$value){$this->stopattack($key,$value,$this->postfilter);}  

         foreach($_COOKIE as $key=>$value){$this->stopattack($key,$value,$this->cookiefilter);}
		
		 $_GET = $this->changes($_GET);
		 $_POST = $this->changes($_POST);
		 $_COOKIE = $this->changes($_COOKIE);
		 
     }  

	 
	function changes($arr)
	{
		foreach($arr as $k=>$v)
			{
				
				if(is_array($v))
				{ 
					$arr[$k] = $this->changes($v);
				}
				else
				{
					$arr[$k] = addslashes($v);
				}
			}
		return $arr;
	}
	
     /**  

      * 参数检查并写日志  

      */ 
	  	 

     public function stopattack($StrFiltKey, $StrFiltValue, $ArrFiltReq){  
	 
         if(is_array($StrFiltValue))$StrFiltValue = implode($StrFiltValue);  

         if (preg_match("/".$ArrFiltReq."/is",$StrFiltValue) == 1){     

             $this->writeslog($_SERVER["REMOTE_ADDR"]."    ".strftime("%Y-%m-%d %H:%M:%S")."    ".$_SERVER["PHP_SELF"]."    ".$_SERVER["REQUEST_METHOD"]."    ".$StrFiltKey."    ".$StrFiltValue);   
			 header("Location:index.php?a=common&c=common&m=index");
		     exit();
         } 
		 
     } 


  
	 

     /**  

      * SQL注入日志  

      */ 

     public function writeslog($log){  

         $log_path = alpha::$config[alpha::$app]['cache_path'].'sql_log.txt';  
		 
		 file_put_contents($log_path,$log);

     }  
 }


?>