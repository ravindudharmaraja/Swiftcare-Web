<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; 


class PaymentController extends Controller
{
    public function checkout($booking)
    {
        // Implement your checkout logic here
        return view('pages.checkout', ['bookingId' => $booking]);
    }
    
    public function initiatePayment(Request $request)
    {
        // Replace the following variables with your actual PayHere credentials
        $merchantId = 'YOUR_MERCHANT_ID';
        $returnUrl = 'http://your-app.com/payhere/success';
        $cancelUrl = 'http://your-app.com/payhere/cancel';
        $notifyUrl = 'http://your-app.com/payhere/notification';
        $orderId = 'ORDER_ID'; // Generate a unique order ID for each transaction
        $items = 'Product Name';
        $currency = 'LKR';
        $amount = 1000; // Replace with the actual amount

        // Generate hash as per the PayHere documentation
        $merchantSecret = 'YOUR_MERCHANT_SECRET';
        $hash = strtoupper(
            md5(
                $merchantId .
                $orderId .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5($merchantSecret))
            )
        );

        return view('payhere.checkout', compact(
            'merchantId',
            'returnUrl',
            'cancelUrl',
            'notifyUrl',
            'orderId',
            'items',
            'currency',
            'amount',
            'hash',
        ));
    }

    public function handlePaymentNotification(Request $request)
    {
        // Implement code to handle payment notification from PayHere
        // Extract and validate parameters, update your database, etc.
        // Example: $this->updateDatabaseOnPaymentNotification($request->all());

        // Log the payment notification for debugging
        \Log::info('PayHere Notification Received: ' . json_encode($request->all()));
        
        // Respond with HTTP 200 to acknowledge receipt of the notification
        return response('OK', 200);
    }

    private function updateDatabaseOnPaymentNotification(array $data)
    {
        // Implement your logic to update the database based on the payment notification
        // Example: Update order status, record transaction details, etc.
    }
}

