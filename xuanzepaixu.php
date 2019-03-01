<?php
/************
 * 选择排序php实现
 ************/

//选择排序，算法时间复杂度为O(n^2)
//遍历数组
//第一次循环选出数组中最小的值和数组中第一个位置的数交换
//第二次循环在除第一位剩下的数据中选出最小的值和数组中第二个位置的数交换
//第三次循环在除第一、二位剩下的数据中选出最小的值和数组中第二个位置的数交换
//循环到数组倒数第二个元素和最后一个元素比较为至

function sortByChoose($array)
{
    echo '需要排序的数组：'.json_encode($array).'<br>';
    $len = count($array);
    if ($len <= 1) return '数组长度为1，无需排序';
    for ($i = 0; $i<$len-1; $i++) {
        echo '第'.($i+1).'次循环:使用数组中第'.($i+1).'个数字“'.$array[$i].'”与';
        $smallIndex = $i;
        $tempArr = array();
        for ($j=$i+1; $j<$len; $j++) {
            array_push($tempArr, $array[$j]);
            if ($j == $len-1) {
                echo json_encode($tempArr).'对比,';
            }
            if ($array[$j] < $array[$smallIndex]) {
                $smallIndex = $j;
            }
        }
        echo '数组最小值下标为'.$smallIndex.',';
        if ($i != $smallIndex) {  //判断最小值是否处在当前位置，没有则交换，后续循环中使用交换后的新数组对比
            echo '当前值为“'.$array[$i].'”处在第'.$i.'位，最小值为“'.$array[$smallIndex].'”处在第'.$smallIndex.'位，交换位置，新数组->';
            $temp = $array[$i];
            $array[$i] = $array[$smallIndex];
            $array[$smallIndex] = $temp;
            echo json_encode($array).'<br>';
        } else {
            echo '当前值为“'.$array[$i].'”处在第'.$i.'位，最小值处“'.$array[$smallIndex].'”处在第'.$smallIndex.'位，无需交换，'.json_encode($array).'<br>';
        }
    }
    return '排序后数组：'.json_encode($array);
}

$list = array(3, 3, 3, 2, 9, 1);
print_r(sortByChoose($list));


?>