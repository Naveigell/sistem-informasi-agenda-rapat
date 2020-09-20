<?php

function error_check(array $arrayList, $errors){
    if (gettype($errors) != 'object') return null;

    foreach ($arrayList as $list) {
        if ($errors->has($list)) {
            return $errors->first($list);
        }
    }

    return null;
}

