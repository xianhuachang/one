<?php
class Sms {
	//创蓝发送短信接口URL, 如无必要，该参数可不用修改
    private	$api_send_url = 'http://222.73.117.169/msg/HttpBatchSendSM';
	
	//创蓝短信余额查询接口URL, 如无必要，该参数可不用修改
	private	$api_balance_query_url = 'http://222.73.117.169/msg/QueryBalance';
		
	//创蓝账号 替换成你自己的账号
	private	$api_account	= 'N5322246';
		
	//创蓝密码 替换成你自己的密码
	private	$api_password	= '7nLaCyZqhe3f6c';
	
	/**
	 * 发送短信
	 *
	 * @param string $mobile 手机号码
	 * @param string $msg 短信内容
	 * @param string $needstatus 是否需要状态报告
	 * @param string $extno   扩展码，可选
	 */
	public function sendSMS( $mobile, $msg, $needstatus = 'false', $extno = '') {
		//创蓝接口参数
		$postArr = array (
				          'account' => $this->api_account,
				          'pswd' => $this->api_password,
				          'msg' => $msg,
				          'mobile' => $mobile,
				          'needstatus' => $needstatus,
				          'extno' => $extno
                     );
		
		$result = $this->curlPost( $this->api_send_url , $postArr);
		return $result;
	}
	
	/**
	 * 查询额度
	 *
	 *  查询地址
	 */
	public function queryBalance() {
		global $chuanglan_config;
		//查询参数
		$postArr = array ( 
		          'account' => $this->api_account,
		          'pswd' => $this->api_password,
		);
		$result = $this->curlPost($this->api_balance_query_url, $postArr);
		return $result;
	}

	/**
	 * 处理返回值
	 * 
	 */
	public function execResult($result){
		$result=preg_split("/[,\r\n]/",$result);
		return $result;
	}

	/**
	 * 通过CURL发送HTTP请求
	 * @param string $url  //请求URL
	 * @param array $postFields //请求参数 
	 * @return mixed
	 */
	private function curlPost($url,$postFields){
		$postFields = http_build_query($postFields);
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $postFields );
		$result = curl_exec ( $ch );
		curl_close ( $ch );
		return $result;
	}
	
	//魔术获取
	public function __get($name){
		return $this->$name;
	}
	
	//魔术设置
	public function __set($name,$value){
		$this->$name=$value;
	}
}


?>