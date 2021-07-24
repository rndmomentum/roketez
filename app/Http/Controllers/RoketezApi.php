<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\PaymentHistory;

class RoketezApi extends Controller
{
    public function getReportTransaction()
    {
        // Month Range
        $fromMonth = date('Y-m-01');
        $toMonth = date('Y-m-31');
        $first = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromMonth." 00:00:00", $toMonth." 23:59:59"])->where('price', '199')->count();
        $second = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromMonth." 00:00:00", $toMonth." 23:59:59"])->where('price', '200')->count();

        $getArray = ['first' => $first,'second' => $second];

        return $getArray;
    }
    
    public function getReportCollection()
    {   
        // Month Range
        $fromMonth = date('Y-m-01');
        $toMonth = date('Y-m-31');
        return PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromMonth." 00:00:00", $toMonth." 23:59:59"])->sum('price');
    }
}
