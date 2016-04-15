<?php
namespace models;
/**
 * Class to test data
 * @author RGame
 * @version 1.0
 */
class Checker
{
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

    /**
     * Checking the Site
     * @param $text site to check
     * @return boolean
     */
    public function checkSite($site)
    {
        if (!$this->stringLength($site, 12, 150)) {
            return false;
        } else {
            return (preg_match("#([a-z0-9\-])+\.([a-z0-9])+$#", $site));
        }
    }


    /**
     * Resize string
     * @return string
     */
    public function resizeString($str,$max)
    {
        return mb_substr($str, 0, $max, 'UTF-8') . '...';
    }


    /**
     * CheckXSS
     * @param string $msg
     * @return string
     */
    public function CheckXSS($msg)
    {
            if (is_array($msg)) {
                foreach($msg as $key => $val) {
                    $msg[$key] = check($val);
                }
            } else {
                $msg = htmlspecialchars($msg);
                $search = array('|', '\'', '$', '\\', '^', '%', '`', "\0", "\x00", "\x1A", chr(226) . chr(128) . chr(174));
                $replace = array('&#124;', '&#39;', '&#36;', '&#92;', '&#94;', '&#37;', '&#96;', '', '', '', '');

                $msg = str_replace($search, $replace, $msg);
                $msg = stripslashes(trim($msg));
            }

            return $msg;
    }
}
