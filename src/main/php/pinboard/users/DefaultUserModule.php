<?php
require_once('TypeSafe/ServletModule.php');
require_once('DefaultUserProvider.php');
require_once('DefaultUserService.php');


/**
 * 
 * @author Tobias Sarnowski
 */ 
class DefaultUserModule extends ServletModule {

    public function configuration() {
        $this->bind('UserService')->to('DefaultUserService')->inRequestScope();
        $this->bind('UserProvider')->to('DefaultUserProvider')->inRequestScope();
    }
}
