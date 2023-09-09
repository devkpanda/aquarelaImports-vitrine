<?php

include_once('./Category.php');

$category = new Category();

$category->setId(11)->setName('nome 11')->setSub_id(111)->setSub_name('nome 111');

$category->insertCategory();
