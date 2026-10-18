<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\GraduateStat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use PhpOffice\PhpSpreadsheet\IOFactory;

class GraduateStatController extends Controller
{
    public function index(): View
    {
        $stats = GraduateStat::orderBy('category')->orderBy('label')->get()
            ->groupBy('category');

        return view('admin.graduate-stats.index', compact('stats'));
    }

    /**
     * Upload Excel dan proses data statistik.
     *
     * Format Excel yang diharapkan:
     * Kolom A: Kategori  (mis: Provinsi, Jenis Program, Jenis Kelamin)
     * Kolom B: Label     (mis: Aichi, Magang, Laki-laki)
     * Kolom C: Total     (angka)
     * Baris 1 adalah header, data mulai baris 2.
     */
    public function upload(Request $request): RedirectResponse
    {
        $request->validate([
            'excel' => 'required|file|mimes:xlsx,xls,csv|max:5120',
        ]);

        $path        = $request->file('excel')->getRealPath();
        $spreadsheet = IOFactory::load($path);
        $sheet       = $spreadsheet->getActiveSheet();
        $rows        = $sheet->toArray(null, true, true, true);

        $inserted = 0;
        $errors   = [];

        // Hapus data lama sebelum import baru
        GraduateStat::truncate();

        foreach ($rows as $rowNum => $row) {
            // Skip header
            if ($rowNum === 1) continue;

            $category = trim($row['A'] ?? '');
            $label    = trim($row['B'] ?? '');
            $total    = intval($row['C'] ?? 0);

            if (empty($category) || empty($label)) continue;

            GraduateStat::create([
                'category' => $category,
                'label'    => $label,
                'total'    => $total,
            ]);

            $inserted++;
        }

        Cache::forget('landing.graduate_stats');

        ActivityLog::record('create', 'Statistik Lulusan', "Import Excel: {$inserted} data berhasil diimpor");

        return redirect()
            ->route('admin.graduate-stats.index')
            ->with('success', "{$inserted} data statistik berhasil diimpor dari Excel.");
    }

    public function destroy(): RedirectResponse
    {
        GraduateStat::truncate();

        Cache::forget('landing.graduate_stats');

        ActivityLog::record('delete', 'Statistik Lulusan', 'Menghapus semua data statistik lulusan');

        return redirect()
            ->route('admin.graduate-stats.index')
            ->with('success', 'Semua data statistik berhasil dihapus.');
    }

    public function template()
    {
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'Kategori');
        $sheet->setCellValue('B1', 'Label');
        $sheet->setCellValue('C1', 'Total');

        // Contoh data
        $examples = [
            ['Provinsi Tujuan', 'Aichi', 45],
            ['Provinsi Tujuan', 'Tokyo', 30],
            ['Provinsi Tujuan', 'Osaka', 25],
            ['Jenis Program', 'Magang (Tokutei)', 60],
            ['Jenis Program', 'Specified Skilled Worker', 40],
            ['Jenis Kelamin', 'Laki-laki', 70],
            ['Jenis Kelamin', 'Perempuan', 30],
        ];

        $row = 2;
        foreach ($examples as $example) {
            $sheet->setCellValue("A{$row}", $example[0]);
            $sheet->setCellValue("B{$row}", $example[1]);
            $sheet->setCellValue("C{$row}", $example[2]);
            $row++;
        }

        // Style header
        $sheet->getStyle('A1:C1')->getFont()->setBold(true);
        foreach (['A', 'B', 'C'] as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $writer   = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $filename = 'template_statistik_lulusan.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"{$filename}\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
