<?php
class MyArray
{
    //数据
    private $data;
    //容量
    private $capacity;
    //长度
    private $length;

    public function __construct($capacity)
    {
        $capacity = intval($capacity); //取整
        if ($capacity <= 0) {
            return null;
        }
        $this->data = array();
        $this->capacity = $capacity;
        $this->length = 0;
    }

    /**
     * 数组是否已满
     * @return bool
     */
    private function checkIfFull()
    {
        return ($this->length >= $this->capacity) ? true : false;
    }

    /**
     * 判断索引index是否超出数组范围
     * @param $index
     * @return bool
     */
    private function checkOutOfRange($index)
    {
        return (($index > $this->length) || ($index < 0)) ? false : true;
    }

    /**
     * 在索引index位置插入值value
     * @param $index
     * @param $value
     */
    public function insert($index, $value)
    {
        $index = intval($index);
        $value = intval($value);
        if (!$this->checkOutOfRange($index)) {
            echo '索引溢出：数组容量为' . $this->capacity . '，插入位置索引为' . $index . PHP_EOL; exit;
        }
        if ($this->checkIfFull()) {
            //数组空间已满，重新申请空间，进行数据搬移操作（向对应位置插入数据，原位置后所有数据后移一位）
            $this->capacity++;
        }
        $arrayLen = $this->length;
        //先做数据搬移，给要插入位置腾地方
        for ($arrayLen; $index<=$arrayLen; $arrayLen--) {
            $this->data[$arrayLen] = $this->data[$arrayLen-1];
        }
        $this->data[$index] = $value;
        $this->length++;
    }

    /**
     * 更新在索引index位置对应的值value
     * @param $index
     * @param $value
     */
    public function update($index, $value)
    {
        $index = intval($index);
        $value = intval($value);
        if (!$this->checkOutOfRange($index)) {
            echo '索引溢出：数组容量为' . $this->capacity . '，更新位置索引为' . $index . PHP_EOL; exit;
        }
        $this->data[$index] = $value;
    }

    /**
     * 删除索引index上的值，并返回
     * @param $index
     */
    public function delete($index)
    {
        $index = intval($index);
        if (!$this->checkOutOfRange($index)) {
            echo '索引溢出：数组容量为' . $this->capacity . '，删除位置索引为' . $index . PHP_EOL; exit;
        }
        for ($index; $index<=$this->length; $index++) {
            $this->data[$index] = $this->data[$index+1];
        }
        $this->length--;
    }

    /**
     * 查找索引index的值
     * @param $index
     */
    public function find($index)
    {
        $index = intval($index);
        if (!$this->checkOutOfRange($index)) {
            echo '索引溢出：数组容量为' . $this->capacity . '，更新位置索引为' . $index . PHP_EOL; exit;
        }
        foreach ($this->data as $k => $v) {
            if ($index == $k) echo $v . PHP_EOL;
        }
    }

    /**
     * 打印数组
     */
    public function printData()
    {
        echo '数据容量' . $this->capacity . PHP_EOL;
        if ($this->length <= 0) print ('空');
        $format = "";
        for ($i = 0; $i < $this->length; $i++) {
            $format .= $this->data[$i] . '|';
        }
        print ($format . PHP_EOL);
    }



}