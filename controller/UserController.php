<?php 

class UsersController{

    private $file_path = "../resources/users.json";

    public function store($user){        

        $data = $this->getAll();
        array_push($data->data, $user);
        $json = json_encode($data);
        file_put_contents($this->file_path, $json);
        
    }

    public function login($username, $password){        
        $data = $this->getAll();

        $tmp = array();
        foreach ($data->data as $item) {
            if ($item->username == $username && $item->password == $password) {
                array_push($tmp, $item);
        }
        }
        return count($tmp);

    }

    public function getAll(){ 
        
        $json = file_get_contents($this->file_path);
        $data = json_decode($json);      

        return $data;

    }

    public function validateEmail(String $email){ 
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        return preg_match($regex, $email);
    }

    public function validatePhone(String $phone){ 
        $regex = "/^[+]*[]{0,1}[0-9]*$/"; 
        return preg_match($regex, $phone);
    }

    public function validateUserName(String $username){ 
        $regex = '/[A-Za-z]/'; 
        return preg_match($regex, $username);
    }

    public function validatePassword(String $password){ 
        $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[*-.])[A-Za-z\d#$@!%&*?]{8}$/'; 
        return preg_match($regex, $password);
    }

}