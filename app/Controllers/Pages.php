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

        return view('templates/header', $data)
            . view('pages/' . $page)
            . view('templates/footer');
    }
}