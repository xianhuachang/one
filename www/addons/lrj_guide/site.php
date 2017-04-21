<?php
/**
 * 导购模块微站定义
 *
 * @author 广州路仁甲营销策划有限公司
 * @url http://bbs.we7.cc/
 */
defined('IN_IA') or exit('Access Denied');

class Lrj_guideModuleSite extends WeModuleSite {
	private $lrj_guide_part = 'lrj_guide_part';
	private $lrj_guide_tutor = 'lrj_guide_tutor';
	private $lrj_guide_question = 'lrj_guide_question';
	private $lrj_guide_selfinspection = 'lrj_guide_selfinspection';
	private $ewei_shop_goods = 'ewei_shop_goods';
	private $lrj_guide_better = 'lrj_guide_better';
	
	//TODO 商品表
	private $psize = 15;
	
		//TODO 准会员测试
	public function doMobileAssociate() {
		global $_W,$_GPC;
		$this->checkWechat();
		//这个操作被定义用来呈现 功能封面
		load() -> func('tpl');		
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$gender=pdo_getcolumn('mc_members',array("uid"=>$_W['member']['uid'],'uniacid'=>$_W['uniacid']), 'gender');		
			$data=array(
				'uniacid'=>$_W['uniacid'],
				'openid'=>$_W['openid'],
				'gender'=>$gender,
				'symptom_desc'=>$_GPC['data'],
				'status'=>1,
				'type'=>2,
				'createtime'=>time()
			);
			if(pdo_insert("lrj_guide_selfinspection",$data)){
				die(json_encode(array('status'=>200)));
			}else{
				die(json_encode(array('status'=>201)));
			}		
	    	exit;
		}
		include $this -> template('associate2');
	}
	
	public function doMobileGetVerify(){
		global $_W;
		$this->checkWechat();
		//$_W['member']['uid']=3853;
		if(isset($_POST['phone'])){
			//判断是否符合手机格式
			$phone=$_POST['phone'];
			if(!preg_match('/^0{0,1}(13[0-9]|15[0-9]|153|156|180|18[7-9])[0-9]{8}$/', $phone)){
				echo json_encode(array('status'=>101,'msg'=>'请输入正确的手机号码'));
				exit;
			}
			//判断是否超过次级  且 是否存在号码
			$wrongtime=pdo_get('mc_members',array('uid'=>$_W['member']['uid'],'uniacid'=>$_W['uniacid']),array('wrongtime','mobile'));
			if($wrongtime['wrongtime']>=5){
				echo json_encode(array('status'=>102,'msg'=>'您已超过5次机会,系统已禁止您的注册操作!'));
				exit;
			}
			if($phone==$wrongtime['mobile']){
				echo json_encode(array('status'=>102,'msg'=>'您好，此号码已注册,请更换其它号码，谢谢！'));
				exit;
			}
			//创建验证码
			$verify='';
			for($i=0;$i<4;$i++){
				$verify.=(mt_rand(1, 9));
			}
			require_once 'model/sms.php';
			$sms=new Sms();
			$result = $sms->sendSMS($phone, "【酵果菜谱】，您的验证码是{$verify},3分钟内有效,请珍惜每一个验证码,非本人操作，请忽略，谢谢！",'true');
			$result = $sms->execResult($result);
			if(isset($result[1]) && $result[1]==0){
				$_SESSION['verify']=$verify.'_'.time();
				$wrongtime['wrongtime']++;
				pdo_update('mc_members',array('wrongtime'=>$wrongtime['wrongtime']),array('uid'=>$_W['member']['uid'],'uniacid'=>$_W['uniacid']));
				echo json_encode(array('status'=>200));
				exit;
			}else{
				//TODO 写LOG
				file_put_contents("error.txt",base64_encode($result[1])."    ".date('Y-m-d h:i:s')."  \r\n",FILE_APPEND);
				echo json_encode(array('status'=>108,'msg'=>'验证码系统异常，请稍候再试，谢谢！'));
				exit;
			}
		}
	}
	
	//
	public function doMobileRegister(){
		global $_W;
		$this->checkWechat();
		//$_W['member']['uid']=3853;
		if(isset($_POST['phone'])){
			//判断是否符合手机格式
			$phone=$_POST['phone'];
			if(!preg_match('/^0{0,1}(13[0-9]|15[0-9]|153|156|180|18[7-9])[0-9]{8}$/', $phone)){
				echo json_encode(array('status'=>103,'msg'=>'请输入正确的手机号码'));
				exit;
			}
			//判断是否符合验证码格式
			$verify=$_POST['verify'];
			if(empty($_SESSION['verify'])){
				echo json_encode(array('status'=>104,'msg'=>'请先获取验证码,注意只有3次机会！！！'));
				exit;
			}else{
				list($session_verify,$createTime)=explode('_', $_SESSION['verify']);
				if($verify!=$session_verify || (time()>$createTime+60*3)){
					echo json_encode(array('status'=>104,'msg'=>'验证码已过期,请重新获取,注意只有3次机会！！！'));
					exit;
				}
			}
					
			//判断是否符合姓名格式
			$name=$_POST['name'];
			if(!preg_match('/^[\x{4e00}-\x{9fa5}]+$/u', $name)){
				echo json_encode(array('status'=>105,'msg'=>'请输入正确的姓名'));
				exit;
			}

			//新增数据
			pdo_update('mc_members',array('mobile'=>$phone,'realname'=>$name),array('uid'=>$_W['member']['uid'],'uniacid'=>$_W['uniacid']));
			echo json_encode(array('status'=>200));
			exit;
		}
	}
	
	//TODO 自检
	public function doMobileSelfinspection() {
		
		//这个操作被定义用来呈现 功能封面
		global $_W;
		global $_GPC;
		$this->checkWechat();
		load() -> func('tpl');
		//通过获取openid
		$member=$this->getMember();
		if($mid=intval($_GPC['mid'])){
			$this->getAgent($mid);
		}
 		//TODO 
		$sql = "select * from " . tablename($this -> lrj_guide_part) . " order by priority desc";
		$parts = pdo_fetchall($sql);
		$pid = max(1, intval($_GPC['pid']));
		$t = empty($_GPC['t']) ?  (empty($_W['fans']['gender'])  ? '1' : $_W['fans']['gender']) : intval($_GPC['t']);
		$uniacid = $_W['uniacid'];
		//TODO 正式生产使用 $_W['uniacid']
		$openid = $_W['openid'];
		$do = 'symptom';
		$gender = 3;
		$record = pdo_get($this -> lrj_guide_selfinspection, array('openid' => $openid, 'status' => 0));
		//$_W['member']['uid']=3853;
		$isMember=pdo_get('mc_members',array('uid'=>$_W['member']['uid'],'uniacid'=>$_W['uniacid']),array('realname')); //
		//var_dump($isMember);exit;
		if(empty($isMember['realname'])){
			$isMember='0';
		}
		
		//TODO 正式生产使用 $_W['openid']
		//var_dump($_SERVER["REQUEST_METHOD"]);exit;
		if ($_SERVER["REQUEST_METHOD"]==="POST") {
			//TODO 先从数据库中查找是否存在没有提交的记录， 比对部位  存在修改症状，否则新增症状
				$q = array();
				if (!empty($_GPC['parent'])) {
					$parent=array_filter( explode(';', $_GPC['parent']));	
					foreach ($parent as $v) {
						list($pid, $qid) = explode('_', $v);
						$q[$pid][$qid] = array();
					}
				}
				if (!empty($_GPC['child'])) {
					$child=array_filter(explode(';', $_GPC['child']));
					foreach ($child as $v) {
						list($pid, $qid, $detailid) = explode('_', $v);
						$q[$pid][$qid][] = $detailid;
					}
				}
				$desc = '';
				foreach ($q as $pk => $pv) {
					$qt = '';
					$d = '';
					foreach ($pv as $qk => $qv) {
						$qt .= ($qk . '.');
						foreach ($qv as $dk => $dv) {
							$d .= ($qk . '_' . $dv . '.');
						}
					}
					$qt = substr($qt, 0, -1);
					$d = substr($d, 0, -1);
					$desc .= ($pk . '-' . $qt . '-' . $d . ';');
				}
				//3-12.13.14-12_0.13_0.13_2.14_2.14_3.14_4 表示 部位ID为3的，问题ID为 12 13 14 描述中的12_0 13_0等症状被选中
				//$record = pdo_get($this -> lrj_guide_selfinspection, array('openid' => $openid, 'status' => 0));
				if ($record) {
					$result = pdo_update($this -> lrj_guide_selfinspection, array('symptom_desc' => $desc), array('id' => $record['id']));
				} else {
					//新增
					$data = array('createtime' => time(), 'gender' => $t, 'uniacid' => $uniacid, 'openid' => $openid, 'tid' => $tid, 'symptom_desc' => $desc);
					$result = pdo_insert($this -> lrj_guide_selfinspection, $data);
				}
				if ($result) {
					$this -> getSelfinspectionResult($openid, $parts);
					//message("自诊数据提交成功", $this -> createMobileUrl('selfinspectionresult'), 'success');
					die(json_encode(array("status"=>200,"returnUrl"=>$this->createMobileUrl('selfinspectionresult'))));
				} else {
					//message("自诊数据没有任何修改", $this -> createMobileUrl('symptom'), 'error');
					die(json_encode(array("status"=>201,"returnUrl"=>$this->createMobileUrl('symptom'))));
				}
				exit;
		}
		$this -> getSelfinspectionResult($openid, $parts);
		if (!empty($record)) {
			$gender = $record['gender'];
			$t = $gender;
		}
		include $this -> template('selfinspection');
	}

	//TODO 显示具体症状
	public function doMobileSymptom() {
		global $_W, $_GPC;
		$this->checkWechat();
		error_reporting(0);
		load() -> func('tpl');
		$pid = intval($_GPC['pid']);
		$t = intval($_GPC['t']);
		$sql = 'SELECT * FROM ' . tablename($this -> lrj_guide_question) . ' WHERE  `type` IN ' . "({$t},3) ORDER BY pid";
		$questions = pdo_fetchall($sql);
		$sql = "select * from " . tablename($this -> lrj_guide_part) . " order by priority desc";
		$parts = pdo_fetchall($sql);
		$record = pdo_get($this -> lrj_guide_selfinspection, array('openid' => $_W['openid'], 'status' => '0'), array('symptom_desc'));
		if (!empty($record)) {
			$rArr = explode(';', $record['symptom_desc']);
			$rArr = array_filter($rArr);
			$count = 0;
			foreach ($rArr as $v) {
				list($epid, $qids, $dids) = explode('-', $v);
				if ($count == 0) {
					$pid = $epid;
				}
				$count++;
				if (!empty($qids)) {
					$qidsArr = explode('.', $qids);
					foreach ($qidsArr as $q) {
						if (!empty($dids)) {
							$didsArr = explode('.', $dids);
							foreach ($didsArr as $d) {
								list($eqid, $did) = explode('_', $d);
								if ($eqid == $q) {
									$selected[$epid][$q][] = $did;
								}
							}
						}
					}
				}
			}
		}
		foreach ($questions as &$v) {
			$v['desc'] = explode(';', $v['desc']);
			if($t==1&&$v['name']=='长痘痘'){
				array_pop($v['desc']);
			}
			$newQuestions[$v['pid']][] = $v;
		}
		include $this -> template('symptom2');
	}

	//TODO 自检结果
	public function doMobileSelfinspectionresult() {
		global $_W, $_GPC;
		$this->checkWechat();
		load() -> func('tpl');
		$symptom = $_SESSION['symptom'];
		//var_dump($symptom);
		//TODO 遍历，查询优先级最高的
		$temp = 0;
		$do = 'selfinspectionresult';
		foreach ($symptom as $v) {
			$part = pdo_get($this -> lrj_guide_part, array('id' => $v['pid']), array('id', 'name', 'priority'));
			$part['count'] = $v['count'];
			$parts[$part['priority']] = $part;
		}
		//TODO 优先级比较高的
		krsort($parts, SORT_NUMERIC);
		foreach ($parts as &$p) {
			$qid = str_replace('.', ',', $symptom[$p['id']]['qid']);
			//$sql = 'SELECT *,"' . $symptom[$p['id']]['detail'] . '" as detail FROM ' . tablename($this -> lrj_guide_question) . " WHERE id IN ({$qid})";
			$sql = 'SELECT * FROM ' . tablename($this -> lrj_guide_question) . " WHERE id IN ({$qid})";
			$questions = pdo_fetchall($sql);
			//var_dump($questions);exit;
			//TODO 此处判断是否属于特殊项			
			$product_ids=array();
			foreach ($questions as &$q) {
				$pids=explode(',', $q['product_id']);
				foreach($pids as $pid){
					if(!in_array($pid, $product_ids)){
						$product = pdo_get($this -> ewei_shop_goods, array('id' => $pid), array('id','displayorder', 'title', 'thumb', 'marketprice'));
						$products[$product['displayorder']] = $product;
						$product_ids[]=$pid;
					}					
				}
				list($yes,$no)=explode(';',$q['solution']);
				//var_dump($symptom[$p['id']]['detail']);
				//var_dump($q['id']);
				if(array_key_exists($q['id'], $symptom[$p['id']]['detail'])){
						$q['solution']=$yes;
						//var_dump('yes '.$yes);
						//var_dump($symptom[$p['id']]['detail'][$q['id']]);		
						//判断是否为特殊项
						if(!in_array($q['special'],  $symptom[$p['id']]['detail'][$q['id']]) && $q['special']!=-1){
							//var_dump('dddd');
							$q['solution']=$no;	
						}	
				}else{
					//var_dump('no '.$no);
					$q['solution']=$no;
				}					
			}
			$p['questions'] = $questions;
		}
		//var_dump($parts);
		//exit;
		sort($products);
		$_SESSION['uncomfortable_place']=$parts;
		$_SESSION['recommend_products']=$products;
		//var_dump($_SESSION['uncomfortable_place']);exit;
		//TODO 修改状态
		pdo_update($this -> lrj_guide_selfinspection, array('status' => 1), array('openid' => $_W['openid'], 'status' => 0));
		include $this -> template('selfinspectionresult');
	}

	//TODO 导师管理  暂时作废
	public function doWebTutormanager() {
		//这个操作被定义用来呈现 管理中心导航菜单
		load() -> func('tpl');
		global $_W;
		global $_GPC;
		// 获取query string中的参数
		$operation = !empty($_GPC['op']) ? strtolower($_GPC['op']) : 'display';
		load() -> func('tpl');
		switch($operation) {
			case 'display' :
				$sql = 'SELECT t.*,p.name as pname FROM ' . tablename($this -> lrj_guide_tutor) . ' AS t LEFT JOIN ' . tablename($this -> lrj_guide_part) . ' AS p ON t.partid=p.id';
				$list = pdo_fetchall($sql);
				break;
			case 'post' :
				$parts = array();
				$this -> tutorShowAdd($parts);
				if (checksubmit()) {
					$name = $_GPC['name'];
					$part = intval($_GPC['part']);
					$qrcodeimg = $_GPC['qrcodeimg'];
					$data = array('name' => $name, 'partid' => $part, 'createtime' => time(), 'qrcodeimg' => $qrcodeimg, 'uniacid' => $_W['uniacid'], //TODO 生产环境： $_W['uniacid'],
					);

					$tid = intval($_GPC['tid']);
					if ($tid == 0) {
						$result = pdo_insert($this -> lrj_guide_tutor, $data);
					} else {
						$result = pdo_update($this -> lrj_guide_tutor, $data, array('id' => $tid));
					}
					if (!empty($result)) {
						message('编辑导师信息成功,即将返回上一页', referer(), 'success');
					}
				}
				if ($tid = intval($_GPC['tid'])) {
					$tutor = pdo_get($this -> lrj_guide_tutor, array('id' => $tid));
				}
				break;
		}

		include $this -> template('tutormanager');
	}

	//TODO 身体部位管理
	public function doWebPartmanager() {
		//这个操作被定义用来呈现 管理中心导航菜单
		//这个操作被定义用来呈现 管理中心导航菜单
		load() -> func('tpl');
		global $_W;
		global $_GPC;
		// 获取query string中的参数
		$operation = !empty($_GPC['op']) ? strtolower($_GPC['op']) : 'display';
		switch($operation) {
			case 'display' :
				$list = pdo_getall($this -> lrj_guide_part);
			case 'post' :
				if (checksubmit()) {
					$priority = intval($_GPC['priority']);
					$name = $_GPC['part'];
					$data = array('name' => $name, 'priority' => $priority, 'createtime' => time(), 'uniacid' => $_W['uniacid'] //TODO $_W['uniacid'],
					);
					$pid = intval($_GPC['pid']);
					if ($pid == 0) {
						$result = pdo_insert($this -> lrj_guide_part, $data);
					} else {
						$result = pdo_update($this -> lrj_guide_part, $data, array('id' => $pid));
					}
					if (!empty($result)) {
						message('编辑身体部位成功,即将返回上一页', referer(), 'success');
					}
				}
				if ($pid = intval($_GPC['pid'])) {
					$part = pdo_get($this -> lrj_guide_part, array('id' => $pid));
				}
				break;
		}
		include $this -> template('partmanager');
	}

	//TODO 症状管理
	public function doWebSickmanager() {
		//这个操作被定义用来呈现 管理中心导航菜单
		load() -> func('tpl');
		global $_W;
		global $_GPC;
		// 获取query string中的参数
		$operation = !empty($_GPC['op']) ? strtolower($_GPC['op']) : 'display';
		switch($operation) {
			case 'display' :
				$index = max(1, intval($_GPC['page']));
				$min = ($index - 1) * $this -> psize;
				$sql = 'SELECT q.*,p.name as pname FROM ' . tablename($this -> lrj_guide_question) . ' AS q LEFT JOIN ' . tablename($this -> lrj_guide_part) . " AS p ON q.pid=p.id limit {$min},{$this -> psize}";
				$list = pdo_fetchall($sql);
				$total = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename($this -> lrj_guide_question));
				$page = pagination($total, $index, $this -> psize);
			case 'post' :
				$parts = array();
				$this -> tutorShowAdd($parts);
				$betters=pdo_getall($this->lrj_guide_better,null,array('id','bp_name'));
				if(empty($betters)){
					message('请先添加好转反应', create_url('site/entry/bettermanager', array( 'op' => 'post','m'=>'lrj_guide')), 'error');
				}
				if (checksubmit()) {
					$betters= implode(','  , $_GPC['betters']);	
					$product_id = implode(',', $_GPC['product']) ;
					$desc = $_GPC['desc'];
					$solution = $_GPC['solution'];
					$pid = intval($_GPC['part']);
					$name = $_GPC['name'];
					$type = intval($_GPC['type']);
					$sickImg = $_GPC['sickImg'];
					$special = intval($_GPC['special']);
					$data = array('special'=>$special,'name' => $name,'betters' => $betters, 'sickImg' => $sickImg, 'type' => $type, 'pid' => $pid, 'product_id' => $product_id, 'desc' => $desc, 'solution' => $solution, 'createtime' => time(), 'uniacid' => $_W['uniacid']//TODO $_W['uniacid'],
					);
					$qid = intval($_GPC['qid']);
					if ($qid == 0) {
						$result = pdo_insert($this -> lrj_guide_question, $data);
					} else {
						$result = pdo_update($this -> lrj_guide_question, $data, array('id' => $qid));
					}
					if (!empty($result)) {
						message('编辑身体部位成功,即将返回上一页', referer(), 'success');
					}
				}
				if ($qid = intval($_GPC['qid'])) {
					$question = pdo_get($this -> lrj_guide_question, array('id' => $qid));
					if(!empty($question['betters'])){
						$question['betters']=explode(',', $question['betters']);
					}
					if(!empty($question['product_id'])){
						$question['product_id']=explode(',', $question['product_id']);
					} 
				}
				$goods = pdo_getall($this -> ewei_shop_goods, array('uniacid' => $_W['uniacid'], 'status' => '1'), array('id', 'title'));
				if (empty($goods)) {
					message('请先添加产品', create_url('site/entry/shop', array('p' => 'goods', 'op' => 'post', 'm' => 'ewei_shop')), 'error');
				}
				break;
			case 'delete' :
				$qid = intval($_GPC['qid']);
				$result = pdo_delete($this -> lrj_guide_question, array('id' => $qid));
				if ($result) {
					message('删除身体部位成功,即将返回上一页', referer(), 'success');
				} else {
					message('删除身体部位失败,即将返回上一页', referer(), 'error');
				}
				break;
		}
		include $this -> template('sickmanager');
	}

	//TODO 自诊报告管理
	public function doWebReportmanager() {
		load() -> func('tpl');
		global $_W;
		global $_GPC;
		// 获取query string中的参数
		$operation = !empty($_GPC['op']) ? strtolower($_GPC['op']) : 'display';
		switch($operation) {
			case 'display' :
				$sql = "SELECT s.id, m.nickname,m.avatar,s.gender,s.createtime,s.status,s.type,s.type  from " . tablename($this -> lrj_guide_selfinspection) . " as s left join " . tablename("mc_mapping_fans") . " as f on s.openid=f.openid left join " . tablename("mc_members") . " as m on f.uid=m.uid where s.uniacid=:uniacid order by s.createtime desc ";
				$parmas = array(":uniacid" => $_W['uniacid']);
				$countSql = "SELECT COUNT(*) FROM " . tablename($this -> lrj_guide_selfinspection);
				$list = '';
				$pager = '';
				$this -> getPagination($sql, $parmas, $countSql, $list, $pager);
				break;
			case 'detail' :
				/*if (checksubmit()) {
				 $priority = intval($_GPC['priority']);
				 $name = $_GPC['part'];
				 $data = array('name' => $name, 'priority' => $priority, 'createtime' => time(), 'uniacid' => $_W['uniacid'] //TODO $_W['uniacid'],
				 );
				 $pid = intval($_GPC['pid']);
				 if ($pid == 0) {
				 $result = pdo_insert($this -> lrj_guide_part, $data);
				 } else {
				 $result = pdo_update($this -> lrj_guide_part, $data, array('id' => $pid));
				 }
				 if (!empty($result)) {
				 message('编辑身体部位成功,即将返回上一页', referer(), 'success');
				 }
				 }
				 if ($pid = intval($_GPC['pid'])) {
				 $part = pdo_get($this -> lrj_guide_part, array('id' => $pid));
				 }*/
				$rid = intval($_GPC['rid']);
				$sql = "SELECT s.symptom_desc,m.realname,m.mobile, m.nickname,m.avatar,s.createtime,s.status,f.openid,s.type,s.gender  from " . tablename($this -> lrj_guide_selfinspection) . " as s left join " . tablename("mc_mapping_fans") . " as f on s.openid=f.openid left join " . tablename("mc_members") . " as m on f.uid=m.uid where s.id=:rid";
				$member = pdo_fetch($sql, array(":rid" => $rid));
				if($member['type']==1){
					$sql = "select * from " . tablename($this -> lrj_guide_part) . " order by priority desc";
					$parts = pdo_fetchall($sql);
					$reportsDetail = $this -> parseResport($member['symptom_desc'], $parts);
				}else{
					//TODO 小测试
					$data=array(
							array(1=>'2点钟后','凌晨1-2点','11-12点','11点前'),
							array(1=>'睡不稳，时醒时睡','有梦且梦境清晰','有梦，醒来不记得','深度睡眠，醒后精神好'),
							array(1=>'经常','偶尔','有，只在冬天','从不'),
							array(1=>'没规律，不好说','不保证每天有','每天3次以上','每天1-2次，畅顺'),
							array(1=>'一年4次以上，10天以上康复/两年以上没有任何感冒现象','一年2~4次，10天以上康复','一年3~4次，一周左右康复','一年1~2次，一周左右康复'),
							array(1=>'辣','偏咸/甜','油多一点','清淡')
						);
						
					$selectedOption=array_filter(explode('_', $member['symptom_desc']));
					$sorce=$selectedOption[0]+$selectedOption[1]+$selectedOption[2]+$selectedOption[3]+$selectedOption[4]+($selectedOption[5]==4 ?4:1);
					$appellation='';
					if($sorce>=21 && $sorce<=24){
						$appellation=("恭喜您获得'健康达人'称号!<br/>您现在的生活模式对健康有帮助，继续保持！为让身体得到全面呵护，请进入会员专属的“健康扫描”，让健康无死角！");
					}else if($sorce>=16 && $sorce<=20){
						$appellation=("恭喜您获得'健康渐变者'称号!<br/>您的亚健康状态模式已经开启，留意健康动态并及时修正，甩掉亚健康的尾巴！快去进行健康扫描，恢复健康本色！");
					}else if($sorce>=11 && $sorce<=15){
						$appellation=("很遗憾您获得'亚健康代言人'称号!<br/>您目前处于明显亚健康状态，趁系统机能还有机会回归正轨，赶紧进入健康扫描，查找问题的所在并扭转下滑趋势。");
					}else{
						$appellation=("很遗憾您获得'逆流勇士'称号!<br/>您是一个很刚性的个体，目前初始健康信号有点弱哦。平时记得多关爱自己，诚邀您进入整体健康扫描，回归健康轨道！");
					}
					$reportsDetail=<<<EOF
					<p>1、晚上通常几点入睡:　　　　<b>{$data[0][$selectedOption[0]]}</b></p>
					<p>2、您的睡眠品质如何:　　　　<b>{$data[1][$selectedOption[1]]}</b></p>
					<p>3、是否有手脚冰凉的状况:　　<b>{$data[2][$selectedOption[2]]}</b></p>
					<p>4、您的排便情况:　　　　　　<b>{$data[3][$selectedOption[3]]}</b></p>
					<p>5、您的感冒情况:　　　　	  <b>{$data[4][$selectedOption[4]]}</b></p>
					<p>6、您平常喜欢的口味:　　　　<b>{$data[5][$selectedOption[5]]}</b></p>
					<h3>成绩({$sorce}分):</h3>
					<p>{$appellation}</p>
EOF;
				}
				break;
		}
		include $this -> template('reportmanager');
	}
	
	//TODO 好转反应管理
	public function doWebBettermanager(){
		//这个操作被定义用来呈现 管理中心导航菜单
		load() -> func('tpl');
		global $_W;
		global $_GPC;
		// 获取query string中的参数
		$operation = !empty($_GPC['op']) ? strtolower($_GPC['op']) : 'display';
		switch($operation) {
			case 'display' :
				$list = pdo_getall($this -> lrj_guide_better);
			case 'post' :
				if (checksubmit()) {
					$answer = $_GPC['answer'];
					$name = $_GPC['part'];
					$data = array('bp_name' => $name, 'bp_answer' => $answer, 'createtime' => time(), 'uniacid' => $_W['uniacid'] //TODO $_W['uniacid'],
					);
					$bid = intval($_GPC['bid']);
					if ($pid == 0) {
						$result = pdo_insert($this -> lrj_guide_better, $data);
					} else {
						$result = pdo_update($this -> lrj_guide_better, $data, array('id' => $bid));
					}
					if (!empty($result)) {
						message('编辑好转反应成功,即将返回上一页', referer(), 'success');
					}
				}
				if ($bid = intval($_GPC['bid'])) {
					$better = pdo_get($this -> lrj_guide_better, array('id' => $bid));
				}
				break;
		}
		include $this -> template('bettermanager');	
	}
	
	
	private function tutorShowAdd(&$parts) {
		//查找身体部位
		$parts = pdo_getall($this -> lrj_guide_part);
		if (empty($parts)) {
			message('请先添加导师服务的身体部位', create_url('site/entry/partmanager', array('op' => 'post', 'm' => 'lrj_guide')), 'error');
		}
	}

	/**
	 * 返回数组的维度
	 * @param  [type] $arr [description]
	 * @return [type]      [description]
	 */
	private function arrayLevel($arr) {
		$al = array(0);
		function aL($arr, &$al, $level = 0) {
			if (is_array($arr)) {
				$level++;
				$al[] = $level;
				foreach ($arr as $v) {
					aL($v, $al, $level);
				}
			}
		}

		aL($arr, $al);
		return max($al);
	}
	
	private function checkWechat(){
				//判断是否微信浏览器
		if(!$this->is_weixin()){
			die("<!DOCTYPE html>
                <html>
                    <head>
                        <meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=0'>
                        <title>抱歉，出错了</title><meta charset='utf-8'><meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=0'><link rel='stylesheet' type='text/css' href='https://res.wx.qq.com/connect/zh_CN/htmledition/style/wap_err1a9853.css'>
                    </head>
                    <body>
                    <div class='page_msg'><div class='inner'><span class='msg_icon_wrp'><i class='icon80_smile'></i></span><div class='msg_content'><h4>请在微信客户端打开链接</h4></div></div></div>
                    </body>
                </html>");
		}
	}
	
	private function getSelfinspectionResult($openid, $parts) {
		global $_W;
		$record = pdo_get($this -> lrj_guide_selfinspection, array('openid' => $openid, 'status' => 0), array('symptom_desc', 'gender'));
		//$resultArr = $this -> parseResport($record['symptom_desc'], $parts);
		$symptom_desc_arr = explode(';', $record['symptom_desc']);
			$temp = 0;
			// TODO 更改需求，不用列出唯一的一个，新需求是根据身体部位的优先级显示所有产品
			foreach ($symptom_desc_arr as $desc) {
				list($exist_pid, $exist_symptom, $exist_extra) = explode('-', $desc);
				foreach ($parts as &$v) {
					if ($v['id'] == $exist_pid) {
						$v['count'] = count(explode('.', $exist_symptom));
						if(!empty($exist_extra)){
							$arr=explode('.', $exist_extra);
							foreach($arr as $v){
								list($pid,$did)=explode('_', $v);
								$tempArr[$pid][]=$did;
							}
							$exist_extra=$tempArr;
						}
						$resultArr[$exist_pid] = array('pid' => $exist_pid, 'qid' => $exist_symptom, 'count' => $v['count'], 'detail' => $exist_extra);
						break;
					}
				}
			}
		$result = isset($resultArr) ? $resultArr : $result;
		if ($parts === NULL) {
			return $result;
		}
		$_SESSION['symptom'] = $result;
		$_SESSION['gender'] = $record['gender'];
	}

	//解析报告内容
	private function parseResport($symptom_desc, $parts) {
		$symptom_desc_arr = array_filter(explode(';', $symptom_desc));
		$temp = 0;
		$exist_symptoms = '';
		foreach ($symptom_desc_arr as $desc) {
			list($exist_pid, $exist_symptom, $exist_extra) = explode('-', $desc);
			$exist_symptoms = str_replace(".", ",", $exist_symptom);
			$sql = "SELECT p.`name` as part,q.`name` as question,q.`special`, g.title as product,q.`desc`,q.solution,q.id FROM ims_lrj_guide_part as p 
							LEFT JOIN ims_lrj_guide_question as q ON q.pid=p.id 
							LEFT JOIN ims_ewei_shop_goods g ON q.product_id=g.id WHERE q.id in ({$exist_symptoms}) ORDER BY g.displayorder DESC";
			$resutl = pdo_fetchall($sql);
			$detail[$exist_pid]=$resutl;
			//TODO 有没有选择额外选项
			if (!empty($exist_extra)) {
				$extras = explode('.', $exist_extra);		
				foreach ($detail[$exist_pid] as &$d) {
					$desc_detail = '';
					$special=FALSE;
					foreach ($extras as $e) {
						list($id, $descid) = explode('_', $e);
						if ($d['id'] == $id) {
							//TODO 存缓存
							$arr = explode(';', $d['desc']);
							$desc_detail .= ($arr[$descid] . ';');
							//TODO 如果是特殊选项
							if($descid==$d['special']){
								$special=TRUE;
							}
						}
					}
					list($has, $no) = explode(';', $d['solution']);
					//不为特殊且有选项
					if ( $special ||  ($d['special'] == -1 && !empty($desc_detail)) ) {
						$no = $has;
					}
					$d['desc'] = $desc_detail;
					$d['solution'] =  $no;
				}
			} else {
				foreach ($detail[$exist_pid] as &$d) {
					list($has, $no) = explode(';', $d['solution']);
					$d['solution'] = $no;
					$d['desc'] = '';
				}
			}
		}
	 	return $detail;
	}

	private function getPagination($sql = '', $parmas = null, $countSql, &$list, &$pager) {
		global $_GPC;
		$index = max(1, intval($_GPC['page']));
		$min = ($index - 1) * $this -> psize;
		$sql .= (" limit {$min},{$this -> psize}");
		$list = pdo_fetchall($sql, $parmas);
		$total = pdo_fetchcolumn($countSql);
		$pager = pagination($total, $index, $this -> psize);
	}
	
	//TODO 获取用户的合法性
	private function getMember(){
		global $_W;
		load() -> model('mc');
		$userinfo = mc_oauth_userinfo(); //TODO 说明，这里会把用户的微信信息存到mc_mapping_fans表中。
		$openid=empty($userinfo['openid']) ? '':$userinfo['openid'];
	 	$member=null;
	 	if($openid){
	 		$member=pdo_get('ewei_shop_member',array('uniacid'=>$_W['uniacid'],'openid'=>$openid,'isagent'=>1,'status'=>1));
	 		if($member){
	 			$_SESSION['agent']=$member;
	 		}
		}
		return $member;
	}
	
	private function getAgent($mid){
		$agent=pdo_get('ewei_shop_member',array('id'=>$mid),array('mobile'));
		if($agent){
			$_SESSION['agentmobile']=$agent['mobile'];
		}
	}
	private	function is_weixin() {
	if (empty($_SERVER['HTTP_USER_AGENT']) || strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') === false && strpos($_SERVER['HTTP_USER_AGENT'], 'Windows Phone') === false) {
		return false;
	} 
	return true;
} 
}
