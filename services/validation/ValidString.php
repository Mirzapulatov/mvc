<?php
namespace services\validation;
/**
 * Class to test data
 * @author RGame
 * @version 1.0
 */
class ValidString
{
    /*public function validate($value, array $constraints = []) {
        foreach ($constraints as $constraint) {
            if (!$constraint instanceof Constraint) {
                //TODo throw type exception
            }
            $constraint->validate($value);
        }
    }*/

    /**
     * Checking the login
     * @param $text login to check
     * @return boolean
     */
    public function checkUserName($userName)
    {
        $userName = trim($userName);
        if (!$this->stringLength($userName, 3, 20)) {
            return false;
        } else {
            return (preg_match("#^[a-zA-Z0-9\-]+$#", $userName));
        }
    }

    /**
     * Checking the string on its size
     * @param $text variable string
     * @param int $min minimum length of the string
     * @param int $max maximum length of the string
     * @return boolean
     */
    public function stringLength($text, $min, $max)
    {
        $sizeStr = strlen($text);
        return ($sizeStr >= $min and $sizeStr <= $max);
    }

    /**
     * Checking the email
     * @param $text email to check
     * @return boolean
     */
    public function checkEmail($email)
    {
        if (!$this->stringLength($email, 7, 150)) {
            return false;
        } else {
            return (preg_match("#^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+(\.([A-Za-z0-9])+)+$#", $email));
        }
    }
}
