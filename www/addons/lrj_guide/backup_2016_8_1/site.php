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
	private $ewei_shop_goods='ewei_shop_goods';//TODO 商品表
	private $psize = 15;
	
	//TODO 自检
	public function doMobileSelfinspection() {
		//这个操作被定义用来呈现 功能封面
		load() -> func('tpl');
		global $_W;
		global $_GPC;
		$parts = pdo_getall($this -> lrj_guide_part);
		$pid = max(1, intval($_GPC['pid']));
		$t = empty($_GPC['t']) ? '1' : intval($_GPC['t']);
		$uniacid = $_W['uniacid'];
		//TODO 正式生产使用 $_W['uniacid']
		$openid = $_W['openid'];
		$do = 'symptom';
		$gender=3;
		$record = pdo_get($this -> lrj_guide_selfinspection, array('openid' => $openid, 'status' => 0));
		//TODO 正式生产使用 $_W['openid']
		if (checksubmit()) {
			//TODO 先从数据库中查找是否存在没有提交的记录， 比对部位  存在修改症状，否则新增症状
			if (!empty($_GPC['parent'])) {
				$q = array();
				foreach ($_GPC['parent'] as $v) {
					list($pid, $qid) = explode('_', $v);
					$q[$pid][$qid] = array();
				}
				if (!empty($_GPC['child'])) {
					foreach ($_GPC['child'] as $v) {
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
					$data = array('createtime' => time(),'gender' => $t,  'uniacid' => $uniacid, 'openid' => $openid, 'tid' => $tid, 'symptom_desc' => $desc);
					$result = pdo_insert($this -> lrj_guide_selfinspection, $data);
				}
				if ($result) {
					$this -> getSelfinspectionResult($parts);
					message("自诊数据提交成功", $this -> createMobileUrl('selfinspectionresult'), 'success');
				} else {
					message("自诊数据没有任何修改", $this -> createMobileUrl('symptom'), 'error');
				}
			}
		}
		$this -> getSelfinspectionResult($parts);
		if(!empty($record)){
			$gender=$record['gender'];
			$t=$gender;
		}
		
		include $this -> template('selfinspection');
	}

	//TODO 显示具体症状
	public function doMobileSymptom() {
		global $_W, $_GPC;
		error_reporting(0);
		load() -> func('tpl');
		$pid = intval($_GPC['pid']);
		$type = intval($_GPC['t']);
		$sql = 'SELECT * FROM ' . tablename($this -> lrj_guide_question) . ' WHERE  `type` IN ' . "({$type},2) ORDER BY pid";
		$questions = pdo_fetchall($sql);
		$parts = pdo_getall($this -> lrj_guide_part);
		$record=pdo_get($this->lrj_guide_selfinspection,array('openid'=>$_W['openid'],'status'=>'0'),array('symptom_desc'));
		if(!empty($record)){
			$rArr=explode(';', $record['symptom_desc']);
			$rArr=array_filter($rArr);
			$count=0;
			foreach($rArr as $v){
				list($epid,$qids,$dids)=explode('-', $v);
				if($count==0){
					$pid=$epid;
				}
				$count++;
				if(!empty($qids)){
					$qidsArr=explode('.', $qids);
					foreach($qidsArr as $q){
						if(!empty($dids)){
							$didsArr=explode('.', $dids);
							foreach($didsArr as $d){
								list($eqid,$did)=explode('_', $d);
								if($eqid==$q){
									$selected[$epid][$q][]=$did;
								}
							}
						}
					}
				}		
			}
		}
		foreach ($questions as &$v) {
			$v['desc'] = explode(';', $v['desc']);
			$newQuestions[$v['pid']][] = $v;
		}
		include $this -> template('symptom');
	}

	//TODO 自检结果
	public function doMobileSelfinspectionresult() {
		global $_W, $_GPC;
		load() -> func('tpl');
		$symptom = $_SESSION['symptom'];
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
		foreach($parts as &$p){
			$qid = str_replace('.', ',', $symptom[$p['id']]['qid']);
			$sql = 'SELECT *,"'.$symptom[$p['id']]['detail'].'" as detail FROM ' . tablename($this -> lrj_guide_question) . " WHERE id IN ({$qid})";
			$questions = pdo_fetchall($sql);
			foreach($questions as $q){
				$product=pdo_get($this->ewei_shop_goods,array('id'=>$q['product_id']),array('id','title','thumb','marketprice'));
				$products[$q['product_id']]=$product;
			}
			$p['questions']=$questions; 
		}
		//TODO 修改状态
		pdo_update($this->lrj_guide_selfinspection,array('status'=>1),array('openid'=>$_W['openid'],'status'=>0));
		include $this -> template('selfinspectionresult');
	}

	//TODO 导师管理
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
				$max = $index * $this -> psize;
				$sql = 'SELECT q.*,p.name as pname FROM ' . tablename($this -> lrj_guide_question) . ' AS q LEFT JOIN ' . tablename($this -> lrj_guide_part) . " AS p ON q.pid=p.id limit {$min},{$max}";
				$list = pdo_fetchall($sql);
				$total = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename($this -> lrj_guide_question));
				$page = pagination($total, $index);
			case 'post' :
				$parts = array();
				$this -> tutorShowAdd($parts);
				if (checksubmit()) {
					$product_id = intval($_GPC['product']);
					$desc = $_GPC['desc'];
					$solution = $_GPC['solution'];
					$pid = intval($_GPC['part']);
					$name = $_GPC['name'];
					$type = intval($_GPC['type']);
					$sickImg = $_GPC['sickImg'];
					$data = array('name' => $name, 'sickImg' => $sickImg, 'type' => $type, 'pid' => $pid, 'product_id' => $product_id, 'desc' => $desc, 'solution' => $solution, 'createtime' => time(), 'uniacid' => $_W['uniacid']//TODO $_W['uniacid'],
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
				}
				$goods=pdo_getall($this->ewei_shop_goods,array('uniacid'=>$_W['uniacid'],'status'=>'1'),array('id','title'));
				if(empty($goods)){
					message('请先添加产品', create_url('site/entry/shop', array('p' => 'goods','op'=>'post' ,'m' => 'ewei_shop')), 'error');
				}
				break;
		}
		include $this -> template('sickmanager');
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

	private function getSelfinspectionResult($parts = NULL) {
		 	global $_W;
	 		$record=pdo_get($this -> lrj_guide_selfinspection, array('openid' =>$_W['openid'], 'status' => 0),array('symptom_desc','gender'));
			$symptom_desc_arr = explode(';', $record['symptom_desc']);
			$temp = 0;
			// TODO 更改需求，不用列出唯一的一个，新需求是根据身体部位的优先级显示所有产品
			foreach ($symptom_desc_arr as $desc) {
				list($exist_pid, $exist_symptom, $exist_extra) = explode('-', $desc);
				foreach ($parts as &$v) {
					if ($v['id'] == $exist_pid) {
						$v['count'] = count(explode('.', $exist_symptom));
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

}
