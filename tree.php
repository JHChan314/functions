<?php

    //无限极分类
    public function getTree($array, $pid =0, $level = 0){
        static $list = [];
        foreach ($array as $key => $value){
            $l = ($level - 1);
            if (true === $value['isStop']) continue;
            if ($value['parentId'] == $pid){
                $data['level'] = $l;
                $data['name'] = $value['name'];
                $data['id'] = $value['id'];
                $data['parentId'] = 0 == $l ? 0 : $value['parentId'];
                if (0 <= $l)$list[] = $data;
                unset($array[$key], $value['order'], $value['isStop']);
                $this->getTree($array, $value['id'], $level+1);
            }
        }
        return $list;
    }
