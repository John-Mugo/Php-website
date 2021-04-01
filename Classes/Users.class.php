<?php

class Users extends Db{
    
    protected function setUser($radiobtn ,$regname, $regcode, $regmail, $hashedpsw, $actcode) {
        session_start ();


        switch ($radiobtn) {
            case 'hospital':
                 $sql = "INSERT INTO hospital (Institution_Name, Reg_Code, Email, Pass_word, Activation_code) VALUES (?, ?, ?, ?, ?)";
                 $stmt = $this->connect()->prepare($sql);
                 $result = $stmt->execute([$regname, $regcode, $regmail, $hashedpsw, $actcode ]);

                 if (!$result){

                    $_SESSION['regerrors'] = ("System Busy!!! Please try again in a while.");
                    header("location: ../php/Index.php?regerror");
                    exit();
                } else{
                    header("location: ../php/Hospital.php");
                }  

                break;

            case 'pharmacy':
                    $sql = "INSERT INTO pharmacy (Institution_Name, Reg_Code, Email, Pass_word, Activation_code) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $this->connect()->prepare($sql);
                    $result = $stmt->execute([$regname, $regcode, $regmail, $hashedpsw, $actcode]);

                    if (!$result) {

                        $_SESSION['regerrors'] = ("System Busy!!! Please try again in a while.");
                        header("location: ../php/Index.php?regerror");
                        exit();
                    } else{
                        header("location: ../php/Pharmacy.php");
                    }

                   break; 
                
            case 'company':
                    $sql = "INSERT INTO company (Institution_Name, Reg_Code, Email, Pass_word, Activation_code) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $this->connect()->prepare($sql);
                    $result = $stmt->execute([$regname, $regcode, $regmail, $hashedpsw, $actcode]);

                     if (!$result) {

                        $_SESSION['regerrors'] = ("System Busy!!! Please try again in a while.");
                        header("location: ../php/Index.php?regerror");
                         exit();
                     } else {
                        header("location: ../php/Company.php");
                     }

                   break;
            
            default:
                # code...
                break;

        }

    }





    
    protected function getUser($name, $password, $radiobtn1){
        session_start ();
          
        switch ($radiobtn1) {
            case 'hospital':
                $sql = "SELECT ID, Pass_word FROM hospital  WHERE institution_name = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$name]);
                $user = $stmt->fetch();
         
                if(!password_verify($password, $user['Pass_word'])) {
    
                    $_SESSION['errors'] = ("Invalid Username or Password");
                    header("location: ../php/Index.php?error");
                    exit();
                }else{
                    header("location: ../php/Hospital.php");
                }  
             break;



            case 'company':
                $sql = "SELECT Pass_word FROM company  WHERE institution_name = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$name]);
                $user = $stmt->fetch();
             
                  if(!password_verify($password, $user['Pass_word'])) {
        
                    $_SESSION['errors'] = ("Invalid Username or Password.");
                    header("location: ../php/Index.php?error");
                    exit();

                    }else {
                        header("location: ../php/Company.php");
                     }
                   break;


                case 'pharmacy':
                    $sql = "SELECT Pass_word FROM pharmacy  WHERE institution_name = ?";
                    $stmt = $this->connect()->prepare($sql);
                    $stmt->execute([$name]);
                    $user = $stmt->fetch();
                 
                        if(!password_verify($password, $user['Pass_word'])) {
            
                            $_SESSION['errors'] = ("Invalid Username or Password.");
                            header("location: ../php/Index.php?error");
                
                            exit();
            
                    } else{
                        header("location: ../php/Pharmacy.php");
                    }
                  break;
            
            default:
                # code...
                break;
        }
            

            } 
            

            

    


}