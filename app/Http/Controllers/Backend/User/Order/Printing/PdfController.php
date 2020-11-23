<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\User\Order\Printing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PDF;
use App\Services\SaleDocument;
use App\Models\Order;

class PdfController extends Controller
{
    /**
     * Print sale document in PDF format.
     *
     * @param Request      $request      Request
     * @param SaleDocument $saleDocument Sale Document Service
     * @param Order        $order        Order
     * 
     * @return Response
     */
    public function __invoke(
        Request $request,
        SaleDocument $saleDocument,
        Order $order
    ): Response {
        $this->authorize('view', $order);
        
        $currentRouteName = 'backend.users.orders';

        $documentType = $request->query('dokument');
        $fileName = $saleDocument->getFileName($documentType, $order);
        $header = $saleDocument->getHeader($documentType, $order);
        $createdAt = $saleDocument->getCreatedAt($order);

        $pdf = PDF::loadView(
            'backend.user.order.print.pdf',
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
