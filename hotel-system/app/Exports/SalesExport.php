<?php

namespace App\Exports;

use App\Models\SaleMGT;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles; // Added
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet; // Added

class SalesExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return SaleMGT::where('status', 'paid')->get();
    }

    public function headings(): array
    {
        return ['INVOICE', 'CUSTOMER', 'CHECK-IN', 'CHECK-OUT', 'TOTAL PAID', 'STATUS'];
    }

    public function map($sale): array
    {
        return [
            '#' . $sale->id,
            $sale->cus_name,
            $sale->check_in_date,
            $sale->check_out_date,
            $sale->balance_subtotal, // We format decimals in Styles next
            strtoupper($sale->status),
        ];
    }

    /**
     * Professional Styling Logic
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // 1. Style the Header Row (Row 1)
            1    => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => [
                    'fillType'   => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '4F46E5'], // Indigo-600
                ],
            ],

            // 2. Format Column E (Total Paid) as Currency
            'E'  => ['numberFormat' => ['formatCode' => '#,##0.00 "$"']],
            
            // 3. Center the ID and Status columns
            'A'  => ['alignment' => ['horizontal' => 'center']],
            'F'  => ['alignment' => ['horizontal' => 'center']],
        ];
    }
}