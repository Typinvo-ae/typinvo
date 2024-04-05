<?php


namespace Modules\Category\ViewModel;

use Modules\Category\Service\CategoryService;

class CategoryViewModel
{
    public function categories($categoryId){
        return (new CategoryService())->active($categoryId);
    }
    public function sub_categories($categoryId){
        return (new CategoryService())->sub_categories($categoryId);
    }

    public function categoriesPaginated($id,$categoryId,$serviceName)
    {
        return (new CategoryService())->activePaginated($id,$categoryId,$serviceName);
    }
    public function SubcategoriesPaginated($id,$categoryId,$serviceName)
    {
        return (new CategoryService())->subPaginated($id,$categoryId,$serviceName);
    }
}
