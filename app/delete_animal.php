<?php
require '../config/config.php';

// Vérifier si l'ID de l'animal à supprimer est passé en paramètre
if(isset($_GET['id'])) {
    // Récupérer l'ID de l'animal depuis les paramètres GET
    $animalId = $_GET['id'];

    try {
        // Préparer la requête SQL pour supprimer l'animal avec l'ID donné
        $sql = "DELETE FROM animals WHERE id = :id";
        $stmt = $connect->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':id', $animalId);

        // Exécution de la requête
        if($stmt->execute()) {
            // Redirection vers la page précédente avec un paramètre 'success' si la suppression réussit
            header("Location: {$_SERVER['HTTP_REFERER']}?success=true");
            exit();
        } else {
            // Redirection vers la page précédente avec un paramètre 'error' si la suppression échoue
            header("Location: {$_SERVER['HTTP_REFERER']}?error=true");
            exit();
        }
    } catch(PDOException $e) {
        // En cas d'erreur, redirection vers la page précédente avec un paramètre 'error' et un message d'erreur
        header("Location: {$_SERVER['HTTP_REFERER']}?error=true&message=" . urlencode($e->getMessage()));
        exit();
    }
} else {
    // Redirection vers la page précédente si aucun ID d'animal n'est fourni
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
?>
