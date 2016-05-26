<?php

namespace FNVi\Settings\Collections;
use FNVi\Mongo\Collection;
/**
 * The settings collection
 *
 * @author Joe Wheatley <joew@fnvi.co.uk>
 */
class Settings extends Collection{
    
    public function findByName($name){
        return $this->findOne(["name"=>$name]);
    }
    
}
