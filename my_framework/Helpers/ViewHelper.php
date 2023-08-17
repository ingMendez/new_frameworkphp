<?php

// Helpers/ViewHelper.php

class ViewHelper {
    public static function view($viewName,$data = []) {
        $viewPath = __DIR__ . '/../app/Views/' . $viewName . '.php';
        
        if (file_exists($viewPath)) {
            extract($data); 
            ob_start();
            include $viewPath;
            return ob_get_clean();
        } else {
            throw new Exception("Vista no encontrada: $viewName");
        }
    }
}
