<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
    public function view($page = 'threat_analysis')
    {
        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page);
        $data['title'] = str_replace('_', ' ', $data['title']);

        $json = file_get_contents('db/data.json');
        $json_data = json_decode($json);

        $data['report'] = $json_data->report_detail;
        $data['user'] = $json_data->Digital_User_Risk[0];
        $data['threat'] = $json_data->Threatened[0];

        $hacked_email_address = $data['user']->hacked_email_address->hacked_email_address;
        $hacked_emails = array();

        foreach ($hacked_email_address as $email) {
            list($email, $source) = explode(' [', $email);
            $source = rtrim($source, ']');

            $emailObject = [
                'email' => trim($email),
                'source' => trim($source)
            ];

            $hacked_emails[] = $emailObject;
        }

        $data['hacked_emails'] = $hacked_emails;

        $uniquePorts = array();

        foreach ($data['threat']->Open_TCP_Port as $no_of_open_port) {
            foreach ($no_of_open_port->Open_TCP_Port as $port) {
                $portParts = explode(':', $port);

                if (count($portParts) == 2) {
                    $portNumber = $portParts[1];
                    $uniquePorts[$portNumber] = true;
                }
            }
        }

        $data['uniquePortCount'] = count($uniquePorts);
        $data['no_of_expired_ssl'] = count($data['threat']->SSL_Certificate_Expired->SSL_Certificate_Expired);
        $data['no_of_malacious_ip'] = count($data['threat']->Malicious_IP_Address_threat->Malicious_IP_Address);
        $data['no_of_cohosted_site'] = count($data['threat']->co_shared_hosts->Co_Hosted_Site_List);
        $data['no_of_human_name'] = count($data['threat']->human_name->human_name_list);
        $data['no_of_phone_number'] = count($data['threat']->Phone_number->phone_number_list);

        return view('templates/header', $data)
            . view('pages/' . $page)
            . view('templates/footer');
    }
}