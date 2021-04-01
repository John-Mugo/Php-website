<?php
class UsersView extends Users{

    public function login($name, $password, $radiobtn1) {
        $this->getUser($name, $password, $radiobtn1);

        session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $name;
		$_SESSION['id'] = $this->user['id'];
    }
    
}