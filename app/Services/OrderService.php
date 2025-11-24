<?php

namespace App\Services;



use niklasravnsborg\LaravelPdf\Facades\Pdf;

class OrderService
{
    public function generatePdf($data) {
        //
        $pdf = PDF::loadView('pages.orders.inc.invoice-pdf', [
            'order' => $data,
        ]);

        $path = public_path('pdf/order-'. $data['id']  .'-invoice.pdf');
        $pdf->save($path);
    }
}
