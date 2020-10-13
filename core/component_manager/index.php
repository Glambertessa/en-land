<?php

use core\component_manager\lib\CM;
use core\component_manager\lib\CmService;
use core\component_manager\lib\Mod;

require __DIR__ . '/init.php';

$cms = new CmService();
$cmm = new Mod();
$cm = new CM();

$cms->getComponentInfo('adminlte');

$cm->service->rep->getRep();

$cm->download('adminlte');

$cm->updateCurrentVersion('adminlte');

$cm->save('datatables',['version' => '0.2', 'status' => 'active']);

$cm->modDeleteFromJson('datatables');

$cm->modChangeStatus('datatables', ['status' => 'inactive']);

$cm->modChangeVersion('datatables',['version' => '0.3']);

$cm->checkVersion('adminlte');

$cm->getVersions('adminlte');

$cm->getAllVersions();

$cm->getSlugLoc();

$cm->getComponentsInfo();

$cm->getByStatus('active');

$cm->isInstalled('adminlte');

$cm->getIsInstalled('adminlte');

$cm->getLocMod('adminlte');

$cm->deleteMod('adminlte');

$cm->modChangeStatusToActive('adminlte');

$cm->modChangeStatusToInactive('adminlte');