<?php

class NewsController
{

    public function actionIndex()
    {
        echo 'News Index';
        return true;
    }

    public function actionView($i, $b)
    {
        echo 'News Wiev '.$i.' '.$b;
        return true;
    }

}