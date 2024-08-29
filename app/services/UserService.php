<?php

namespace App\services; 

use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService {





public function store($validatedData){
    $admin= Admin::create([
        'name'=>$validatedData['name'],
        'email'=>$validatedData['email'],
        'company_id'=>$validatedData['company_id'],
        'phone'=>$validatedData['phone'],
        'password'=>Hash::make($validatedData['password']),
        'created_by'=>authName(),
           ]);
           if($validatedData['photo'] !== null){
           $admin->addMedia($validatedData['photo'])->toMediaCollection('profile');
           }

}


public function update($validatedData ,$admin_id){

    $admin= Admin::FindOrFail($admin_id);
    $admin->update([
     'name'=>$validatedData['name'],
     'email'=>$validatedData['email'],
     'company_id'=>$validatedData['company_id'],
     'phone'=>$validatedData['phone'],
     'password'=>Hash::make($validatedData['password']),
     'updated_by' =>authName(),
     ]);
     if($validatedData['photo']!== null){
        $admin->clearMediaCollection('profile');
        $admin->addMedia($validatedData['photo'])->toMediaCollection('profile');
        }
}


}