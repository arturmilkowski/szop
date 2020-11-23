<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\User\Order\Printing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\SaleDocument;
use App\Models\Order;

class HtmlController extends Controller
{
    /**
     * Show print html page for sale document.
     *
     * @param Request      $request      Request 
     * @param SaleDocument $saleDocument Sale Document Service
     * @param Order        $order        Order
     * 
     * @return View
     */
    public function __invoke(
        Request $request,
        SaleDocument $saleDocument,
        Order $order
    ): View {
        $this->authorize('view', $order);
        
        $currentRouteName = 'backend.users.orders';

        $documentType = $request->query('dokument');
        $header = $saleDocument->getHeader($documentType, $order);
        $createdAt = $saleDocument->getCreatedAt($order);

        return view(
            'backend.user.order.print.html',
            compact(
                'documentType',
                'order',
                'header',
                'createdAt',
                'currentRouteName'
            )
        );
    }
}
