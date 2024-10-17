<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use DateTime;

class AboutController extends Controller
{
    /**
     * Returns age based on birthday date and current date, GMT-3
     */
    function returnAge()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $birthday = new DateTime("2002-12-24");
        $currentDate = DateTime::createFromFormat("Y-m-d", date("Y-m-d"));
        $age = $birthday->diff($currentDate);
        return $age->y;
    }

    /**
     * Shows about page
     *
     * @return View
     */
    public function show() : View
    {
        return view('about', [
            'age' => $this->returnAge()
        ]);
    }
}
