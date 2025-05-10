<?php

namespace App\Exports;

use App\Models\LedgerTpye;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LedgerTpyeExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $rows = LedgerTpye::where('delete_status','0')->orderBy('title','asc')->get();
        $i = 1;     
        foreach ($rows as $key => $value) {
              $result["No"]  = $i++;
              $result["Ledger tpye"]  = ucfirst($value->title);
              $result["Status"]    = ucfirst($value->status);
              $data[] =$result;
        }
       return collect($data);
    }

    public function headings(): array
    {
        return [
            'No','Ledger tpye','Status'
        ];
    }   
}
