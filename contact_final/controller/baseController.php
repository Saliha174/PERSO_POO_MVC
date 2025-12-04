<?php 

namespace Controller;
// use Controller\ContactController;
abstract class BaseController
{
    /**
     * Méthode pour afficher une vue
     * 
     * @param string $view Nom de la vue (sans extension .php)
     * @param array $data Données à transmettre à la vue
     */
    protected function render($view, $data = [])
    {
        // Extrait les données pour les rendre disponibles sous forme de variables
        extract($data);

        // Chemin vers la vue
        $viewPath = __DIR__ . '/../views/' . $view . '.php';

        if (file_exists($viewPath)) {
            // Inclure le header, la vue et le footer
            require __DIR__ . '/../inc/header.php';
            require $viewPath;
            require __DIR__ . '/../inc/footer.php';
        } else {
            echo "Vue introuvable : $viewPath";
        }
    }
}





















?>