<?php 
namespace App\Helpers;
use App\Models\Categories;
use Auth;
class Helper
{
    static function getCat()
    {
        $dataCategories = Categories::where(['status'=>1])->get();
        return $dataCategories;
    }
    
}
?>