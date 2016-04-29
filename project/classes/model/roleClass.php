<?php


class Role {
    
    private $id;
    private $name;
    private $active;
 
    public function Role($id, $name, $active) {

        $this->id = $id;
        $this->name = $name;
        $this->active = $active;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getActive() {
        return $this->active;
    }


}
