<?php


namespace core\component_manager\lib;


class RelationsHandler
{
    public $relations = [];
    public $data = [];

    /**
     * @param $slug
     */
    public function init($slug)
    {
        $data = explode(",",
            json_decode(file_get_contents('workspace/modules/' . $slug . '/manifest.json'))->relations);

        foreach ($data as $relation)
            if(!in_array($relation, $this->data)) {
                $rel = new Relations();
                $rel->slug = $relation;
                $rel->status = 0;
                array_push($this->relations, $rel);
                array_push($this->data, $relation);
            }
    }

    /**
     * @return array
     */
    public function arr() : array
    {
        for($i = 0; $i < count($this->relations); $i++)
            foreach ($this->relations as $relation)
                if($relation->status == 0) {
                    $this->init($relation->slug);
                    $relation->status = 1;
                }

        return $this->relations;
    }
}