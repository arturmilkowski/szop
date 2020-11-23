<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Order\Printing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Services\SaleDocument;
use App\Models\Order;

class HtmlController extends Controller
{
    /**
     * Create HTML document for print.
     *
     * @param Request      $request      Request
     * @param SaleDocument $saleDocument Sale document type
     * @param Order        $order        Order
     * 
     * @return View
     */
    public function __invoke(
        Request $request,
        SaleDocument $saleDocument,
        Order $order
    ): View {
        Gate::authorize('admin');

        $documentType = $request->query('dokument');
        $header = $saleDocument->getHeader($documentType, $order);
        $createdAt = $saleDocument->getCreatedAt($order);
        $currentRouteName = 'backend.admins.orders';

        return view(
            'backend.admin.order.print.html',
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
