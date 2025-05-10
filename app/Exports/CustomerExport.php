<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $rows = User::where('delete_status','0')->where('user_type','customer')->get();
        $i = 1;     
        foreach ($rows as $key => $value) {
              $result["No"]  = $i++;
              $result["Name"]  = ucfirst($value->name);
              $result["Email ID"]  = ucfirst($value->email);
              $result["Mobile"]  = ucfirst($value->mobile);
              $result["Created Date"]  =  \Carbon\Carbon::parse($value->created_at)->format('d M Y');
              $result["Status"]    = ucfirst($value->status);
              $data[] =$result;
        }
       return collect($data);
    }

    public function headings(): array
    {
        return [
            'No','Name','Email ID','Mobile Number','Created Date','Status'
        ];
    }   
}
