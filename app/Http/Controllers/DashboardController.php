<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class DashboardController extends Controller
{
    public function index()
    {
        // DATA STATISTIK
        $stats = [
            ['icon' => '💙', 'jumlah' => 200, 'label' => 'Total Barang'],
            ['icon' => '🟡', 'jumlah' => 150, 'label' => 'Barang Tersedia'],
            ['icon' => '🧡', 'jumlah' => 40,  'label' => 'Barang Habis'],
            ['icon' => '💜', 'jumlah' => 10,  'label' => 'Obat Kadaluarsa'],
        ];
 
        // DATA TERBARU (recent activity)
        $recent = [
            ['kode' => '#876364', 'nama' => 'Perban',             'banyak' => 10, 'jenis' => 'Masuk',  'tanggal' => '10/10/2025'],
            ['kode' => '#876368', 'nama' => 'Plester Luka',       'banyak' => 5,  'jenis' => 'Keluar', 'tanggal' => '6/10/2025'],
            ['kode' => '#876412', 'nama' => 'Minyak Kayu Putih',  'banyak' => 3,  'jenis' => 'Keluar', 'tanggal' => '6/10/2025'],
            ['kode' => '#876621', 'nama' => 'Paracetamol',        'banyak' => 7,  'jenis' => 'Keluar', 'tanggal' => '3/10/2025'],
        ];
 
        // BARANG YANG PERLU DISTOK
        $restock = [
            ['nama' => 'Alkohol 70%', 'sisa' => '1 botol', 'exp' => '20 hari'],
            ['nama' => 'Betadine',    'sisa' => '2 botol', 'exp' => '9 hari'],
        ];
 
        // KIRIM KE VIEW
        return view('dashboard.index', compact('stats', 'recent', 'restock'));
    }
}
 