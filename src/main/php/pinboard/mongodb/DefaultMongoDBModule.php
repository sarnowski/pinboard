<?php
require_once('TypeSafe/ServletModule.php');
require_once('DefaultMongoDB.php');


/**
 * 
 * @author Tobias Sarnowski
 */ 
class DefaultMongoDBModule extends ServletModule {

    public function configuration() {
        $this->bind('MongoDB')->to('DefaultMongoDB')->inRequestScope();
    }
}
