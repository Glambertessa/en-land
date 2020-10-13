<?php


namespace core\code_generator;


use core\App;
use Illuminate\Database\Capsule\Manager as DB;


class CodeGeneratorController
{
    public function genModule($table, $slug, $module, $model)
    {
        $info = '';
        $basePath = 'workspace/modules/' . $module;

        $this->genFolderTree($basePath, $module);

        $dummyData['{dummyModule}'] = $module;
        $dummyData['{dummyModuleClass}'] = ucfirst($module);
        $dummyData['{dummyModulePath}'] = 'workspace\modules\\' . $module;
        $dummyData['{dummyModel}'] = $model;
        $dummyData['{dummyModelsPath}'] = 'workspace\modules\\' . $module . '\models';
        $dummyData['{dummySearchRequest}'] = $model . 'SearchRequest';
        $dummyData['{dummySearchRequestPath}'] = 'workspace\modules\\' . $module . '\requests';
        $dummyData['{dummyController}'] = $model . 'Controller';
        $dummyData['{dummyControllerPath}'] = $basePath . '/controllers/';
        $dummyData['{dummyControllerNamespace}'] = 'workspace\modules\\' . $module . '\controllers';
        $dummyData['{dummyViewsPath}'] = '/modules/' . $module . '/views/';

        $dummyData['{dummyTable}'] = $table;
        $dummyData['{dummySlug}'] = $slug;
        $dummyData['{dummyPrefix}'] = 'admin';

        $dummyData['{dummyTitle}'] = $model;
        $dummyData['{dummyUrl}'] = '/' . $dummyData['{dummyPrefix}'] . '/' . $slug;
        $dummyData['{dummyIcon}'] = '<i class="nav-icon fa fa-file"></i>';

        $dummyData['{dummyConfig}'] = $module;

        $dummyData['{dummyCrateActionPath}'] = '/' . $dummyData['{dummyPrefix}'] . '/' . $dummyData['{dummySlug}']
            . '/create';
        $dummyData['{dummyEditActionPath}'] = '/' . $dummyData['{dummyPrefix}'] . '/' . $dummyData['{dummySlug}']
            . '/update/{$model->id}';
        $dummyData['{dummyModelId}'] = '$model->id';
        $dummyData['{dummyBreadcrumb}'] = 'id';


        $info .= $this->genConfig($basePath . '/config/' . $dummyData['{dummyModule}'] . '.php', $dummyData);

        $info .= $this->genRouting($basePath . '/routing/rout.php', $dummyData);

        $info .= $this->genModuleClass($basePath . '/' . ucfirst($dummyData['{dummyModule}']) . '.php', $dummyData);

        $info .= $this->genManifest($basePath . '/manifest.json', $dummyData);

        $info .= $this->genModels($basePath . '/models/' . $dummyData['{dummyModel}'] . '.php', $dummyData);

        $info .= $this->genRequests($basePath . '/requests/' . $dummyData['{dummySearchRequest}'] . '.php',
            $dummyData);

        $info .= $this->genViews($basePath . '/views/' . $dummyData['{dummyModule}'], $dummyData);

        $info .= $this->genControllers($basePath . '/controllers/' . $dummyData['{dummyController}'] . '.php',
            $dummyData);

        return $info;
    }

    public function genDir($path)
    {
        if(!is_dir($path)) mkdir($path, 0775);
    }

    public function genFolderTree($basePath, $module)
    {
        $this->genDir($basePath);
        $this->genDir($basePath . '/config');
        $this->genDir($basePath . '/controllers');
        $this->genDir($basePath . '/models');
        $this->genDir($basePath . '/requests');
        $this->genDir($basePath . '/routing');
        $this->genDir($basePath . '/views');
        $this->genDir($basePath . '/views/' . $module);
    }

    public function genConfig($pathToFile, $dummyData)
    {
        return $this->generate(__DIR__ . '/stubs/config.stub', $pathToFile, $dummyData);
    }

    public function genControllers($pathToFile, $dummyData)
    {
        $sql_fields = "SHOW COLUMNS FROM " . $dummyData['{dummyTable}'];
        $fields = DB::select($sql_fields);

        $dummyData['{dummyCondition}'] = '';
        $dummyData['{dummyOptionFields}'] = '';

        foreach ($fields as $field) {
            if($field->Field != 'id' && $field->Field != 'created_at' && $field->Field != 'updated_at')
                $dummyData['{dummyCondition}'] .= 'isset($_POST["' . $field->Field . '"]) && ';
            $dummyData['{dummyOptionFields}'] .=  "                '" . $field->Field . "' => '" . ucfirst($field->Field) . "',\n";
        }
        $dummyData['{dummyCondition}'] = substr( $dummyData['{dummyCondition}'], 0, -4);
        $dummyData['{dummyOptionFields}'] = substr( $dummyData['{dummyOptionFields}'], 0, -1);

        return $this->generate(__DIR__ . '/stubs/controller.stub', $pathToFile, $dummyData);
    }

    public function genModels($pathToFile, $dummyData)
    {
        $sql_fields = "SHOW COLUMNS FROM " . $dummyData['{dummyTable}'];
        $fields = DB::select($sql_fields);

        $modelFields = "";
        $searchQuery = "";
        $dummyData['{dummySaveData}'] = '';

        $searchQueryStub = file_get_contents(__DIR__ . '/stubs/searchQuery.stub');
        foreach ($fields as $field) {
            if($field->Field != 'id') {
                $modelFields .= "'" . $field->Field . "', ";
                if($field->Field != 'created_at' && $field->Field != 'updated_at')
                    $dummyData['{dummySaveData}'] .= '            $this->' . $field->Field . ' = $_POST["' . $field->Field . '"];' . "\n";
            }

            $searchQuery .= str_replace('{dummyField}', $field->Field, $searchQueryStub) . "\n\n";
        }
        $modelFields = substr($modelFields, 0, -2);

        $dummyData['{dummyFields}'] = $modelFields;
        $dummyData['{dummySearchQuery}'] = $searchQuery;

        return $this->generate(__DIR__ . '/stubs/model.stub', $pathToFile, $dummyData);
    }

    public function genRequests($pathToFile, $dummyData)
    {
        $sql_fields = "SHOW COLUMNS FROM " . $dummyData['{dummyTable}'];
        $fields = DB::select($sql_fields);

        $propertyFields = "";
        $modelFields = "";
        foreach ($fields as $field) {
            $propertyFields .= " * @property " . $field->Type . " " . $field->Field . "\n";
            $modelFields .= "    public $" . $field->Field . ";\n";
        }
        $dummyData['{dummyPropertyFields}'] = $propertyFields;
        $dummyData['{dummyFields}'] = $modelFields;

        return $this->generate(__DIR__ . '/stubs/search.stub', $pathToFile, $dummyData);
    }

    public function genRouting($pathToFile, $dummyData)
    {
        return $this->generate(__DIR__ . '/stubs/rout.stub', $pathToFile, $dummyData);
    }

    public function genInputField($inputFieldStub, $field, $type)
    {
        $inputFieldStub = str_replace('{dummyField}', $field->Field, $inputFieldStub);
        $inputFieldStub = str_replace('{dummyLabel}', ucfirst($field->Field), $inputFieldStub);
        ($field->Null == 'NO') ?
            $inputFieldStub = str_replace('{dummyRequired}', 'required="required"', $inputFieldStub) :
            $inputFieldStub = str_replace('{dummyRequired}', '', $inputFieldStub);
        ($type == 'edit') ?
            $inputFieldStub = str_replace('{dummyFieldValue}', 'value="{$model->' . $field->Field . '}"',
                $inputFieldStub) :
            $inputFieldStub = str_replace('{dummyFieldValue}', '', $inputFieldStub);

        return $inputFieldStub . "\n\n";
    }

    public function genViews($pathToDir, $dummyData)
    {
        $info = '';
        $sql_fields = "SHOW COLUMNS FROM " . $dummyData['{dummyTable}'];
        $fields = DB::select($sql_fields);

        $inputField = file_get_contents(__DIR__ . '/stubs/views/inputField.stub');
        $storeInputField = '';
        $editInputField = '';

        foreach ($fields as $field) {
            if($field->Field != 'id' && $field->Field != 'created_at' && $field->Field != 'updated_at') {
                $storeInputField .= $this->genInputField($inputField, $field, 'store');
                $editInputField .= $this->genInputField($inputField, $field, 'edit');
            }
        }
        $dummyData['{dummyStoreInputField}'] = $storeInputField;
        $dummyData['{dummyEditInputField}'] = $editInputField;

        $info .= $this->generate(__DIR__ . '/stubs/views/index.stub', $pathToDir . '/index.tpl',
            $dummyData);

        $info .= $this->generate(__DIR__ . '/stubs/views/view.stub', $pathToDir . '/view.tpl',
            $dummyData);

        $info .= $this->generate(__DIR__ . '/stubs/views/store.stub', $pathToDir . '/store.tpl',
            $dummyData);

        $info .= $this->generate(__DIR__ . '/stubs/views/edit.stub', $pathToDir . '/edit.tpl',
            $dummyData);

        return $info;
    }

    public function genModuleClass($pathToFile, $dummyData)
    {
        return $this->generate(__DIR__ . '/stubs/moduleClass.stub', $pathToFile, $dummyData);
    }

    public function genManifest($manifestPath, $dummyData)
    {
        return $this->generate(__DIR__ . '/stubs/manifest.stub', $manifestPath, $dummyData);
    }

    public function generate($stub, $filePath, $dummyData)
    {
        if(!file_exists($filePath)) {
            $file = file_get_contents($stub);

            foreach ($dummyData as $key => $data)
                $file = str_replace($key, $data, $file);

            file_put_contents($filePath, $file);
            chmod($filePath, 0775);

            return '<span class="gen_success">' . $filePath . '</span> was generated successfully<br>';
        } else {
            return '<span class="gen_existed">' . $filePath . '</span> already exist<br>';
        }
    }

    public function getTables() : array
    {
        $sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA = '"
            . App::$config['db']['db_name'] . "'";

        return DB::select($sql);
    }
}