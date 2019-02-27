<?php
/************
 * 二分查找法php实现
 ************/

//二分查找法仅适用于有序数组，算法时间复杂度为O(logn)
function searchByMid($list, $value)
{
    $start = 0;
    $end = count($list)-1;
    echo '目标数组：'.json_encode($list).' 查找数据：'.$value.'<br>';
    $i = 0;
    while ($start <= $end) {
        $i++;
        $mid = floor(($start+$end)/2);
        $guess = $list[$mid];
        echo '初始值：start:'.$start.' end:'.$end.' mid:'.$mid.'<br>';
        if ($guess == $value) {
            echo '第 '.$i.' 次循环：start：'.$start.' end:'.$end.' mid:'.$mid.'<br>';
            return '该元素存在于数组中第'.$mid.'位'; //定位到元素后返回元素位置并结束循环（使用return结束循环，或者break跳出循环）
            //break;
        }
        if ($guess < $value) {
            $start = $mid+1;
            echo '第 '.$i.' 次循环：start：'.$start.' end:'.$end.' mid:'.$mid.'<br>';
        }
        if ($guess > $value) {
            $end = $mid-1;
            echo '第 '.$i.' 次循环：start：'.$start.' end:'.$end.' mid:'.$mid.'<br>';
        }
    }
    return '数组中无此元素';
}

$list1 = array(1,3,5,7,9);
$list2 = array(2,4,6,8,10);
print_r(searchByMid($list2, 10));


?>