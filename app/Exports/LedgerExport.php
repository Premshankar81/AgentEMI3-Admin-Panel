<?php

namespace App\Exports;

use App\Models\Ledger;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LedgerExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $rows = Ledger::with('ledgerTpye','ledgerGroup')->where('delete_status','0')->orderBy('title', 'asc')->get();
        $i = 1;     
        foreach ($rows as $key => $value) {
              $result["No"]  = $i++;
              $result["Ledger Name"]    = ucfirst($value->title);
              $result["Ledger Group"]   = ucfirst($value->ledgerGroup->title);
              $result["Balanace"]       = ucfirst($value->title);
              $result["type"]           = ucfirst($value->ledgerTpye->title);
              $result["Status"]         = ucfirst($value->status);
              $data[] =$result;
        }
       return collect($data);
    }

    public function headings(): array
    {
        return [
            'No','Ledger name','Ledger Group','Balanace','Type','Status'
        ];
    }   
}
