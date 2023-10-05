<?php declare(strict_types=1);

namespace App\Features\Campaigns;

use App\Proxy;

class CreateCampaignForNewCustomers
{
    public function execute()
    {
        // 1. Create new campaign
        // $campaign = Campaign::create([...]);

        // 2. Find ids of new customers to notify about the campaign
        // $customerIds = Customer::where('created_at', '>', '2023-10-03 00:00:00')->pluck('id')->get();
        $customerIds = [1, 2];

        // 3. Send email to notify customer about new campaign (this code is located in the php7 app)
        $notifiedCustomers = [];
        foreach ($customerIds as $customerId)
        {
            $command = '
                use App\Features\Customers\NotifyCustomerViaEmail;
                use App\Features\SuccessfulExecution;
                $feature = (new NotifyCustomerViaEmail)->execute('. $customerId .');
                if ($feature instanceof SuccessfulExecution) {
                    $feature = $feature->getResult()->toArray();
                }
                echo json_encode($feature);
            ';
            $notifiedCustomers[] = json_decode((new Proxy)->toPhp7App($command));
        }
        return $notifiedCustomers;
    }
}
