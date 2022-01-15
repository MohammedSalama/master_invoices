<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use Illuminate\Http\Request;

class Invoices_Report extends Controller
{
    public function index()
    {
        return view('reports.invoices_report');
    }

    public function Search_invoices(Request $request){

        $radio = $request->radio;

        // في حالة البحث بنوع الفاتورة

        if ($radio == 1)
        {
            // في حالة عدم تحديد تاريخ
            if ($request->type && $request->start_at =='' && $request->end_at =='')
            {
                $invoices = Invoices::select('*')->where('Status','=',$request->type)->get();
                $type = $request->type;
                return view('reports.invoices_report',compact('type'))->withDetails($invoices);
            }
            // في حالة تحديد تاريخ استحقاق
            else
            {
                $start_at = date($request->start_at);
                $end_at = date($request->end_at);
                $type = $request->type;
                $invoices = Invoices::whereBetween('invoice_Date',[$start_at,$end_at])->where('Status','=',$request->type)->get();
                return view('reports.invoices_report',compact('type','start_at','end_at'))->withDetails($invoices);
            }
        }
        //====================================================================

// في البحث برقم الفاتورة
        else
            {
                $invoices = Invoices::select('*')->where('invoice_number','=',$request->invoice_number)->get();
                return view('reports.invoices_report')->withDetails($invoices);
            }

        }


    }
