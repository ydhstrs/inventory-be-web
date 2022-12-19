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
        if (!empty($this->from) && !empty($this->to) && !empty($this->id_user)) {
            $data = Peralatan::whereBetween('spendings.tanggal', [$this->from, $this->to])
                ->where('books.id_hotel', $this->myId)
                ->where('books.id_user', $this->id_user)
                ->selectRaw('books.guestname, books.book_date, books.nota, books.days, books.room, books.price,books.platform_fee2,books.assured_stay,books.tipforstaf,books.upgrade_room,books.travel_protection,books.member_redclub,books.breakfast,books.early_checkin,null as column_1,null as column_2, platforms.platform_name, platforms.platform_fee')
                ->join('users', 'books.id_user', '=', 'users.id')
                ->join('platforms', 'books.id_platform', '=', 'platforms.id');

                // ->join('rooms', 'books.id_room', '=', 'rooms.id');
        } elseif (empty($this->from) && empty($this->to) && !empty($this->id_user)) {
            $data = Peralatan::where('books.id_hotel', $this->myId)
                ->where('spendings.id_user', $this->id_user)
                ->selectRaw('books.guestname, books.book_date, books.nota, books.days, books.room, books.price,books.platform_fee2,books.assured_stay,books.tipforstaf,books.upgrade_room,books.travel_protection,books.member_redclub,books.breakfast,books.early_checkin,null as column_1,null as column_2, platforms.platform_name, platforms.platform_fee')
                ->join('users', 'books.id_user', '=', 'users.id')
                ->join('platforms', 'books.id_platform', '=', 'platforms.id');

                // ->join('rooms', 'books.id_room', '=', 'rooms.id');
        } elseif (!empty($this->from) && !empty($this->to) && empty($this->id_user)) {
            $data = Peralatan::whereBetween('spendings.tanggal', [$this->from, $this->to])
                ->where('spendings.id_hotel', $this->myId)
                ->selectRaw('spendings.name, spendings.tanggal, spendings.jumlah, spendings.keterangan');
                // ->join('users', 'spendings.id_user', '=', 'users.id')
                // ->join('platforms', 'books.id_platform', '=', 'platforms.id');

                // ->join('rooms', 'books.id_room', '=', 'rooms.id');
        } else {
            $data = Peralatan::where('peralatans.id_kota', $this->myId)
                ->selectRaw('peralatans.nama, peralatans.kategori, peralatans.jumlah,peralatans.tahun, peralatans.keterangan');
        }
        return $data;
    }
    public function headings(): array
    {
        $namaKotaa =  $this->namaKota;
        return [['LOGISTIK ', $namaKotaa],['Nama ', 'Kategori', 'Jumlah', 'Tahun', 'Keterangan']];
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
