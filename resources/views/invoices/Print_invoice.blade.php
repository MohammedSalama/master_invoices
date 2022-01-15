@extends('layouts.master')
@section('css')
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }
    </style>
@endsection
@section('title')
    Invoice print preview
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Invoices</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Invoice print preview</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="print">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">
                            <h1 class="invoice-title">Collection Invoice</h1>
                            <div class="billed-from">
                                <h6>{{ Auth::user()->name }}, Inc.</h6>
                                <p>67 ش Abdulaziz Al Saud, Al Manyal Al Gharbi, Old Cairo, Cairo Governorate<br>
                                    Tel No: +20 0111 157 0436<br>
                                    Email: mohamed96salama@gmail.com</p>
                            </div><!-- billed-from -->
                        </div><!-- invoice-header -->
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-600">Billed To</label>
                                <div class="billed-to">
                                    <h6>{{ Auth::user()->name }}</h6>
                                    <p>11710 Macarthur Blvd, Potomac, MD 20854, United States<br>
                                        Tel No: +20 0111 157 0436<br>
                                        Email: {{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <div class="col-md">
                                <label class="tx-gray-600">Invoice information</label>
                                <p class="invoice-info-row"><span>Invoice number</span>
                                    <span>{{ $invoices->invoice_number }}</span></p>
                                <p class="invoice-info-row"><span>Release Date</span>
                                    <span>{{ $invoices->invoice_Date }}</span></p>
                                <p class="invoice-info-row"><span>Due date</span>
                                    <span>{{ $invoices->Due_date }}</span></p>
                                <p class="invoice-info-row"><span>Section</span>
                                    <span>{{ $invoices->section->section_name }}</span></p>
                            </div>
                        </div>
                        <div class="table-responsive mg-t-40">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th class="wd-20p">#</th>
                                    <th class="wd-40p">Product</th>
                                    <th class="tx-center">Collection Amount</th>
                                    <th class="tx-right">Commission Amount</th>
                                    <th class="tx-right">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="tx-12">{{ $invoices->product }}</td>
                                    <td class="tx-center">{{ number_format($invoices->Amount_collection, 2) }}</td>
                                    <td class="tx-right">{{ number_format($invoices->Amount_Commission, 2) }}</td>
                                    @php
                                        $total = $invoices->Amount_collection + $invoices->Amount_Commission ;
                                    @endphp
                                    <td class="tx-right">
                                        {{ number_format($total, 2) }}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="valign-middle" colspan="2" rowspan="4">
                                        <div class="invoice-notes">
                                            <label class="main-content-label tx-13">#</label>

                                        </div><!-- invoice-notes -->
                                    </td>
                                    <td class="tx-right">Total</td>
                                    <td class="tx-right" colspan="2"> {{ number_format($total, 2) }}</td>
                                </tr>
                                <tr>
                                    <td class="tx-right">Tax Rate({{ $invoices->Rate_VAT }})</td>
                                    <td class="tx-right" colspan="2">287.50</td>
                                </tr>
                                <tr>
                                    <td class="tx-right">Discount Value</td>
                                    <td class="tx-right" colspan="2"> {{ number_format($invoices->Discount, 2) }}</td>

                                </tr>
                                <tr>
                                    <td class="tx-right tx-uppercase tx-bold tx-inverse">Total including tax</td>
                                    <td class="tx-right" colspan="2">
                                        <h4 class="tx-primary tx-bold">{{ number_format($invoices->Total, 2) }}</h4>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr class="mg-b-40">



                        <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                                class="mdi mdi-printer ml-1"></i>Print</button>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>


    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>

@endsection
