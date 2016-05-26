<?php

namespace FNVi\Settings\Collections;
use FNVi\Mongo\Collection;
use FNVi\Settings\Schemas\Settings as SettingsItem;
/**
 * The settings collection
 *
 * @author Joe Wheatley <joew@fnvi.co.uk>
 */
class Settings extends Collection{
    
    /**
     * 
     * @param string $name
     * @return SettingsItem
     */
    public function findByName($name){
        return $this->findOne(["name"=>$name]);
    }
    
}
