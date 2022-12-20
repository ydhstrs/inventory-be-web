<?php

namespace App\Exports;

use App\Models\Logistik;
use App\Models\Kota;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LogistikExport implements FromQuery, WithHeadings, WithStyles, ShouldAutoSize
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
            $data = Logistik::where('logistiks.id_kota', $this->myId)
                ->selectRaw('logistiks.nama_logistik, logistiks.kategori_logistik, logistiks.jumlah_logistik, logistiks.tahun_logistik,logistiks.keterangan_logistik');
        }
        else{
            $data = Logistik::
                selectRaw('logistiks.nama_logistik, logistiks.kategori_logistik, logistiks.jumlah_logistik, logistiks.tahun_logistik,kotas.nama_kota ,logistiks.keterangan_logistik')
                ->join('kotas', 'logistiks.id_kota', '=', 'kotas.id');
        }

        return $data;
    }
    public function headings(): array
    {
         if ($this->myId != NULL) {
        $namaKota =  $this->namaKota;
        return [['LOGISTIK ', $namaKota],['Nama ', 'Kategori', 'Jumlah','Tahun', 'Keterangan']];
        }
        else{
        return [['LOGISTIK'],['Nama ', 'Kategori', 'Jumlah','Tahun','Kota/Kab', 'Keterangan']];
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
