<?php

namespace App\Exports;

use App\Models\DistribusiItem;
use App\Models\Kota;
use App\Models\PinjamItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DistribusiExport implements FromQuery, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;


    public function query()
    {

        $data = DistribusiItem::selectRaw('distribusis.kota_penerima, logistiks.nama_logistik, distribusi_items.jumlah, distribusis.tanggal_distribusi , distribusis.status, distribusis.keterangan_distribusi')
            ->join('distribusis', 'distribusi_items.id_distribusi', '=', 'distribusis.id')
            ->join('logistiks', 'distribusi_items.id_logistik', '=', 'logistiks.id');

        return $data;
    }
    public function headings(): array
    {

        return [['DISTRIBUSI LOGISTIK'], ['Kota/Kab. Penerima', 'Nama Logistik', 'Jumlah', 'Tanggal', 'Status', 'Keterangan']];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.

            1 => ['font' => ['bold' => true]],
            2 => ['font' => ['bold' => true]],
        ];
    }
    // public function id($id) {
    //     $this->id = $id;
    // }
    //     public function id_user($id_user) {
    //     $this->id = $id_user;
    // }
    //         public function from($from) {
    //     $this->id = $from;
    // }
    //             public function to($to) {
    //     $this->id = $to;
    // }

    // public function collection()
    // {
    //     return Book::whereBetween('book_date', [$this->from, $this->to])
    //         ->where('id_hotel', $this->id)
    //         ->where('id_user', $this->id_user)
    //         ->get();
    // }
}
