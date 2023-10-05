<?php declare(strict_types=1);

use App\Features\Campaigns\CreateCampaignForNewCustomers;

require __DIR__ . '/bootstrap.php';

/* ************************************************************************************* *
 * The code below illustrates an example of how code could be executed in another app.   *
 * In this case, both apps have a completely different composer package and PHP version. *
 * ************************************************************************************* */

$notifiedCustomers = (new CreateCampaignForNewCustomers)->execute();

echo '<h1>Notified Customers</h1>';
echo '<table style="text-align:left;width:30%">';
echo '<thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead>';
echo '<tbody>';
foreach ($notifiedCustomers as $customer) {
    echo '<tr>';
    echo '<td>' . $customer->id . '</td>';
    echo '<td>' . $customer->name . '</td>';
    echo '<td>' . $customer->email . '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
