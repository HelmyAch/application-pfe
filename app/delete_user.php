<?php
    require '../config/config.php';
    if(empty($_SESSION['username'])) {
        header('Location: login.php');  
        exit(); // Assurez-vous de quitter le script après une redirection
    }

    // Vérifiez si l'ID de l'utilisateur à supprimer est passé en paramètre GET
    if(isset($_GET['id'])) {
        $userId = $_GET['id'];
        
        // Supprimez l'utilisateur de la base de données
        try {
            $sqlQuery = "DELETE FROM users WHERE id = :id";
            $stmt = $connect->prepare($sqlQuery);
            $stmt->bindParam(':id', $userId);
            $stmt->execute();

            // Redirigez vers la page listant les utilisateurs après la suppression
            header('Location: users.php?success=true');  
            exit(); // Assurez-vous de quitter le script après une redirection
        } catch(PDOException $e) {
            $errMsg = $e->getMessage();
            // Gérez l'erreur
            echo "Erreur : " . $errMsg;
        }   
    } else {
        // Redirigez vers la page listant les utilisateurs si aucun ID n'est fourni
        header('Location: users.php');  
        exit(); // Assurez-vous de quitter le script après une redirection
    }
?>



