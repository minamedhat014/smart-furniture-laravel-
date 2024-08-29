<?php

namespace App\Imports;

use App\Models\Availableitem;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AvailableItemdImport implements ToModel, WithHeadingRow,WithValidation,WithUpserts
{
    
 
    public function model(array $row)
    {    
        if (is_numeric($row['available_date'])) {
            $availableDate = \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['available_date']))->format('Y-m-d');
        } else {
            $availableDate = \Carbon\Carbon::createFromFormat('d-m-Y', $row['available_date'])->format('Y-m-d');
        }     
        
        return Availableitem::create([
                'item_code' => $row['item_code'] ?? $row['item code'] ?? $row['item'] ?? null,
                'balance' => $row['balance'] ?? $row['available quantity'] ?? $row['quantity'] ?? null,
                'consumption_rate_per_week' =>  $row['consumption_rate_per_week'] ?? $row['consumption'] ?? $row['consumption rate per week'] ?? null,
                'available_date' =>  $availableDate
            ]);
        }
    
 

    public function rules(): array
    {
        return [
            'item_code' =>'required|min:3|regex:/^[a-zA-Z0-9\s\-]+$/u|unique:available_items,item_code',
            'consumption_rate_per_week' => 'required|numeric',
            'balance' => 'required|numeric',
            'available_date' => 'nullable',
            // Add other validation rules as needed
        ];
    }

    public function uniqueBy()
    {
        return  'item_code';
    }

    public function batchSize(): int
    {
        return 2000;
    }
}
