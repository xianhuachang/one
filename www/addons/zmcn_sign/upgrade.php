<?php
 if(pdo_fieldexists('mc_credits_record', 'module')) {
	pdo_query("update " . tablename('mc_credits_record') ." set module = 'zmcn_sign' where remark LIKE '每日签到：%' ");
}

pdo_query("ALTER TABLE " . tablename('mc_credits_record') ." ADD INDEX(`remark`)");
pdo_query("ALTER TABLE " . tablename('mc_credits_record') ." ADD INDEX(`uid`)");
pdo_query("ALTER TABLE " . tablename('mc_credits_record') ." ADD INDEX(`operator`)");
pdo_query("ALTER TABLE " . tablename('mc_credits_record') ." ADD INDEX(`createtime`)");