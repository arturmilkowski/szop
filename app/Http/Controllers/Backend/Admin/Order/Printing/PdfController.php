<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Order\Printing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use PDF;
use App\Services\SaleDocument;
use App\Models\Order;

class PdfController extends Controller
{
    /**
     * Create PDF document for print.
     *
     * @param Request      $request      Request
     * @param SaleDocument $saleDocument Sale document type
     * @param Order        $order        Order
     * 
     * @return Response
     */
    public function __invoke(
        Request $request,
        SaleDocument $saleDocument,
        Order $order
    ): Response {
        Gate::authorize('admin');

        $documentType = $request->query('dokument');
        $fileName = $saleDocument->getFileName($documentType, $order);
        $header = $saleDocument->getHeader($documentType, $order);
        $createdAt = $saleDocument->getCreatedAt($order);
        $currentRouteName = 'backend.admins.orders';

        $pdf = PDF::loadView(
            'backend.admin.order.print.pdf',
            compact(
                'documentType',
                'order',
                'header',
                'createdAt',
                'currentRouteName'
            )
        );

        return $pdf->download($fileName.'.pdf');
    }
}
