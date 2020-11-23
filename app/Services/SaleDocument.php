<?php

declare(strict_types = 1);

namespace App\Services;

use Carbon\Carbon;
use App\Models\Order;

class SaleDocument
{
    /**
     * Create document sale file name.
     *
     * @param string $documentType Document type
     * @param Order  $order        Order
     * 
     * @return string
     */
    public function getFileName(string $documentType, Order $order): string
    {
        $fileName = '';

        if ($documentType == 'rachunek') {
            $fileName = $documentType . '_' . $order->getBillNumberAttribute();
        }

        if ($documentType == 'faktura') {
            $fileName = $documentType . '_' . $order->getInvoiceNumberAttribute();
        }

        return $fileName;
    }

    /**
     * Create document header.
     *
     * @param string $documentType Document type
     * @param Order  $order        Order
     * 
     * @return string
     */
    public function getHeader(string $documentType, Order $order): string
    {
        $header = '';

        if ($documentType == 'rachunek') {
            $header = $documentType . ' numer: ' . 
                $order->getBillNumberAttribute();
        }

        if ($documentType == 'faktura') {
            $header = $documentType . ' numer: ' . 
                $order->getInvoiceNumberAttribute();
        }

        return $header;
    }

    /**
     * Parse date of sale document to format: YYYY-MM-DD
     *
     * @param Order $order Order
     * 
     * @return string Date in format YYYY-MM-DD
     */
    public function getCreatedAt(Order $order): string
    {
        return Carbon::parse($order->created_at)->toDateString();
    }
}
