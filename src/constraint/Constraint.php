<?php

namespace App\src\constraint;

class Constraint
{

    public function notBlank($name, $value)
    {
        if (empty($value)) {
            return '<p>Le champ ' . $name . ' saisi est vide</p>';
        }
    }

    public function minLength($name, $value, $minSize)
    {
        if (strlen($value) < $minSize) {
            return '<p>Le champ ' . $name . ' doit contenir au moins
            ' . $minSize . ' caractères</p>';
        }
    }

    public function maxLength($name, $value, $maxSize)
    {
        if (strlen($value) > $maxSize) {
            return '<p>Le champ ' . $name . ' doit contenir au maximum
            ' . $maxSize . ' caractères</p>';
        }
    }
    public function configValid($name, $value)
    {
        if (!preg_match("#[0-9]+#", $value)) {
            return '<p>Le champ ' . $name . ' doit contenir au moins 1 chiffre</p>';
        } elseif (!preg_match("#[A-Z]+#", $value)) {
            return '<p>Le champ ' . $name . ' doit contenir au moins 1 majuscule</p>';
        } elseif (!preg_match("#[a-z]+#", $value)) {
            return '<p>Le champ ' . $name . ' doit contenir au moins 1 minuscule</p>';
        }elseif (!preg_match("#[$\*\.,+\-=@]+#", $value)) {
            return '<p>Le champ ' . $name . ' doit contenir au moins 1 caractère spécial</p>';
        }
    }
}
