<?php
/**
 * Created by PhpStorm.
 * User: YELLOVE
 * Date: 1/8/2016
 * Time: 10:03 AM
 */

namespace Clockos;


class LevelCalculate
{

    public function toLevel($exp,$now)
    {

        if($exp<11){
            $level = 1;
        }elseif($exp>33162760){
            $level = 255;
        }else{
            $level = floor(pow((($exp-10)/2), 1/3));
        }

        if($level<= $now){
            $level = $now;
        }

        return $level;
    }
    
    public function toExp($level)
    {
        if($level == 1){
            $exp = 26;
        }else{
            $exp = 2*pow($level, 3) + 10;
        }

        return $exp;
    }
    
    
    public function expPerLevel($level)
    {

        if($level == 1){
            $exp = 26;
        }elseif($level == 255)){
            $exp = '∞';
        }else{
            $exp = 6*$level*$level + 6*$level +2;
        }

        return $exp;
    }
    
    
    
}
