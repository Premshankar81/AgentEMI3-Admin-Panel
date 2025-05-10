<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoryExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $rows = Category::where('delete_status','0')->get();
        $i = 1;     
        foreach ($rows as $key => $value) {
              $result["No"]  = $i++;
              $result["Category"]  = ucfirst($value->title);
              $result["Status"]    = ucfirst($value->status);
              $data[] =$result;
        }
       return collect($data);
    }

    public function headings(): array
    {
        return [
            'No','Category','Status'
        ];
    }   
}
