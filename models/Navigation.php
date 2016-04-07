<?php
Class Navigation
{
    public function leaf($modul, $total, $limit, $listCount)
    {
        $limit = ceil($limit/$listCount);
        $start = $total-2;
        $str = "";
        if($start<1) $start = 1;
        $str.= '<p class="pages"><small>Page '.$total.' of '.$limit.'</small>';
        for($i=$start;$i<$start+5 and $i<=$limit;$i++){
            if($i==$total){
                $str.= '<span>'.$i.'</span>';
            }else{
                $str.= '<a href="/'.$modul.'/'.$i.'">'.$i.'</a>';
            }
        }
        return $str.'</p></div>';
    }
}