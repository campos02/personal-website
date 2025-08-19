<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class AboutController extends Controller
{
    /**
     * Returns age based on birthday date and current date
     */
    public function returnAge()
    {
        $birthday = new DateTime(config('app.birthday'));
        $currentDate = DateTime::createFromFormat('Y-m-d H:i:s', Carbon::now());
        $age = $birthday->diff($currentDate);

        return $age->y;
    }

    /**
     * Shows about page
     */
    public function show(): View
    {
        return view('about', [
            'age' => $this->returnAge(),
        ]);
    }
}
