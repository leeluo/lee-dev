<?php

/*
 * 数组：
 * 数组（Array）是一种线性表数据结构。它用一组【连续】的内存空间，来存储一组具有相同类型的数据。
 * 基于数组是一组连续的内存空间，当计算机需要随机访问数组中的某个元素时，它会首先通过下面的寻址公式，计算出该元素存储的内存地址
 * a[i]_address = base_address + i * data_type_size
 * 其中 data_type_size 表示数组中每个元素的大小。例：数组中存储的是 int 类型数据，所以 data_type_size 就为 4 个字节
 * 数组支持随机访问，根据下标随机访问元素的查找效率高，时间复杂度为O(1)
 * 为保持内存数据的连续性，数组的插入和删除操作，都牵扯到数据的搬移，故数组的插入和删除操作是低效的，时间复杂度为O(n)
 *
 * 问题：
 * 1.实现一个支持动态扩容的数组
 * 2.实现一个大小固定的有序数组，支持动态增删改操作
 * 3.实现两个有序数组合并为一个有序数组 后续排序算法实现 todo...
 * */

require "./array.php";

//声明固定容量数组
$myArray = new MyArray(10);

//初始化数组元素
echo '--初始化数组元素--' . PHP_EOL;
for ($i=0; $i<10; $i++) {
    $myArray->insert($i, $i+1);
}
$myArray->printData();
echo PHP_EOL;

//数组动态扩容,向数组对应位置插入元素，原对应位置及之后元素后移
$myArray->insert(3, 10);
echo '--数组动态扩容,向数组对应位置插入元素，原对应位置及之后元素后移--' . PHP_EOL;
$myArray->printData();
echo PHP_EOL;

//删除数组对应位置元素，该位置之后元素向前移一位
$myArray->delete(3);
echo '--删除数组对应位置元素，该位置之后元素向前移一位--' . PHP_EOL;
$myArray->printData();
echo PHP_EOL;

//更新数组元素
$myArray->update(3, 90);
echo '--更新数组元素--' . PHP_EOL;
$myArray->printData();
echo PHP_EOL;

//查找数组元素
echo '--查找数组元素--' . PHP_EOL;
$myArray->find(3);





