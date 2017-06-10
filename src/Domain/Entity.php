<?php
namespace Domain;

class Entity {
    private $id;

    /**
     * @return integer id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Entity constructor.
     * @param $id integer of the entity
     */
    protected function __construct($id) {
        $this->id = $id;
    }

}