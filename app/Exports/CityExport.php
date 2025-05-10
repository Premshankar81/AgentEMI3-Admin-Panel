<?php

namespace App\Exports;

use App\Models\City;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CityExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $rows = City::with('country','state')->where('delete_status','0')->orderBy('title','asc')->get();
        $i = 1;     
        foreach ($rows as $key => $value) {
              $result["No"]  = $i++;
              $result["city"]  = ucfirst($value->title);
              $result["Country"]  = ucfirst($value->country->title);
              $result["state"]  = ucfirst($value->state->title);
              $result["Status"]    = ucfirst($value->status);
              $data[] =$result;
        }
       return collect($data);
    }

    public function headings(): array
    {
        return [
            'No','City','Country','State','Status'
        ];
    }   
}
