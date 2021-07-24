<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class UsersExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function __construct($from,$to,$status)
    {
        $this->from = $from;
        $this->to = $from;
        $this->status = $status;
    }

    public function headings(): array
    {
        return [
            'Firstname',
            'Lastname', 
            'Email',
            'Phone Number',
            'Status'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {   
        return User::where('status', $this->status)->whereRaw("(created_at >= ? AND created_at <= ?)", [$this->from." 00:00:00", $this->to." 23:59:59"])->get(['firstname','lastname','email','phone_number','status']);
    }
}
