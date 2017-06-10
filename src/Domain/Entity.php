<?php
namespace Domain;

class Entity {
    private $id;

    /**
     * @return id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Entity constructor.
     * @param $id of the entity
     */
    protected function __construct($id) {
        $this->id = $id;
    }

}