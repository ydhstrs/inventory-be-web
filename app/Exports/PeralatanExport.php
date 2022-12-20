<?php

namespace App\Exports;

use App\Models\Peralatan;
use App\Models\Kota;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PeralatanExport implements FromQuery, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;
    protected $myId;
    protected $namaKota;

    function __construct($myId, $namaKota)
    {
        $this->myId = $myId;
        $this->namaKota = $namaKota;

    }
    public function query()
    {
   
        if ($this->myId != NULL) {
            $data = Peralatan::where('peralatans.id_kota', $this->myId)
                ->selectRaw('peralatans.nama, peralatans.kategori, peralatans.jumlah,peralatans.tahun, peralatans.sumber_dana_peralatan, peralatans.keterangan');
        }
        else{
            $data = Peralatan::selectRaw('peralatans.nama, peralatans.kategori, peralatans.jumlah,peralatans.tahun, kotas.nama_kota, peralatans.sumber_dana_peralatan, peralatans.keterangan')
                ->join('kotas', 'peralatans.id_kota', '=', 'kotas.id');
        
        }

        return $data;
    }
    public function headings(): array
    {
        if ($this->myId != NULL) {
        $namaKotaa =  $this->namaKota;
        return [['PERALATAN ', $namaKotaa],['Nama ', 'Kategori', 'Jumlah', 'Tahun','Sumber Dana', 'Keterangan']];
                }
        else{
        return [['PERALATAN '],['Nama ', 'Kategori', 'Jumlah', 'Tahun', 'Kota','Sumber Dana', 'Keterangan']];
        }
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
