<?php

namespace Tecgdcs;


<<<<<<< Updated upstream
use Tecgdcs\Exceptions\ValidationRuleNotFoundException;
require __DIR__.'/helpers/function.php';

=======
>>>>>>> Stashed changes
class Validator
{
    public static function required(string $field_name): bool
    {
        if (
            ! array_key_exists($field_name, $_REQUEST)
            || trim($_REQUEST[$field_name]) === ''
        ) {
            $_SESSION['errors'][$field_name] =
                sprintf(MESSAGES['required'], $field_name);

            return false;
        }

        return true;
    }

    public static function email(string $field_name): bool
    {
        if (
            array_key_exists($field_name, $_REQUEST) &&
            trim($_REQUEST[$field_name]) !== '' &&
            ! filter_var(trim($_REQUEST[$field_name]), FILTER_VALIDATE_EMAIL)
        ) {
            $_SESSION['errors'][$field_name] = sprintf(MESSAGES['email'], $field_name);

            return false;
        }

        return true;
    }

    public static function phone(string $field_name): bool
    {
        if (
            array_key_exists($field_name, $_REQUEST) &&
            trim($_REQUEST[$field_name]) !== '' &&
            (
                strlen($_REQUEST[$field_name]) < 9 ||
                ! is_numeric(
                    str_replace(['+', '(', ')', ' '], '', $_REQUEST[$field_name])
                )
            )
        ) {
            $_SESSION['errors'][$field_name] = sprintf(MESSAGES['phone'], $field_name);

            return false;
        }

        return true;
    }

    public static function same(string $verification_field_name, string $original_field_name): bool
    {
        if (
            array_key_exists($verification_field_name, $_REQUEST) &&
            array_key_exists($original_field_name, $_REQUEST)
        ) {
            if (
                trim($_REQUEST[$verification_field_name]) !==
                trim($_REQUEST[$original_field_name])
            ) {
                $_SESSION['errors'][$verification_field_name] =
                    sprintf(MESSAGES['same'], $verification_field_name, $original_field_name);

                return false;
            }

            return true;
        }

        return false;
    }

    public static function in_collection(string $field_name, string $collection_name): bool
    {
        $collection = require CONFIG_DIR.'/'.$collection_name.'.php';
        if (
            array_key_exists($field_name, $_REQUEST) &&
            trim($_REQUEST[$field_name]) !== '' &&
            ! array_key_exists($_REQUEST[$field_name], $collection)
        ) {
            $_SESSION['errors'][$field_name] =
                sprintf(MESSAGES['in_collection'], $field_name, $collection_name);

            return false;
        }

        return true;
    }

    public static function check(array $constraints)
    {
        try {
            self::parse_constraints($constraints);
<<<<<<< Updated upstream
        } catch (ValidationRuleNotFoundException $e) { // On a défini des exceptions
            die($e->getMessage());
=======
        } catch (ValidationRuleNotFoundException $e) {
            exit($e->getMessage());
>>>>>>> Stashed changes
        }

        if (isset($_SESSION['errors'])) {
            $_SESSION['old'] = $_REQUEST;
<<<<<<< Updated upstream
            header('Location: /index.php');
            exit;
=======
            back();
>>>>>>> Stashed changes
        }
    }

    private static function parse_constraints(array $constraints): void
    {
        $param1 = '';
        foreach ($constraints as $field_name => $rules) {
            $array_rules = explode('|', $rules);
            foreach ($array_rules as $rule) {
            \info($rule);
                if (str_contains($rule,':')){ // cherche une rule ou il y a => :
                    [$rule, $param1] = explode(':', $rule); // explode same:email/in_collection:countries en lui ajoute un nouveau parametre param1
                }
<<<<<<< Updated upstream
                if (!method_exists(__CLASS__, $rule)){
                    throw new ValidationRuleNotFoundException($rule.' n’existe pas');
=======

                if (! method_exists(__CLASS__, $method)) {
                    throw new ValidationRuleNotFoundException($method);
>>>>>>> Stashed changes
                }
                self::$rule($field_name, $param1);
            }
        }
    }
}
