<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judul ?? 'Laporan' }}</title>
    
    <style>
        /* Mengatur MARGIN HALAMAN KUSTOM */
        @page {
            margin-top: 3cm;
            margin-bottom: 3cm;
            margin-left: 4cm;
            margin-right: 3cm;
        }

        /* Mengatur box-sizing agar padding tidak merusak layout */
        * {
            box-sizing: border-box;
        }
        body { 
            font-family: 'Times New Roman', serif; /* Font Times New Roman */
            font-size: 11pt;
            margin: 0; 
            padding: 0;
        }
        .container { 
            width: 100%; 
            padding: 0;
            position: relative;
        }
        
        /* === HEADER === */
        .header { 
            text-align: center; 
            margin-bottom: 30px; 
        }
        
        .header-logo {
            position: absolute;
            top: 0;
            left: 0;
            width: 100px;
        }
        .header-logo img { 
            width: 80px; 
            height: auto;
        }
        
        .header-title h2 { 
            margin: 0; 
            font-size: 14pt; 
            margin-top: 10px;
        }
        .header-title h3 { 
            margin: 2px 0; 
            font-size: 12pt; 
            font-weight: normal; 
        }
        .header-title p { 
            margin: 5px 0 0 0; 
            font-size: 12pt; 
        }

        /* Garis pemisah setelah header */
        .header-line {
            border-bottom: 1px solid #000;
            margin-top: 15px;
            padding-bottom: 5px;
        }
        
        /* === TABEL === */
        .content-table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px;
        }
        .content-table th, 
        .content-table td { 
            border: 1px solid #000;
            padding: 8px 10px;
            font-size: 11pt;
        }
        .content-table th { 
            background-color: #f0f0f0; 
            text-align: center; 
            font-weight: bold;
        }
        
        /* Alignment teks */
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .text-left { text-align: left; }
        
        /* === TANDA TANGAN YANG DIPERBARUI === */
        .footer-signatures { 
            margin-top: 60px;
            width: 100%; 
        }
        
        /* Teks "Ditandatangani Oleh," di kiri atas */
        .signature-intro {
            font-weight: bold; 
            margin-bottom: 50px; /* Jarak antara intro dan baris tanda tangan */
            text-align: left; /* Pastikan di kiri */
        }

        .signature-row {
            display: table; /* Gunakan display table untuk baris tanda tangan */
            width: 100%;
            table-layout: fixed;
        }

        .signature-box { 
            display: table-cell; /* Setiap tanda tangan menjadi sel */
            width: 25%; /* Memastikan 4 kolom */
            text-align: center; 
            padding-top: 20px;
            vertical-align: top; 
        }
        .signature-name { 
            border-bottom: 1px dotted #000;
            padding-bottom: 5px;
            margin: 0 auto;
            width: 80%;
            display: block;
        }
        .signature-position {
            margin-top: 5px;
            font-size: 11pt;
        }
    </style>
</head>
<body>

    <div class="container">
        
        <div class="header">
            <div class="header-logo">
                 <img src="{{ public_path('img/logo.png') }}" alt="Logo">
            </div>
            <div class="header-title">
                <h2>REKAP DATA PESERTA WEBINAR</h2> 
                <h3>{{ $judul ?? 'Laporan Data Peserta Webinar' }}</h3>
                <p>Periode: {{ $periode ?? 'N/A' }}</p>
            </div>
            <div class="header-line"></div>
        </div>

        <table class="content-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. Hp</th>
                    <th>Instansi</th>
                    <th>Pekerjaan</th>
                    <th>Tipe Kegiatan</th>
                    <th>Tanggal Daftar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $key => $item)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td class="text-left">{{ $item->nama }}</td>
                    <td class="text-left">{{ $item->email }}</td>
                    <td class="text-left">{{ $item->noHp }}</td>
                    <td class="text-left">{{ $item->instansi }}</td>
                    <td class="text-left">{{ $item->pekerjaan }}</td>
                    <td class="text-left">{{ $item->tipe_kegiatan }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data untuk ditampilkan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="footer-signatures">
            <div class="signature-intro">Ditandatangani Oleh,</div>
            
            <div class="signature-row">
                <div class="signature-box">
                    <span class="signature-name"></span>
                    <div class="signature-position">Ketua Pelaksana Lomba</div>
                </div>

                <div class="signature-box">
                    <span class="signature-name"></span>
                    <div class="signature-position">Penyelenggara Lomba</div>
                </div>

                <div class="signature-box">
                    <span class="signature-name"></span>
                    <div class="signature-position">Admin</div> 
                </div>

            </div> {{-- Akhir signature-row --}}
        </div>

    </div>

</body>
</html>