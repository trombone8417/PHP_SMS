<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Teacher_Export implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // 匯出Excel資料(資料庫teachers)
        $teachers = DB::table('teachers')->select('first_name','last_name','gender','email','phone','status')->get();
        return $teachers;
    }
/**
 * Excel 標題
 *
 * @return array
 */
    public function headings(): array
    {
        // 標題名稱
        return [
            'first_name',
            'last_name',
            'gender',
            'email',
            'phone',
            'status'
        ];
    }

}
