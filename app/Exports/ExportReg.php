<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Models\crud;


class ExportReg implements
    FromCollection,
    WithHeadings,
    WithMapping,
    WithCustomStartCell,
    ShouldAutoSize,
    WithStyles,
    WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return crud::orderByDesc('id')->get();
    }

    public function map($registration): array
    {
        static $row = 0;

        return [
            ++$row,
            $registration->name ?? '',
            $registration->phone_no ?? '',
            $registration->email ?? '',
            $registration->state ?? '',
            $registration->address ?? '',
            $registration->created_at ?? ''
        ];
    }
    public function headings(): array
    {
        return [
            'S no',
            'Name',
            'Phone No',
            'Email',
            'State',
            'Address',
            
            'Created at'



        ];
    }
    public function startCell(): string
    {
        return 'A1';
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true], 'name' =>  'Calibri'],

        ];
    }

    public function title(): string
    {
        return  'registration';
    }
}
