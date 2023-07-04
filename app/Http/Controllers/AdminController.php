<?php

namespace App\Http\Controllers;

use App\Models\Concerts;
use App\Models\Customers;
use App\Models\Tickets;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        $data['title'] = 'Dashboard';
        return view('pages/dashboard', $data);
    }

    public function pages($page) {

        switch ($page) {
            case 'daftar-pemesan':
                $data['data'] = Tickets::with(['customer'])->get();
                break;
            case 'kelola-konser':
                $data['data'] = Concerts::with(['ticketTypes'])->get();
                break;
            default:
                # code...
                break;
        }

        $data['title'] = ucwords(str_replace('-',' ', $page));
        return view('pages/'.$page, $data);
    }
}
