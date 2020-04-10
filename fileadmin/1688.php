<?php
/////////////采集代码//////开始////
//20180814采集淘宝信息
function caiji() {
	header("Content-type: text/html; charset=utf-8");
	$url=$_POST['taobao_url'];
	//$url="https://item.taobao.com/item.htm?spm=a230r.1.14.14.4b177c7d9cUn2u&id=542633848733&ns=1&abbucket=11#detail";
	$text=file_get_contents($url);
	$data=array();
	//http://www.22.com/index.php?c=shop_market&act=caiji&datatype=json
	//1运用正则抓取img标签中id为J_ImgBooth的img，$img[0]为该500图img标签，$img[1]为500图的图片地址；
	// preg_match('/<img[^>]*id="J_ImgBooth"[^r]*rc=\"([^"]*)\"[^>]*>/', $text, $img); 
	preg_match_all('/<img data-src="(.+)50x50.jpg" \/>/U', $text, $img);
	$im=array();
	foreach ($img[1] as &$v) {
		$im[]='http:'.$v.'400x400.jpg';
	}
	$data['img']= $im;
	//2抓取商品名称
	preg_match('/<title>([^<>]*)<\/title>/', $text, $title);
	$title1=iconv('GBK','UTF-8',$title[1]);
	// var_dump($title1);
	$data['name']=$title1;
	//3商品价格
	preg_match('/<input[^>]*name="current_price" [^>]*>/', $text, $price);
	$price1=explode('"',$price[0]);
	//$price=floatval($price);//放入数据库估计还有转一下变量类型
	$data['cost']=$price1[5];
	//var_dump($price1[5]);
	//4商品描述
	preg_match_all('/<script[^>]*>[^<]*<\/script>/is', $text, $content);
	//页面js脚本
	$content=$content[0];
	$description='<div id="detail"> </div>
          <div id="description">
           <div id="J_DivItemDesc">描述加载中</div>
          </div>';
	foreach ($content as &$v) {
		$description.=iconv('GBK','UTF-8',$v);
	}
	;
	var_dump($description);exit;
	$miaoshu= explode(':',$description);
	$xiangqing   = explode('//',$miaoshu[14]);
	//商品详情地址
	$xiangqing_url ="http://".$xiangqing[1];
	$xiangqing1 =file_get_contents($xiangqing_url);
	$xiangqing2=iconv('GBK','UTF-8',$xiangqing1);
	$xiangqing3 = explode('desc=',$xiangqing2);
	$data['xiangqing']= stripslashes($xiangqing3[1]);
	// $data['xiangqing']= $xiangqing3[1];
	//var_dump($xiangqing3[1]);
	$this->actText->result('taobao_xq',$data);
	//var_dump($data);
	//return 
	$this->display();
}
//采集天猫商品详情规则
function caiji1() {
	header("Content-type: text/html; charset=utf-8");
	$url=$_POST['tianmao_url'];
	// $url="https://detail.tmall.com/item.htm?spm=a221t.1476805.2109261262.118.234067694OEZRY&acm=lb-zebra-7419-256394.1003.4.2145900&id=556451095326&scm=1003.4.lb-zebra-7419-256394.ITEM_556451095326_2145900";
	$text=$this->vlogin($url, array());
	//var_dump($text);
	$data=array();
	//http://www.22.com/index.php?c=shop_market&act=caiji1&datatype=json
	//1运用正则抓取img标签中id为J_ImgBooth的img，$img[0]为该500图img标签，$img[1]为500图的图片地址；
	//preg_match('/<img[^>]*id="J_ImgBooth"[^r]*rc=\"([^"]*)\"[^>]*>/', $text, $img); 
	preg_match_all('/<img.+src="(.+)60x60q90.jpg" \/>/U',$text,$img);
	//var_dump($img);exit;
	$im=array();
	foreach ($img[1] as &$v) {
		$im[]='http:'.$v.'400x400q90.jpg';
	}
	$data['img']= $im;
	//2抓取商品名称
	preg_match('/<title>([^<>]*)<\/title>/', $text, $title);
	$title1=iconv('GBK','UTF-8',$title[1]);
	$data['name']=$title1;
	//3商品价格
	preg_match('/.+"price":"(.+)",.+/U', $text, $price);
	$price1=$price[1];
	$data['cost']=$price1;
	//var_dump($price);
	//4商品描述
	preg_match_all('/.+"descUrl":"(.+)"/U', $text, $content);
	//页面js脚本
	//var_dump($content);
	$xiangqing   = $content[1][0];
	//商品详情地址
	$xiangqing_url ="http:".$xiangqing;
	$xiangqing1 =file_get_contents($xiangqing_url);
	$xiangqing2=iconv('GBK','UTF-8',$xiangqing1);
	$xiangqing3 = explode('desc=',$xiangqing2);
	$data['xiangqing']= stripslashes($xiangqing3[1]);
	$this->actText->result('tianmao_xq',$data);
	$this->display();
}
//private $init;
//阿里巴巴1688规则
function caiji2() {
	$url=$_POST['aili_xq'];
	set_time_limit(0);
	header("Content-type: text/html; charset=utf-8");
	//$url ="https://detail.1688.com/offer/573228188627.html?spm=a2604.8113403.jb4r9km2.13.197a52daX2fbgi";
	$text= $this->vlogin($url, array());
	$data=array();
	//1商品名称
	preg_match('/<title>(.+)<\/title>/', $text, $title);
	$title1=iconv('GBK','UTF-8',$title[1]);
	$data['name']=$title1;
	//2商品图片
	preg_match_all('/<li.+data-imgs=.+"preview".+"(.+)","original".+".+".+>/U', $text, $img);
	$data['img']=$img[1];
	//3商品价格
	preg_match('/<meta.+property="og:product:price".+content="(.+)"\/>/',$text,$price);
	$data['cost']=$price[1];
	//4商品详情
	preg_match('/.+data-tfs-url="(.+)".+/U', $text, $content);
	//
	$xiangqing   = $content[1];
	//商品详情地址
	$xiangqing_url =$xiangqing;
	$xiangqing1 =file_get_contents($xiangqing_url);
	$xiangqing2=stripslashes(iconv('GBK','UTF-8',$xiangqing1));
	$xiangqing3 = explode('var offer_details={"content":"',$xiangqing2);
	$data['xiangqing']= $xiangqing3[1];
	$this->actText->result('aili_xq',$data);
	$this->display();
}
function vlogin($url, $data) {
	// 模拟登录获取Cookie函数
	define( 'IS_PROXY', true );
	$cookie_file = dirname ( __FILE__ ) . "/cookie_" . md5 ( basename ( __FILE__ ) ) . ".txt";
	// 设置Cookie文件保存路径及文件名
	$user_agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; .NET CLR 1.1.4322)";
	$curl = curl_init ();
	// 启动一个CURL会话
	if (IS_PROXY) {
		//以下代码设置代理服务器
		//代理服务器地址
		// curl_setopt ( $curl, CURLOPT_PROXY, $GLOBALS['proxy'] );
	}
	curl_setopt ( $curl, CURLOPT_URL, $url );
	// 要访问的地址
	curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
	// 对认证证书来源的检查
	curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, 2 );
	// 从证书中检查SSL加密算法是否存在
	curl_setopt ( $curl, CURLOPT_USERAGENT, $user_agent );
	// 模拟用户使用的浏览器
	@curl_setopt ( $curl, CURLOPT_FOLLOWLOCATION, 1 );
	// 使用自动跳转
	curl_setopt ( $curl, CURLOPT_AUTOREFERER, 1 );
	// 自动设置Referer
	curl_setopt ( $curl, CURLOPT_POST, 1 );
	// 发送一个常规的Post请求
	curl_setopt ( $curl, CURLOPT_POSTFIELDS, $data );
	// Post提交的数据包
	curl_setopt ( $curl, CURLOPT_COOKIEJAR, $cookie_file );
	// 存放Cookie信息的文件名称
	curl_setopt ( $curl, CURLOPT_COOKIEFILE, $cookie_file);
	// 读取上面所储存的Cookie信息
	curl_setopt ( $curl, CURLOPT_TIMEOUT, 30 );
	// 设置超时限制防止死循环
	curl_setopt ( $curl, CURLOPT_HEADER, 0 );
	// 显示返回的Header区域内容
	curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
	// 获取的信息以文件流的形式返回
	$tmpInfo = curl_exec ( $curl );
	// 执行操作
	if (curl_errno ( $curl )) {
		echo 'Errno' . curl_error ( $curl );
	}
	curl_close ( $curl );
	// 关闭CURL会话
	return $tmpInfo;
	// 返回数据
}
//////////////采集代码//////结束////