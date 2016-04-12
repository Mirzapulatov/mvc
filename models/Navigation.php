<?php
Class Navigation
{
    /**
     * Pagination
     * @param string $module
     * @param int $current
     * @param int $limit
     * @param int $listCount
     * @return string
     */
    public function leafThrough($module, $current, $limit, $listCount)
    {
        $limit = ceil($limit/$listCount);
        $minPage = $current-2;
        $minPage = max($minPage, 1);
        $str = '<p class="pages"><small>Page '.$current.' of '.$limit.'</small>';
        for($i=$minPage;$i<($minPage+5) and $i<=$limit;$i++){
            if($i==$current){
                $str = sprintf('%s <span>'.$i.'</span>',$str);
            }else{
                $str = sprintf('%s <a href="/'.$module.'/'.$i.'">'.$i.'</a>',$str);
            }
        }
        return $str.'</p>';
    }
}