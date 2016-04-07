<?php
Class Navigation
{
    public function leafThrough($module, $current, $limit, $listCount)
    {
        $limit = ceil($limit/$listCount);
        $minPage = $current-2;
        $str = "";
        $minPage = max($minPage, 1);
        $str.= '<p class="pages"><small>Page '.$current.' of '.$limit.'</small>';
        for($i=$minPage;$i<($minPage+5) and $i<=$limit;$i++){
            if($i==$current){
                $str.= '<span>'.$i.'</span>';
            }else{
                $str.= '<a href="/'.$module.'/'.$i.'">'.$i.'</a>';
            }
        }
        return $str.'</p>';
    }
}