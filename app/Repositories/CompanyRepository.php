<?php
namespace App\Repositories;
 use App\Repositories\Interface\CompanyRepositoryInterface;
 use App\Models\Company;
 class CompanyRepository implements CompanyRepositoryInterface{

    public function find($id){
       return  Company::find($id);
    }
 }