<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\View;
use Spatie\Browsershot\Browsershot;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AdminExport;

class UserManagementController extends Controller
{
    public function index(){
        $admins = User::where('role', 'admin')->get();
        return view('halaman.daftarAdmin', ['daftarAdmin'=>$admins]);
    }

    public function create(){
        return view('halaman.formAdmin');
    }

    public function store(Request $request){
        // Validasi input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Buat user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin', //  Set role sebagai 'admin'
        ]);

        // Redirect kembali ke halaman daftar admin
        return redirect()->route('admin.users.index')
                         ->with('success', 'Admin baru berhasil ditambahkan.');
    }
    public function edit(User $user){
        return view('halaman.editAdmin', ['user'=>$user]);
    }
    public function update(Request $request, User $user){
$request->validate(['name' => ['required', 'string', 'max:255'],
        // Beri tahu 'unique' untuk mengabaikan ID $user saat ini
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
        // Buat password 'nullable' (boleh kosong)
        'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
    ]);

    //ngecek password diisi atau enggak
    // Ambil data yang divalidasi
    $validatedData = $request->only('name', 'email');
// Cek jika admin mengisi password baru
    if ($request->filled('password')) {
        $validatedData['password'] = Hash::make($request->password);
    }

    // Update data user aka simpan perubahan
    $user->update($validatedData);

    // Ganti pesan suksesnya
    return redirect()->route('admin.users.index')
        ->with('success', 'Data admin berhasil diperbarui.');

    }

    //hapus admin berdasarkan id
       public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')
        ->with('success', "Data admin berhasil dihapus");
    }
    // Export data admin ke Excel
    public function exportExcel()
    {
        // Ambil semua data admin
        $admins = User::where('role', 'admin')->get();

        // Panggil class export dengan data
        return Excel::download(new AdminExport($admins), 'data-admin.xlsx');
    }
    // Export data admin ke PDF
    public function exportPdf()
    {
        // Ambil data admin
        $admins = DB::table('users')
            ->select('name','email','created_at','role')
            ->where('role','admin')
            ->orderBy('created_at','desc')
            ->get();

        $dataLaporan = [
            'data' => $admins,
            'periode' => now()->format('d F Y'),
            'judul' => 'Laporan Data Admin'
        ];

        $pdf = Pdf::loadView('halaman.report-admin', $dataLaporan)
                ->setPaper('a4', 'portrait');

        return $pdf->download('laporan-admin.pdf');
    }
    // Export data admin ke JPG
    public function exportJpg(): BinaryFileResponse
    {
        $admins = DB::table('users')
            ->select('name','email','created_at','role')
            ->where('role','admin')
            ->orderBy('created_at','desc')
            ->get();

        $dataLaporan = [
            'data' => $admins,
            'periode' => now()->format('d F Y'),
            'judul' => 'Laporan Data Admin'
        ];

        $html = View::make('halaman.report-admin', $dataLaporan)->render();

        $path = storage_path('app/public/laporan-admin.jpg');

        Browsershot::html($html)
            ->windowSize(1200, 1080)
            ->fullPage()
            ->save($path);

        return response()->download($path)->deleteFileAfterSend(true);
    }
}
