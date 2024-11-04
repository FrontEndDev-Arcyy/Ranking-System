<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generateRankingSummaryPDF()
    {
        $data = [
            // Add any dynamic data you want to pass to the view
            'title' => 'Father Saturnino Urios University',
            'name' => 'John Doe',
            'office' => 'Academic Affairs',
            // ... other data ...
        ];

        $pdf = PDF::loadView('ranking-summary-pdf', $data);

        // If you want to customize the paper size and orientation
        $pdf->setPaper('A4', 'portrait');

        // Stream the PDF (open in browser)
        // return $pdf->stream('ranking-summary');

        // Or, if you want to force download
        return $pdf->download('ranking-summary.pdf');
    }
}
