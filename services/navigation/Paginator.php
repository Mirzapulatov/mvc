<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 18.04.16
 * Time: 10:28
 */
namespace services\navigation;

class Paginator
{
    /**
     * Pagination
     * @param string $module
     * @param int    $current
     * @param int    $limit
     * @param int    $listCount
     * @return string
     */
    public function leafThrough($module, $current, $limit, $listCount)
    {
        $limit = ceil($limit / $listCount);
        $minPage = max($current - 2, 1);
        $maxPage = min($minPage + 4, $limit);
        $str = '<p class="pages"><small>Page ' . $current . ' of ' . $limit . '</small>';
        for ($i = $minPage; $i <= $maxPage; $i++) {
            if ($i == $current) {
                $str = sprintf('%s <span>' . $i . '</span>', $str);
            } else {
                $str = sprintf('%s <a href="/' . $module . '/' . $i . '">' . $i . '</a>', $str);
            }
        }
        return $str . '</p>';
    }
}