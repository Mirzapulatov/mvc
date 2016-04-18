<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 18.04.16
 * Time: 10:25
 */
namespace services\change;

class ChangeString
{
    /**
     * Resize string
     * @return string
     */
    public function resizeString($str, $max, $postfix = "...")
    {
        return mb_substr($str, 0, $max, 'UTF-8') . $postfix;
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