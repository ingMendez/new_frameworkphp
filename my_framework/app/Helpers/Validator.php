<?php

class Validator
{
    public static function validate(array $data, array $rules)
    {
        $errors = [];

        foreach ($rules as $field => $rule) {
            $rulesArray = explode('|', $rule);

            foreach ($rulesArray as $singleRule) {
                $ruleParts = explode(':', $singleRule);
                $ruleName = $ruleParts[0];

                if ($ruleName === 'required') {
                    if (!isset($data[$field]) || empty($data[$field])) {
                        $errors[$field][] = 'El campo es obligatorio.';
                    }
                } elseif ($ruleName === 'email') {
                    if (!filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
                        $errors[$field][] = 'El formato de correo electrónico es inválido.';
                    }
                } elseif ($ruleName === 'min') {
                    $minLength = $ruleParts[1];
                    if (strlen($data[$field]) < $minLength) {
                        $errors[$field][] = "El campo debe tener al menos $minLength caracteres.";
                    }
                }
                // Agregar más reglas según sea necesario
            }
        }

        return $errors;
    }
}
