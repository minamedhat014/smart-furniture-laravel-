<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class customerImport implements ToModel,WithHeadingRow,WithValidation
{   
      
    public function model(array $row){

        return
          Customer::create([
                'name' => $row['customer name'] ?? $row['client name'] ?? $row['name'] ?? null,
                'national_id' => $row['national id'] ?? $row['national_id'] ?? $row['id'] ?? null,
                'type' => $row['type'] ?? $row['customer_type'] ?? $row['customer type'] ?? null,
                'remarks' => $row['remarks'] ?? $row['notes'] ?? $row['comments'] ?? null,
         ]);
            // $customer->phone()->create([
            //    'number' => $row['phone'] ?? $row['number'] ?? $row['phone no.'] ?? null,
            // ]);
        }

    public function rules(): array
    {
        return [
            'name' =>'required|min:3|regex:/^[a-zA-Z0-9\s\-]+$/u',
            'national_id' => 'nullable|numeric',
            'remarks' => 'nullable|regex:/^[a-zA-Z0-9\s\-]+$/u',
            'number'=> 'required|numeric ',
            'phone'=>'required|regex:/^01[0-9]{9}$/|unique:customer_phones,number'
         
            // Add other validation rules as needed
        ];
    }

 

    public function batchSize(): int
    {
        return 2000;
    }
}
