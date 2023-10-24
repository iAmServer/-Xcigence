<?php
function convertToDesiredFormat($array, $status)
{
    $formattedArray = [];

    foreach ($array as $email) {
        $formattedArray[] = ["email" => $email, "status" => $status];
    }

    return $formattedArray;
}

$emails = array_merge(
    convertToDesiredFormat($user->email_at_risk_low, "low"),
    convertToDesiredFormat($user->email_at_risk_medium, "medium"),
    convertToDesiredFormat($user->email_at_risk_high, "high")
);
shuffle($emails);
?>


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
                                    Threat Level</p>
                                <h5 class="mb-2 font-bold">
                                    <?php echo
                                        $report->status; ?>
                                </h5>
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
                                    Threat Score</p>
                                <h5 class="mb-2 font-bold">
                                    <?php echo
                                        $report->final_score; ?>
                                </h5>
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
                                    Hacked Users</p>
                                <h5 class="mb-2 font-bold">
                                    <?php
                                    echo count($hacked_emails);
                                    ?>
                                </h5>

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
                                    Vulnerability</p>
                                <h5 class="mb-2 font-bold">
                                    <?php
                                    if ($report->Low_vuln === "1") {
                                        echo "Low";
                                    } else if ($report->Medium_vuln === "1") {
                                        echo "Medium";
                                    } else if ($report->High_vuln === "1") {
                                        echo "High";
                                    } else {
                                        echo "Critical";
                                    }
                                    ?>
                                </h5>
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
                class="border-black/12.5 shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border mb-6 lg:mb-0 min-h-[300px]">
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

        <div class="w-full max-w-full px-3 mt-0 lg:w-5/12 lg:flex-none">
            <div
                class="border-black/12.5 shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border mb-6 lg:mb-0 min-h-[300px]">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid px-6 py-8">
                    <h2 class="text-xl font-semibold">System Defense</h2>


                    <p class="text-sm mt-0 mb-4">
                        <?php echo $threat->system_defense ?>
                    </p>
                    <ul class="flex flex-col gap-y-2">
                        <li>
                            <?php
                            echo $threat->system_defense_description;
                            ?>
                        </li>
                        <!-- <li class="my-2">
                            <hr />
                        </li>
                        <li class="flex flex-col"><strong class="font-semibold  text-lg">Solution</strong>
                            <?php
                            echo $report->Vulnerability[0]->solution;
                            ?>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap mt-6 -mx-3">


        <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
            <div
                class="relative flex flex-col min-w-0 p-4 break-words bg-white border-0 border-solid shadow-xl border-black-125 rounded-2xl bg-clip-border">
                <div class="p-4 pb-0 mb-4 rounded-t-4">
                    <h2 class="text-xl font-semibold">Threat Levels</h2>
                </div>

                <canvas id="threatChart" height="300"></canvas>
            </div>
        </div>
        <div class="w-full max-w-full px-3 lg:mt-0 lg:w-5/12 lg:flex-none mt-6">
            <div
                class="relative flex p-4 flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl border-black-125 rounded-2xl bg-clip-border">
                <div class="p-4 pb-0 mb-4 rounded-t-4">
                    <h2 class="text-xl font-semibold">Users Location</h2>
                </div>
                <canvas id="canvas" height="300"></canvas>
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
                class="border-black/12.5 shadow-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border py-4">
                <div class="px-2 pb-0 rounded-t-4">
                    <h6 class="mb-0 font-semibold">Hacked Users</h6>
                </div>
                <table class="items-center w-full mb-4 align-top border-collapse border-gray-200 mt-4">
                    <thead>
                        <tr>
                            <th class="text-start px-2">Email</th>
                            <th class="text-start">Channel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($hacked_emails as $email) {

                            ?>
                            <tr class="border-b last:border-0">
                                <td class="p-2.5 align-middle bg-transparent whitespace-nowrap ">
                                    <?php echo $email['email']; ?>
                                </td>
                                <td class="p-2.5 align-middle bg-transparent whitespace-nowrap ">
                                    <?php echo $email['source']; ?>
                                    <a href="http://www.<?php echo $email['source']; ?>" class="mr-2" target="_blank">
                                        <i class="fa fa-external-link-alt text-blue-500"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div
                class="border-black/12.5m shadow-xl mt-6 relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border py-4">
                <div class="px-4 pb-0 rounded-t-4 mb-2">
                    <h6 class="mb-0 font-semibold">Solution</h6>
                </div>
                <ol class="list-decimal flex flex-col gap-y-1 px-8">
                    <?php
                    $lines = explode('.', $user->email_risks_solution);

                    foreach ($lines as $line) {
                        if ($line !== ' ') {
                            echo "<li class='text-slate-500'>" . trim($line) . "</li>";
                        }
                    } ?>
                </ol>
            </div>
        </div>
    </div>
</div>