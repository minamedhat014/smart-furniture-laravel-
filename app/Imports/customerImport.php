<?php

namespace App\Imports;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class customerImport implements ToModel,WithHeadingRow
{   
        
    public function model(array $row)
    {
        try{
            DB::beginTransaction();
        // Create the Customer instance
          $customer = Customer::create([
            'name' => $row['name'] ?? $row['customer_name'] ?? $row['customer name'] ?? null,
            'title' => $row['customer title'] ?? $row['client title'] ?? $row['title'] ?? null,
            'type' => $row['type'] ?? $row['customer_type'] ?? $row['customer type'] ?? null,
            'remarks' => $row['remarks'] ?? $row['notes'] ?? $row['comments'] ?? null,
        ]);
        // Create the Phone record
        if (!empty($row['phone1']) || !empty($row['phone']) || !empty($row['phone no.'])) {
            $customer->phone()->create([
                'number' => $row['phone1'] ?? $row['phone'] ?? $row['phone no.'] ?? null,
            ]);
        }
        // Create the Address record
        if (!empty($row['address']) || !empty($row['customer_address']) || !empty($row['customer address'])) {
            $customer->address()->create([
                'zone' => $row['zone'] ?? $row['client zone'] ?? $row['customer zone'] ?? null,
                'address' => $row['address'] ?? $row['client address'] ?? $row['customer address'] ?? null,
            ]);
        }

        if (!empty($row['store']) || !empty($row['store id']) || !empty($row['store_id'])) {
           
            $storeData = $row['store'] ?? $row['store id'] ?? $row['store_id'] ?? '';
            // Explode the string into an array of numbers
            $numbers = explode(',', $storeData);
            $customer->stores()->syncWithoutDetaching($numbers);
        }

        DB::commit();   
        // Return the created Customer instance
        return
        $customer;

       
    }catch(\Exception $e){
        DB::rollBack();
       Log::error('Customer import failed: ' . $e->getMessage());
       return null;  // Return null in case of an exception
    }  
    }


    public function batchSize(): int
    {
        return 2000;
    }
}
