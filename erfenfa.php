<?php
/************
 * 二分查找法php实现
 ************/

//二分查找法仅适用于有序数组，算法时间复杂度为O(log(n))
//类比事件：100以内猜数字游戏，每次猜的数字取区间中间值附近值为最佳选择
//假设目标数字为79
//第一次猜50，小了，区间定位为[51-100];
//第二次猜75，小了，区间定位为[76-100];
//第三次猜85，大了，区间定位为[76-84];
//第四次猜80，大了，区间定位为[76-79];
//第五次猜78，小了，区间定位为[79];

function searchByMid($list, $value)
{
    if (empty($list) || empty($value)) return '参数错误';
    $start = 0;
    $end = count($list)-1;
    echo '目标数组：'.json_encode($list).' 查找数据：'.$value.'<br>';
    $i = 0;
    while ($start <= $end) {  //确保最后一次循环只定位到一个元素
        $i++;
        $mid = floor(($start+$end)/2); //定位中间位置坐标，向下取整
        $guess = $list[$mid];
        echo '初始值：start:'.$start.' end:'.$end.' mid:'.$mid.'<br>';
        if ($guess == $value) {
            echo '第 '.$i.' 次循环：start：'.$start.' end:'.$end.' mid:'.$mid.'<br>';
            return '该元素存在于数组中第'.$mid.'位'; //定位到元素后返回元素位置并结束循环（使用return结束循环，或者break跳出循环）
            //break;
        }
        if ($guess < $value) {  //中间值小于目标数据时，区间缩小为[mid+1, end]
            $start = $mid+1;
            echo '第 '.$i.' 次循环：start：'.$start.' end:'.$end.' mid:'.$mid.'<br>';
        }
        if ($guess > $value) { //中间值大于目标数据时，区间缩小为[start, mid-1]
            $end = $mid-1;
            echo '第 '.$i.' 次循环：start：'.$start.' end:'.$end.' mid:'.$mid.'<br>';
        }
    }
    return '数组中无此元素';
}

$list = array(1,3,5,7,9);
print_r(searchByMid($list, 9));


?>