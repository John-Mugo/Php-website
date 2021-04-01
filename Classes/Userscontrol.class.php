<?php
class UsersControl extends Users{
    

    public function CreateUser($radiobtn ,$regname, $regcode, $regmail, $regpsw1) {

      //hash the password
      $hashedpsw = password_hash($regpsw1, PASSWORD_DEFAULT );

      //generate a unique activation code
        $actcode = uniqid();

        $this->setUser($radiobtn, $regname, $regcode, $regmail, $hashedpsw,  $actcode);

       
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $regname;
        $_SESSION['id'] = $this->user['id'];
    }
}