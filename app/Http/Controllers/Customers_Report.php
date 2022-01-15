<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Sections;
use Illuminate\Http\Request;

class Customers_Report extends Controller
{
    public function index()
    {
        $sections = Sections::all();
        return view('reports.customers_report',compact('sections'));
    }

    //    Search invoice
    public function Search_customers(Request $request)
    {
// في حالة البحث بدون التاريخ
        if ($request->Section && $request->product && $request->start_at =='' && $request->end_at=='')
        {
            $invoices = Invoices::select('*')->where('section_id','=',$request->Section)->where('product','=',$request->product)->get();
            $sections = Sections::all();
            return view('reports.customers_report',compact('sections'))->withDetails($invoices);
        }
        // في حالة البحث بتاريخ
        else
        {
            $start_at = date($request->start_at);
            $end_at = date($request->end_at);

            $invoices = Invoices::whereBetween('invoice_Date',[$start_at,$end_at])->where('section_id','=',$request->Section)->where('product','=',$request->product)->get();
            $sections = Sections::all();
            return view('reports.customers_report',compact('sections'))->withDetails($invoices);
        }
    }
}
