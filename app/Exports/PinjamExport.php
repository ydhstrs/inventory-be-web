<?php

namespace App\Exports;

use App\Models\Peralatan;
use App\Models\Kota;
use App\Models\PinjamItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PinjamExport implements FromQuery, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;


    public function query()
    {

        $data = PinjamItem::selectRaw('pinjams.kota_penerima, peralatans.nama, pinjam_items.jumlah, pinjams.tanggal_pinjam ,pinjams.tanggal_balik, pinjams.status, pinjams.keterangan_pinjam')
            ->join('pinjams', 'pinjam_items.id_pinjam', '=', 'pinjams.id')
            ->join('peralatans', 'pinjam_items.id_peralatan', '=', 'peralatans.id');

        return $data;
    }
    public function headings(): array
    {

        return [['PEMINJAMAN PERALATAN'], ['Kota/Kab. Penerima', 'Nama Peralatan', 'Jumlah Pinjam', 'Tanggal Peminjaman', 'Tanggal Pengembalian', 'Status', 'Keterangan']];
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
