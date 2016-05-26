<?php

namespace FNVi\Settings\Schemas;
use FNVi\Mongo\Schema;
/**
 * Settings objects will represent one or more settings stored within mongo.
 * This is desgined to be flexible while keeping to the object oriented nature
 * of the mongo driver, a name is given for the settings and the data can be 
 * of any type (key value, array, string, integer);
 * 
 * For anything more complex this class could should be extended to provide
 * specific storage of properties as well as methods to work with it.
 *
 * @author Joe Wheatley <joew@fnvi.co.uk>
 */
class Settings extends Schema{
    
    public $name;
    public $data;
    
    public function __construct($name, $data = null) {
        parent::__construct();
        $this->name = $name;
        $this->data = $data;
    }
}
