<?php declare(strict_types=1);

namespace App\Features\Customers;

use App\Features\FailedExecution;
use App\Features\SuccessfulExecution;
use App\Models\Customer;

class NotifyCustomerViaEmail
{
    public function execute(int $customerId) // : SuccessfulExecution|FailedExecution
    {
        // 1. lookup customer in database
        // $customer = Customer::find($customerId);
        $customer = new Customer($customerId, 'Customer ' . $customerId . ' Name', 'customer-' . $customerId . '@email.com');

        // 2. send some emails
        // try {
        //     Mail::to($customer->email, 'notify-email-alias');
        // } catch (MailTransferException $e) {
        //     return new FailedExecution('Failed to send email to: ' . $customer->email, $e);
        // }

        // 3. success!
        return new SuccessfulExecution($customer);
    }
}
