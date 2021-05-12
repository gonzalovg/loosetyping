<?php
include_once('../model/category.php');


$option=$_GET['option'];



switch ($option) {
    case 'insert':
        $category = new Category("", $_GET['category']);
        $category->insert();
        echo "Categoría {$_GET['category']} insertada";
        break;
    case 'delete':
        $id = $_GET['id'];
       
        $category = Category::getById($id);
        $category->delete();
        echo "Categoría #{$category->getId()} eliminada";


        break;

    default:
        # code...
        break;
}
