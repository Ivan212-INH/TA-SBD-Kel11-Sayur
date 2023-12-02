<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    //Jual
    public function createJual()
    {
        return view('admin.addJual');
    }
    // public function store the value to a table
    public function storeJual(Request $request)
    {
        $request->validate([
            'ID_Penjualan' => 'required',
            'ID_Produk' => 'required',
            'ID_User' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'total_harga' => 'required',
        ]);
        DB::insert(
            'INSERT INTO penjualan(ID_Penjualan, ID_Produk, ID_User, jumlah, tanggal, total_harga) VALUES (:ID_Penjualan, :ID_Produk, :ID_User, :jumlah, :tanggal, :total_harga)',
            [
                'ID_Penjualan' => $request->ID_Penjualan,
                'ID_Produk' => $request->ID_Produk,
                'ID_User' => $request->ID_User,
                'jumlah' => $request->jumlah,
                'tanggal' => $request->tanggal,
                'total_harga' => $request->total_harga,
            ]
        );
        return redirect()->route('admin.indexJual')->with('success', 'Data penjualan berhasil disimpan');
    }
    // public function show all values from a table
    public function indexJual()
    {
        $datas = DB::select("
        SELECT penjualan.ID_Penjualan, produk.nama_produk AS Nama_Produk, penjualan.jumlah, penjualan.tanggal, penjualan.total_harga
        FROM penjualan
        LEFT JOIN produk ON penjualan.ID_Produk = produk.ID_Produk
        WHERE is_deleted = 0;");
        return view('admin.indexJual')->with('datas', $datas);
    }
    // public function edit a row from a table
    public function editJual($id)
    {
        $data = DB::table('penjualan')->where('ID_Penjualan', $id)->first();
        return view('admin.editJual')->with('data', $data);
    }

    // public function to update the table value
    public function updateJual($id, Request $request)
    {
        $request->validate([
            'ID_Penjualan' => 'required',
            'ID_Produk' => 'required',
            'ID_User' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'total_harga' => 'required',
        ]);

        DB::update(
            'UPDATE penjualan SET ID_Penjualan = :ID_Penjualan, ID_Produk = :ID_Produk, ID_User = :ID_User, jumlah = :jumlah, tanggal = :tanggal, total_harga = :total_harga WHERE ID_Penjualan = :id',
            [
                'id' => $id,
                'ID_Penjualan' => $request->ID_Penjualan,
                'ID_Produk' => $request->ID_Produk,
                'ID_User' => $request->ID_User,
                'jumlah' => $request->jumlah,
                'tanggal' => $request->tanggal,
                'total_harga' => $request->total_harga,
            ]
        );

        return redirect()->route('admin.indexJual')->with('success', 'Data penjualan berhasil diubah');
    }
    
    public function trashJual($id)
    {
        DB::update('UPDATE penjualan SET is_deleted = 1 WHERE ID_Penjualan = :ID_Penjualan;', ['ID_Penjualan' => $id]);
        return redirect()->route('admin.indexBeli')->with('success', 'Data penjualan berhasil dipindahkan ke sampah ');
    }

    public function restoreJual($id)
    {
        DB::update('UPDATE penjualan SET is_deleted = 0 WHERE ID_Penjualan = :ID_Penjualan;', ['ID_Penjualan' => $id]);
        return redirect()->route('admin.wastebin')->with('success', 'Data penjualan berhasil dikembalikan');
    }

    public function deleteJual($id)
    {
        DB::delete('DELETE FROM penjualan WHERE ID_Penjualan = :ID_Penjualan', ['ID_Penjualan' => $id]);
        return redirect()->route('admin.wastebin')->with('success', 'Data penjualan berhasil dihapus');
    }

    public function searchJual(Request $request)
    {
        $query = $request->input('query');

        $datas = DB::select("
            SELECT penjualan.ID_Penjualan, produk.nama_produk AS Nama_Produk, penjualan.jumlah, penjualan.tanggal, penjualan.total_harga
            FROM penjualan
            LEFT JOIN produk ON penjualan.ID_Produk = produk.ID_Produk
            WHERE Nama_Produk LIKE '%$query%' AND is_deleted = 0;");

        return view('admin.indexJual')->with('datas', $datas);
    }
    
    //Beli
    public function createBeli()
    {
        return view('admin.addBeli');
    }
    // public function store the value to a table
    public function storeBeli(Request $request)
    {
        $request->validate([
            'ID_Pembelian' => 'required',
            'ID_Produk' => 'required',
            'ID_User' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'total_harga' => 'required',
        ]);
        DB::insert(
            'INSERT INTO pembelian(ID_Pembelian, ID_Produk, ID_User, jumlah, tanggal, total_harga, is_deleted) VALUES (:ID_Pembelian, :ID_Produk, :ID_User, :jumlah, :tanggal, :total_harga, :0)',
            [
                'ID_Pembelian' => $request->ID_Pembelian,
                'ID_Produk' => $request->ID_Produk,
                'ID_User' => $request->ID_User,
                'jumlah' => $request->jumlah,
                'tanggal' => $request->tanggal,
                'total_harga' => $request->total_harga,
            ]
        );
        return redirect()->route('admin.indexBeli')->with('success', 'Data pembelian berhasil disimpan');
    }
    // public function show all values from a table
    public function indexBeli()
    {
        $datas = DB::select("
        SELECT pembelian.ID_Pembelian, produk.nama_produk AS Nama_Produk, pembelian.jumlah, pembelian.tanggal, pembelian.total_harga
        FROM pembelian
        LEFT JOIN produk ON pembelian.ID_Produk = produk.ID_Produk
        WHERE is_deleted = 0;");
        return view('admin.indexBeli')->with('datas', $datas);
    }
    // public function edit a row from a table
    public function editBeli($id)
    {
        $data = DB::table('pembelian')->where('ID_Pembelian', $id)->first();
        return view('admin.editBeli')->with('data', $data);
    }

    // public function to update the table value
    public function updateBeli($id, Request $request)
    {
        $request->validate([
            'ID_Pembelian' => 'required',
            'ID_Produk' => 'required',
            'ID_User' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'total_harga' => 'required',
        ]);

        DB::update(
            'UPDATE pembelian SET ID_Pembelian = :ID_Pembelian, ID_Produk = :ID_Produk, ID_User = :ID_User, jumlah = :jumlah, tanggal = :tanggal, total_harga = :total_harga WHERE ID_Pembelian = :id',
            [
                'id' => $id,
                'ID_Pembelian' => $request->ID_Pembelian,
                'ID_Produk' => $request->ID_Produk,
                'ID_User' => $request->ID_User,
                'jumlah' => $request->jumlah,
                'tanggal' => $request->tanggal,
                'total_harga' => $request->total_harga,
            ]
        );

        return redirect()->route('admin.indexBeli')->with('success', 'Data pembelian berhasil diubah');
    }

    public function trashBeli($id)
    {
        DB::update('UPDATE pembelian SET is_deleted = 1 WHERE ID_Pembelian = :ID_Pembelian;', ['ID_Pembelian' => $id]);
        return redirect()->route('admin.indexBeli')->with('success', 'Data pembelian berhasil dipindahkan ke sampah ');
    }

    public function restoreBeli($id)
    {
        DB::update('UPDATE pembelian SET is_deleted = 0 WHERE ID_Pembelian = :ID_Pembelian;', ['ID_Pembelian' => $id]);
        return redirect()->route('admin.wastebin')->with('success', 'Data pembelian berhasil dikembalikan');
    }

    public function deleteBeli($id)
    {
        DB::delete('DELETE FROM pembelian WHERE ID_Pembelian = :ID_Pembelian', ['ID_Pembelian' => $id]);
        return redirect()->route('admin.wastebin')->with('success', 'Data pembelian berhasil dihapus');
    }

    public function searchBeli(Request $request)
    {
        $query = $request->input('query');

        $datas = DB::select("
            SELECT pembelian.ID_Pembelian, produk.nama_produk AS Nama_Produk, pembelian.jumlah, pembelian.tanggal, pembelian.total_harga
            FROM pembelian
            LEFT JOIN produk ON pembelian.ID_Produk = produk.ID_Produk
            WHERE Nama_Produk LIKE '%$query%' AND is_deleted = 0;");

        return view('admin.indexBeli')->with('datas', $datas);
    }

    public function wastebin()
    {
        $trashBeli = DB::select("
        SELECT pembelian.ID_Pembelian, produk.nama_produk AS Nama_Produk, pembelian.jumlah, pembelian.tanggal, pembelian.total_harga
        FROM pembelian
        LEFT JOIN produk ON pembelian.ID_Produk = produk.ID_Produk
        WHERE is_deleted = 1;");
        $trashJual = DB::select("
        SELECT penjualan.ID_Penjualan, produk.nama_produk AS Nama_Produk, penjualan.jumlah, penjualan.tanggal, penjualan.total_harga
        FROM penjualan
        LEFT JOIN produk ON penjualan.ID_Produk = produk.ID_Produk
        WHERE is_deleted = 1;");
        return view('admin.wastebin')->with('trashBeli', $trashBeli)
        ->with('trashJual', $trashJual);
    }

    public function indexUsers()
    {
        $datas = DB::select("SELECT * FROM users;");
        return view('admin.indexUsers')->with('datas', $datas);
    }

    public function searchUsers(Request $request)
    {
        $query = $request->input('query');

        $datas = DB::select("SELECT * FROM users
            WHERE nama_users LIKE '%$query%';");

        return view('admin.indexUsers')->with('datas', $datas);
    }

    public function indexProduk()
    {
        $datas = DB::select("SELECT * FROM produk;");
        return view('admin.indexProduk')->with('datas', $datas);
    }

    public function searchProduk(Request $request)
    {
        $query = $request->input('query');

        $datas = DB::select("SELECT * FROM produk
            WHERE nama_produk LIKE '%$query%';");

        return view('admin.indexProduk')->with('datas', $datas);
    }
}
