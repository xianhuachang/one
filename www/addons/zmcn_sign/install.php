<?php
pdo_query("ALTER TABLE " . tablename('mc_credits_record') ." ADD INDEX(`remark`)");
pdo_query("ALTER TABLE " . tablename('mc_credits_record') ." ADD INDEX(`uid`)");
pdo_query("ALTER TABLE " . tablename('mc_credits_record') ." ADD INDEX(`operator`)");
pdo_query("ALTER TABLE " . tablename('mc_credits_record') ." ADD INDEX(`createtime`)");
