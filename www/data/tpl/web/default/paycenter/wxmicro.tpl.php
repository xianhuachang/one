<?php defined('IN_IA') or exit('Access Denied');?><?php  $newUI = true;?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li <?php  if($do == 'pay') { ?>class="active"<?php  } ?>><a href="<?php  echo url('wxpay/micro/pay');?>">刷卡收款</a></li>
</ul>

<?php  if($do == 'pay') { ?>
<div class="clearfix" ng-controller="microPay" id="microPay">
	<div class="panel panel-default">
		<div class="panel-heading">刷卡收款</div>
		<div class="panel-body">
			<div class="col-lg-5">
				<form action="" class="form" method="post" id="form1">
					<div class="form-group">
						<label>商品描述</label>
						<input type="text" name="body" class="form-control" ng-model="micro.config.body" placeholder="商品名称">
					</div>
					<div class="form-group">
						<label>支付金额</label>
						<input type="text" name="fee" class="form-control" ng-model="micro.config.fee" ng-init="micro.config.fee" placeholder="支付金额(至少0.01元)">
					</div>
					<?php  if(!empty($card_set)) { ?>
					<div ng-show="micro.config.body && micro.config.fee">
						<div class="form-group">
							<label>会员卡卡号</label>
							<div class="input-group">
								<input type="text" name="cardsn" class="form-control" ng-model="micro.config.cardsn" placeholder="输入会员卡卡号">
								<span class="input-group-btn"><span class="btn btn-success" ng-click="micro.checkCard()">校 验</span></span>
							</div>
						</div>
					</div>
					<table class="table table-hover table-bordered" ng-show="micro.config.member.uid > 0">
						<tr>
							<td colspan="4" style="text-align:center"><h4>{{micro.config.cardsn}}</h4></td>
						</tr>
						<tr>
							<th width="100">姓名</th>
							<td>{{micro.config.member.realname}}</td>
							<th>手机号</th>
							<td>{{micro.config.member.mobile}}</td>
						</tr>
						<tr>
							<th>积分</th>
							<td>{{micro.config.member.credit1}}</td>
							<th>余额</th>
							<td>{{micro.config.member.credit2}}</td>
						</tr>
						<tr>
							<th>会员等级</th>
							<td>{{micro.config.member.groupname}}</td>
							<th>优惠信息</th>
							<td>{{micro.config.member.discount_cn}}</td>
						</tr>
					</table>
					<div class="form-group" ng-show="micro.config.member.uid > 0">
						<label>实际支付金额</label>
						<input type="text" name="fact_fee" class="form-control" ng-model="micro.config.fact_fee" readonly>
					</div>
					<div ng-if="micro.config.fact_fee > 0">
						<div class="form-group">
							<label>支付方式</label>
							<table class="table table-hover table-bordered">
								<tr>
									<td>
										<label class="checkbox-inline"><input type="checkbox" value="1" ng-model="micro.is_credit1_pay" ng-click="micro.checkCredit1()"/> 积分抵现</label>
										<div class="input-group">
											<input type="text" class="form-control" value="" ng-model="micro.config.credit1" ng-disabled="!micro.is_credit1_pay"/>
											<span class="input-group-addon">积分 抵消</span>
											<input type="text" class="form-control" value="" ng-model="micro.config.offset_money" ng-disabled="!micro.is_credit1_pay"/>
											<span class="input-group-addon">元</span>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<label class="checkbox-inline"><input type="checkbox" value="1" ng-model="micro.is_credit2_pay" ng-click="micro.checkCredit2()"/> 余额支付</label>
										<div class="input-group">
											<input type="text" class="form-control" value="" ng-model="micro.config.credit2" ng-disabled="!micro.is_credit2_pay"/>
											<span class="input-group-addon">元</span>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<label class="checkbox-inline"><input type="checkbox" value="1" ng-model="micro.is_cash_pay" ng-click="micro.checkCash()"/> 现金支付</label>
										<div class="input-group">
											<input type="text" class="form-control" value="" ng-model="micro.config.cash" ng-disabled="!micro.is_cash_pay"/>
											<span class="input-group-addon">元</span>
										</div>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<?php  } ?>
					<div class="form-group">
						<label>刷卡授权码</label>
						<input type="text" name="code" class="form-control" ng-model="micro.config.code" placeholder="微信刷卡支付授权码(请链接扫码枪扫码)">
					</div>
					<div class="form-group text-right">
						<a class="btn btn-primary" id="micro-submit" ng-click="micro.submit()">确认收款</a>
						<a class="btn btn-success" id="micro-query" ng-show="micro.show_query == 1" ng-click="micro.query()">查询支付情况</a>
					</div>
				</form>
			</div>
			<div class="col-lg-2">
			</div>
			<div class="col-lg-5">
				<table class="table table-hover table-bordered">
					<tr>
						<th colspan="3" style="text-align:center"><h4>会员卡信息</h4></th>
					</tr>
					<tr>
						<th style="width:150px">付款返积分比率: </th>
						<td colspan="2">每消费 1 元赠送 <?php  echo $grant_rate;?> 积分</td>
					</tr>
					<tr>
						<th width="150">积分抵现金比率: </th>
						<td colspan="2"><?php  echo $card_set['offset_rate'];?> 积分抵 1 元, 单次最多可抵现 <?php  echo $card_set['offset_max'];?> 元</td>
					</tr>
					<?php  if($card_set['discount_type'] > 0 && !empty($card_set['discount'])) { ?>
					<?php  if(is_array($card_set['discount'])) { foreach($card_set['discount'] as $key => $row) { ?>
					<tr>
						<th width="150"><?php  echo $_W['account']['groups'][$key]['title'];?>: </th>
						<?php  if($card_set['discount_type'] == 1) { ?>
						<td colspan="2">满 <?php  echo $row['condition'];?> 元减 <?php  echo $row['discount'];?> 元</td>
						<?php  } else { ?>
						<td colspan="2">满 <?php  echo $row['condition'];?> 元打 <?php  echo $row['discount'] * 10?> 折</td>
						<?php  } ?>
					</tr>
					<?php  } } ?>
					<?php  } ?>
				</table>
			</div>
		</div>
	</div>
</div>
<?php  } ?>

<script>
require(['angular', 'underscore'], function(angular, _){
	angular.module('app', []).controller('microPay', function($scope, $http){
		var card_set_str = '<?php  echo $card_set_str;?>';
		var card = $.parseJSON(card_set_str);
		$scope.micro = {
			config: {
				body: '测试商品',
				fee: '0.01',
				cardsn: '',
				card: card,
				credit1: 0,
				credit2: 0,
				offset_money: 0,
				cash: 0,
				member: {
					uid: 0
				}
			}
		};
		$scope.micro.checkBasic = function() {
			var body = $.trim($scope.micro.config.body);
			if(!body) {
				util.message('商品名称不能为空');
				return false;
			}
			var reg = /^(([1-9]{1}\d*)|([0]{1}))(\.(\d){1,2})?$/;
			var fee = $.trim($scope.micro.config.fee);
			if(!reg.test(fee)) {
				util.message('支付金额不能少于0.01元');
				return false;
			}
		};

		$scope.micro.checkCard = function() {
			$scope.micro.checkBasic();
			var cardsn = $.trim($scope.micro.config.cardsn);
			if(!cardsn) {
				util.message('卡号不能为空');
				return false;
			}
			$http.post("<?php  echo url('paycenter/card/check');?>", {cardsn: cardsn}).success(function(dat){
				if(dat.message.errno == -1) {
					util.message(dat.message.message, '', 'error');
				} else{
					$scope.micro.config.member = dat.message.message;
					$scope.micro.config.fact_fee = $scope.micro.config.fee;
					if($scope.micro.config.member.discount_type > 0 && $scope.micro.config.member.discount && ($scope.micro.config.fee >= $scope.micro.config.member.discount.condition)) {
						if($scope.micro.config.member.discount_type == 1) {
							$scope.micro.config.fact_fee = $scope.micro.config.fee - $scope.micro.config.member.discount.discount;
						} else {
							$scope.micro.config.fact_fee = $scope.micro.config.fee * $scope.micro.config.member.discount.discount;
						}
						if($scope.micro.config.fact_fee < 0) {
							$scope.micro.config.fact_fee = 0;
						}
					}
					$scope.micro.last_money = $scope.micro.config.fact_fee;
					return false;
				}
			});
		};

		$scope.micro.checkCredit1 = function() {
			$scope.micro.checkLast_money();
			if(!$scope.micro.is_credit1_pay) {
				$scope.micro.config.credit1 = 0;
				$scope.micro.config.offset_money = 0;
			} else {
				if($scope.micro.last_money <= 0) {
					$scope.micro.is_credit1_pay = false;
					return false;
				}
				if($scope.micro.config.card['offset_rate'] > 0 && $scope.micro.config.card['offset_max'] > 0) {
					var min = Math.min.apply(null, [$scope.micro.config.member.credit1, $scope.micro.config.card.offset_rate * $scope.micro.config.card.offset_max, $scope.micro.config.card.offset_rate * $scope.micro.last_money]);
					$scope.micro.config.credit1 = min;
					$scope.micro.config.offset_money = min/$scope.micro.config.card.offset_rate;
				}
			}
			$scope.micro.checkLast_money();
		}

		$scope.micro.checkCredit2 = function() {
			$scope.micro.checkLast_money();
			if(!$scope.micro.is_credit2_pay) {
				$scope.micro.config.credit2 = 0;
			} else {
				if($scope.micro.last_money <= 0) {
					$scope.micro.is_credit2_pay = false;
					return false;
				}
				$scope.micro.config.credit2 = Math.min.apply(null, [$scope.micro.config.member.credit2, $scope.micro.last_money]);
			}
			$scope.micro.checkLast_money();
		}

		$scope.micro.checkCash = function() {
			$scope.micro.checkLast_money();
			if(!$scope.micro.is_cash_pay) {
				$scope.micro.config.cash = 0;
			} else {
				if($scope.micro.last_money <= 0) {
					$scope.micro.is_cash_pay = false;
					return false;
				}
				$scope.micro.config.cash = $scope.micro.last_money;
			}
		}

		$scope.micro.checkLast_money = function() {
			$scope.micro.last_money = $scope.micro.config.fact_fee - $scope.micro.config.credit2 - $scope.micro.config.offset_money - $scope.micro.config.cash;
		}

		$scope.micro.query = function() {
			if(!$scope.micro.uniontid) {
				util.message('系统错误', '', 'error');
				return false;
			}
			$http.post("<?php  echo url('paycenter/wxmicro/query');?>", {uniontid: $scope.micro.uniontid}).success(function(data){
				if(data.message.errno == 0) {
					util.message('支付成功', '', 'success');
					location.reload();
				} else {
					util.message('支付失败:' + data.message.message, '', 'error');
				}
			});
		}

		$scope.micro.submit = function() {
			if($scope.micro.config.member.uid > 0) {
				$scope.micro.checkLast_money();
				if($scope.micro.last_money != 0) {
					util.message('支付方式设置的支付金额不等于实际支付金额', '', 'error');
					return false;
				}
			}
			if(!$.trim($scope.micro.config.code)) {
				util.message('支付授权码不能为空', '', 'error');
				return false;
			}

			$http.post("<?php  echo url('paycenter/wxmicro/pay');?>", $scope.micro.config).success(function(data){
				if(data.message.errno == 0) {
					util.message('支付成功', '', 'success');
					location.reload();
				} else if(data.message.errno == -1) {
					util.message('支付失败:' + data.message.message, '', 'error');
					$('#form1 :text[name="code"]').val('');
				} else if(data.message.errno == -10) {
					util.message('支付失败:' + data.message.message + '<br>请点击"查询支付情况"来查询订单支付状态', '', 'error');
					$scope.micro.show_query = 1;
					$scope.micro.uniontid = data.message.uniontid;
				}
				return false;
			});
		}
	});
	angular.bootstrap($('#microPay')[0], ['app']);
});


</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
