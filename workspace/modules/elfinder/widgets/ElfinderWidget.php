<?php


namespace workspace\modules\elfinder\widgets;


use core\Widget;

class ElfinderWidget extends Widget
{

    public $viewPath = '/modules/elfinder/widgets/views/';

    public function run()
    {
        $this->regCss();
        $this->regJs();
        return $this->view->getTpl('elfinder.tpl');
    }

    protected function regCss()
    {
        $this->view->registerCss('/workspace/modules/elfinder/src/jquery/jquery-ui-1.12.0.css');

        $this->view->registerCss('/workspace/modules/elfinder/src/css/commands.css');
        $this->view->registerCss('/workspace/modules/elfinder/src/css/common.css');
        $this->view->registerCss('/workspace/modules/elfinder/src/css/contextmenu.css');
        $this->view->registerCss('/workspace/modules/elfinder/src/css/cwd.css');
        $this->view->registerCss('/workspace/modules/elfinder/src/css/dialog.css');
        $this->view->registerCss('/workspace/modules/elfinder/src/css/fonts.css');
        $this->view->registerCss('/workspace/modules/elfinder/src/css/navbar.css');
        $this->view->registerCss('/workspace/modules/elfinder/src/css/places.css');
        $this->view->registerCss('/workspace/modules/elfinder/src/css/quicklook.css');
        $this->view->registerCss('/workspace/modules/elfinder/src/css/statusbar.css');
        $this->view->registerCss('/workspace/modules/elfinder/src/css/theme.css');
        $this->view->registerCss('/workspace/modules/elfinder/src/css/toast.css');
        $this->view->registerCss('/workspace/modules/elfinder/src/css/toolbar.css');

        /* Custom css file */
        $this->view->registerCss('/workspace/modules/elfinder/src/css/custom.css');
    }

    protected function regJs()
    {
        $this->view->registerJs('/workspace/modules/elfinder/src/jquery/jquery-1.12.4.js', ['type' => 'text/javascript', 'charset' => 'utf-8'], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/jquery/jquery-ui-1.12.0.js', ['type' => 'text/javascript', 'charset' => 'utf-8'], true);

        $this->view->registerJs('/workspace/modules/elfinder/src/js/elFinder.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/elFinder.version.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/jquery.elfinder.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/elFinder.mimetypes.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/elFinder.options.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/elFinder.options.netmount.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/elFinder.history.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/elFinder.command.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/elFinder.resources.js', [], true);

        $this->view->registerJs('/workspace/modules/elfinder/src/js/jquery.dialogelfinder.js', [], true);

        $this->view->registerJs('/workspace/modules/elfinder/src/js/i18n/elfinder.en.js', [], true);

        $this->view->registerJs('/workspace/modules/elfinder/src/js/ui/button.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/ui/contextmenu.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/ui/cwd.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/ui/dialog.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/ui/fullscreenbutton.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/ui/navbar.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/ui/navdock.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/ui/overlay.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/ui/panel.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/ui/path.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/ui/places.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/ui/searchbutton.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/ui/sortbutton.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/ui/stat.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/ui/toast.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/ui/toolbar.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/ui/tree.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/ui/uploadButton.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/ui/viewbutton.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/ui/workzone.js', [], true);

        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/archive.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/back.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/chmod.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/colwidth.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/copy.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/cut.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/download.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/duplicate.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/edit.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/empty.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/extract.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/forward.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/fullscreen.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/getfile.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/help.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/hidden.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/hide.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/home.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/info.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/mkdir.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/mkfile.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/netmount.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/open.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/opendir.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/opennew.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/paste.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/places.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/preference.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/quicklook.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/quicklook.plugins.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/reload.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/rename.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/resize.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/restore.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/rm.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/search.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/selectall.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/selectinvert.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/selectnone.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/sort.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/undo.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/up.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/upload.js', [], true);
        $this->view->registerJs('/workspace/modules/elfinder/src/js/commands/view.js', [], true);

        $this->view->registerJs('/workspace/modules/elfinder/src/js/extras/editors.default.js', [], true);

        $this->view->registerJs('/workspace/modules/elfinder/assets/js/elfinder.js', [], true);

        /* Custom js file */
        //$this->view->registerJs('/workspace/modules/elfinder/src/js/custom.js', [], true);
    }

}