<?php
require_once('TypeSafe/ServletModule.php');
require_once('MongoDBSecurityManager.php');


/**
 * 
 * @author Tobias Sarnowski
 */ 
class MongoDBSecurityManagerModule extends ServletModule {

    public function configuration() {
        $this->bind('SecurityManager')->to('MongoDBSecurityManager')->inRequestScope();
    }
}
