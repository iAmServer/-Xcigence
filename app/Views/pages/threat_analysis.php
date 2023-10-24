<?php
function convertToDesiredFormat($array, $status)
{
    $formattedArray = [];

    foreach ($array as $email) {
        $formattedArray[] = ["email" => $email, "status" => $status];
    }

    return $formattedArray;
}

$json = file_get_contents('db/data.json');
$data = json_decode($json);
$report = $data->report_detail;
$user = $data->Digital_User_Risk[0];
$threat = $data->Threatened;


$emails = array_merge(
    convertToDesiredFormat($user->email_at_risk_low, "low"),
    convertToDesiredFormat($user->email_at_risk_medium, "medium"),
    convertToDesiredFormat($user->email_at_risk_high, "high")
);
shuffle($emails);

$hacked_email_address = $user->hacked_email_address->hacked_email_address;
foreach ($hacked_email_address as $email) {
    list($email, $source) = explode(' [', $email);
    $source = rtrim($source, ']');

    $emailObject = [
        'email' => trim($email),
        'source' => trim($source)
    ];

    $hacked_email_address[] = $emailObject;
}


?>

<script>
    console.log(<?php echo json_encode($hacked_email_address); ?>);
</script>

<div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap mt-6 -mx-3">
        <!-- card1 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase">
                                    Today's Money</p>
                                <h5 class="mb-2 font-bold">$53,000</h5>
                                <p class="mb-0">
                                    <span class="text-sm font-bold leading-normal text-emerald-500">+55%</span>
                                    since yesterday
                                </p>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                                <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card2 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase">
                                    Today's Users</p>
                                <h5 class="mb-2 font-bold">2,300</h5>
                                <p class="mb-0">
                                    <span class="text-sm font-bold leading-normal text-emerald-500">+3%</span>
                                    since last week
                                </p>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                                <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card3 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase">
                                    New Clients</p>
                                <h5 class="mb-2 font-bold">+3,462</h5>
                                <p class="mb-0">
                                    <span class="text-sm font-bold leading-normal text-red-600">-2%</span>
                                    since last quarter
                                </p>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                                <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card4 -->
        <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase">
                                    Sales</p>
                                <h5 class="mb-2 font-bold">$103,430</h5>
                                <p class="mb-0">
                                    <span class="text-sm font-bold leading-normal text-emerald-500">+5%</span>
                                    than last month
                                </p>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                                <i class="ni leading-none ni-cart text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
            <div
                class="border-black/12.5 shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border mb-6 lg:mb-0 h-36">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid px-6 py-8">
                    <h6 class="capitalize text-lg font-semibold">
                        <?php echo $report->clientid; ?> -
                        <?php echo $report->client_name; ?>
                    </h6>
                    <p class="text-sm mb-4">
                        <?php echo $report->client_industry; ?>
                    </p>

                    <div class="flex items-center gap-3">
                        <p class="mb-0 text-sm leading-normal">
                            <i class="fa fa-solid fa-envelope mr-1"></i>
                            <?php echo $report->client_email; ?>
                        </p>
                        <p class="mb-0 text-sm leading-normal">
                            <i class="fa fa-solid fa-globe mr-1"></i>
                            <?php echo $report->client_web_ip; ?>
                            <a href="
                            <?php echo $report->client_web_ip; ?>" target="_blank
                            ">
                                <i class="fa fa-external-link-alt text-blue-500"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-full px-3 mt-0 lg:w-5/12 lg:flex-none">
            <div
                class="shadow-xl relative z-20 flex min-w-0 flex-row  items-center rounded-2xl border-0 border-solid bg-white bg-clip-border px-6 py-8 h-36 ">

                <div class="mb-0 rounded-t-2xl border-b-0 border-solid ">
                    <p class="text-sm mb-0">
                        <span class="font-medium">Scan ID:</span>
                        <?php
                        echo $report->scan_id;
                        ?>
                    </p>
                    <h6 class="capitalize text-lg font-semibold">
                        Vulnerability Level
                    </h6>

                    <div class="flex items-center gap-3">
                        <p class="mb-0 font-medium text-sm leading-normal text-red-600">
                            <?php echo $report->status; ?>
                        </p>
                    </div>
                </div>

                <div id="circularGaugeContainer" class="ml-auto p-0 h-32"></div>

            </div>
        </div>
    </div>

    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
            <div
                class="border-black/12.5 shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border mb-6 lg:mb-0">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid px-6 py-8">
                    <h2 class="text-xl font-semibold">Website Vulnerability Details</h2>
                    <ul class="flex gap-2 items-center text-sm">
                        <li><strong class="font-semibold">Severity:</strong> <span class="text-red-600">
                                <?php
                                echo $report->Vulnerability[0]->severity;
                                ?>
                            </span></li>
                        <li><strong class="font-semibold">CVE:</strong>
                            <?php
                            echo $report->Vulnerability[0]->CVE;
                            ?>
                        </li>
                    </ul>

                    <p class="text-sm mt-0 mb-4">

                    </p>
                    <ul class="flex flex-col gap-y-2">
                        <li>
                            <strong class="font-semibold">Alert:</strong>
                            <?php
                            echo $report->Vulnerability[0]->alert;
                            ?>
                        </li>

                        <li>
                            <?php
                            echo $report->Vulnerability[0]->description;
                            ?>
                        </li>
                        <li class="my-2">
                            <hr />
                        </li>
                        <li class="flex flex-col"><strong class="font-semibold  text-lg">Solution</strong>
                            <?php
                            echo $report->Vulnerability[0]->solution;
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl border-black-125 rounded-2xl bg-clip-border">
                <div class="p-4 pb-0 mb-0 rounded-t-4">
                    <h6 class="capitalize text-lg font-semibold">
                        Mail Service -
                        <?php echo $user->mailservice ?>
                    </h6>
                    <p class="text-sm mb-4">
                        <?php echo $user->mailservice_description; ?>
                    </p>
                </div>
                <div class="overflow-x-auto">
                    <table class="items-center w-full mb-4 align-top border-collapse border-gray-200 ">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-start">Email</th>
                                <th class="text-start">Risk Level</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $emails = array_slice($emails, 0, 10);
                            foreach ($emails as $email) {

                                ?>
                                <tr class="border-b last:border-0">
                                    <td class="p-2.5 pl-4 text-start">
                                        <span
                                            class="text-xs font-semibold w-2 h-2 p-3 flex justify-center items-center uppercase rounded-full text-slate-600 bg-slate-200">
                                            <?php echo substr($email['email'], 0, 1); ?>
                                        </span>
                                    </td>
                                    <td class="p-2.5 align-middle bg-transparent whitespace-nowrap ">
                                        <?php echo $email['email']; ?>
                                    </td>
                                    <td class="p-2.5 align-middle bg-transparent whitespace-nowrap <?php if ($email['status'] === 'low') {
                                        echo 'text-green-500';
                                    } else if ($email['status'] === "medium") {
                                        echo 'text-yellow-500';
                                    } else {
                                        echo 'text-red-500';
                                    } ?>">
                                        <?php echo ucfirst($email['status']); ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="w-full max-w-full px-3 mt-0 lg:w-5/12 lg:flex-none">
            <div
                class="border-black/12.5 shadow-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="p-4 pb-0 rounded-t-4">
                    <h6 class="mb-0">Possible Hacked Users</h6>
                </div>
                <table class="items-center w-full mb-4 align-top border-collapse border-gray-200 ">
                    <thead>
                        <tr>
                            <th class="text-start">Email</th>
                            <th class="text-start">Channel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($hacked_email_address as $email) {

                            ?>
                            <tr class="border-b last:border-0">
                                <td class="p-2.5 align-middle bg-transparent whitespace-nowrap ">
                                </td>
                                <td class="p-2.5 align-middle bg-transparent whitespace-nowrap ">
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>