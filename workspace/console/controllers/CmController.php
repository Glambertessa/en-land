<?php


namespace workspace\console\controllers;


use core\component_manager\lib\CmService;
use core\console\ConsoleController;

class CmController extends ConsoleController
{
    public function actionDownload()
    {
        try {
            if (!isset($this->argv['slug'])) {
                throw new \Exception('Missing "--slug" specified');
            }
            else {
                $cm = new CmService();
                $cm->download($this->argv['slug']);
            }
        } catch (\Exception $e) {
            $this->out->r('Message: ' .$e->getMessage(), 'red');
        }
    }
}