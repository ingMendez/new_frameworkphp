<?php

class ErrorHandler
{
    public static function showError($message)
    {
        // Puedes personalizar cómo se muestra el mensaje de error al usuario
        echo "<p>Error: $message</p>";
    }
}
