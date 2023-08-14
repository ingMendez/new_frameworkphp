<?php

// Helpers/ViewHelper.php

class ViewHelper {
    public static function view($viewName) {
        $viewPath = __DIR__ . '/../app/Views/' . $viewName . '.php';
        
        if (file_exists($viewPath)) {
            ob_start();
            include $viewPath;
            return ob_get_clean();
        } else {
            throw new Exception("Vista no encontrada: $viewName");
        }
    }
}
