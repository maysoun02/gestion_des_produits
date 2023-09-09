<?php
require_once '../config.php';
require_once '../models/user.php';

class userC {
    

    public function AjouterUser($user)
    {
        $db = config::getConnexion();
        $sql = "INSERT INTO `user` (`username`, `pass`, `roles`) VALUES (:username, :pass, :roles)";
        
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':username', $user->getUsername());
            $query->bindValue(':pass', $user->getPass());
            $query->bindValue(':roles', $user->getRoles());
            
            $success = $query->execute();
            
            if ($success) {
                // Insertion was successful
                echo 'User added successfully.';
            } else {
                // Insertion failed
                echo 'Failed to add user.';
            }
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    

public function AfficherAbonnements()
{
    $sql = 'SELECT * FROM `user`';
    $db = config::getConnexion();

    try {
        $stmt = $db->query($sql);
        $users = array(); // Initialize an array to store user objects

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a new user object for each row of data
            $user = new user($row['username'], $row['pass'], $row['roles']);
            $users[] = $user; // Add the user object to the array
        }

        return $users; // Return the array of user objects
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

public function login($username,$pass,$roles)
{
    $sql = "SELECT * FROM `user` WHERE username:$username and pass:$pass and roles:$roles" ;
    $db = config::getConnexion();

    try {
        $stmt = $db->query($sql);
        $users = array(); // Initialize an array to store user objects

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a new user object for each row of data
            $user = new user($row['username'], $row['pass'], $row['roles']);
            $users[] = $user; // Add the user object to the array
            if($roles = "admin"){
                header('Location: afficherproduct.php');
            }else{
		        header('Location: user.php');
	    }
        }

        return $users; // Return the array of user objects
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

}

?>