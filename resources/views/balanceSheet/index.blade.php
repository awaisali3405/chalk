@extends('layouts.app')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Balance Sheet</h4>
                    </div>
                </div>

            </div>

            <div class="profile-personal-info pt-4">
                <form action="{{ route('balanceSheet.index') }}" method="get">
                    <div class="row">
                        <div class="col-lg-4 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Branch</label>
                                <div class="input-group mb-2">
                                    <select name="branch_id" id="branch_id" class="form-control">
                                        <option value="-1">All</option>
                                        @foreach ($branch as $value)
                                            <option value="{{ $value->id }}"
                                                {{ request()->get('branch_id') == $value->id ? 'selected' : '' }}>
                                                {{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Academic Year</label>
                                <div class="input-group mb-2">
                                    <select name="academic_year_id" id="academic_year_id" class="form-control">
                                        <option value="">-</option>
                                        @foreach ($academicCalender as $value)
                                            <option value="{{ $value->id }}"
                                                {{ request()->get('academic_year_id') == $value->id ? 'selected' : '' }}>
                                                {{ $value->period() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 pt-4">
                            <button type="submit" class="btn btn-primary">Show</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" colspan="4">Balance Sheet</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center" colspan="2">Assets</th>
                                                    <th class="text-center" colspan="2">Liabilites</th>
                                                </tr>
                                                <tr>
                                                    <th class="">Detail</th>
                                                    <th class="">Amount</th>
                                                    <th class="">Detail</th>
                                                    <th class="">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <td class="text-left">Fee Received</td>
                                                <td class="text-left">
                                                    £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->feeReceived(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}
                                                </td>
                                                <td class="text-left">Salaries Paid</td>
                                                <td class="text-left">
                                                    £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->totalSalaryPaid(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}
                                                </td>
                                                </td>
                                                <tr>
                                                    <td class="text-left">Fee Due</td>
                                                    <td class="text-left">
                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->feeDue(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                    </td>
                                                    <td class="text-left">Salaries Payable</td>
                                                    <td class="text-left">
                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->totalSalary(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">Previous Year Fee Due</td>
                                                    <td class="text-left">
                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->transferDue(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}
                                                    </td>
                                                    <td class="text-left">Refunded Invoice</td>
                                                    <td class="text-left">

                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->invoiceRefund(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">Deposit Received</td>
                                                    <td class="text-left">
                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')
                                                            ? auth()->user()->priceFormat(
                                                                    auth()->user()->depositReceived(request()->get('branch_id'), request()->get('academic_year_id')),
                                                                )
                                                            : 0 }}
                                                    </td>
                                                    <td class="text-left">Suppliers</td>
                                                    <td class="text-left">
                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->supplierPurchase(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">Deposit Due</td>
                                                    <td class="text-left">
                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->depositDue(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                    </td>
                                                    <td class="text-left">Misc Expense(Bill,Rent,Others)</td>
                                                    <td class="text-left">

                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->totalExpense(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">Yearly Resource Received</td>
                                                    <td class="text-left">

                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->resourceFeeReceived(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}
                                                    </td>
                                                    <td class="text-left">Deposit Refunded Amount</td>
                                                    <td class="text-left">
                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->totalRefunded(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">Yearly Resource Due</td>
                                                    <td class="text-left">

                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->resourceFeeDue(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}
                                                    </td>
                                                    <td class="text-left">Deposit Refundables</td>
                                                    <td class="text-left">
                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->totalRefundable(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">Publisher Book Received</td>
                                                    <td class="text-left">

                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->resourceReceived(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}
                                                    </td>
                                                    <td class="text-left">Loan Due</td>
                                                    <td class="text-left">
                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->remainingLoan(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">Publisher Book Due</td>
                                                    <td class="text-left">

                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->resourceDue(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}
                                                    </td>
                                                    <td class="text-left">Payable HMRC</td>
                                                    <td class="text-left">
                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->payableHMRC(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">Available Stock</td>
                                                    <td class="text-left">
                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->availableStock(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                    </td>

                                                    <td class="text-left">Paid HMRC</td>
                                                    <td class="text-left">
                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->paidHMRC(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">Loan Received</td>
                                                    <td class="text-left">
                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->totalSalaryLoan(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                    </td>
                                                    {{-- <td class="text-left"> Default Amount</td> --}}
                                                    <td class="text-left"></td>
                                                    <td class="text-left"> </td>

                                                </tr>
                                                <tr>
                                                    <td class="text-left">Wallet</td>
                                                    <td class="text-left">
                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->studentWallet(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                    </td>

                                                    <td colspan="2" class="text-left"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">DBS Recieved</td>
                                                    <td class="text-left">
                                                        £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->dbsReceived(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                    </td>

                                                    <td colspan="2" class="text-left"></td>
                                                </tr>

                                                <tr>
                                                    <th class="text-center">
                                                        <b>Total</b>
                                                    </th>
                                                    <th class="">
                                                        <b>
                                                            £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->totalAsset(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                        </b>
                                                    </th>
                                                    <th class="text-center">
                                                        <b>Total</b>
                                                    </th>
                                                    <th class="text-center">
                                                        <b>

                                                        </b>
                                                    </th>

                                                </tr>
                                                <tr>
                                                    <th class="text-center">
                                                        <b></b>
                                                    </th>
                                                    <th class="text-center">
                                                        <b></b>
                                                    </th>
                                                    <th class="text-center">
                                                        <b>Current Balance</b>
                                                    </th>
                                                    <th class="text-center">
                                                        <b></b>
                                                    </th>

                                                </tr>
                                                <tr>
                                                    <th class="text-center">
                                                        <b></b>
                                                    </th>
                                                    <th class="text-center">
                                                        <b></b>
                                                    </th>
                                                    <th class="text-center">
                                                        <b>Profit/Loss</b>
                                                    </th>
                                                    <th class="text-center">
                                                        <b></b>
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>




                                        <div class="pt-5 ">
                                            <table id="example5" class="display" style="min-width: 500px">
                                                <thead>
                                                    <tr class="border">
                                                        <th></th>
                                                        <th>Deposit</th>
                                                        <th>Admin</th>
                                                        <th>Fee</th>
                                                        <th>Resources</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="border">
                                                        <td>Cash</td>
                                                        <td>
                                                            £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->depositRefundableByCash(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}
                                                        </td>
                                                        <td>
                                                            £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->depositRegistrationByCash(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                        </td>
                                                        <td>
                                                            £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->feeReceivedByCash(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                        </td>
                                                        <td>
                                                            £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->resourceFeeReceivedByCash(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                        </td>
                                                        <td>
                                                            £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->totalCashReceived(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                        </td>
                                                    </tr>
                                                    <tr class="border">
                                                        <td>Bank</td>
                                                        <td>
                                                            £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->depositRefundableByBank(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                        </td>
                                                        <td>

                                                            £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->depositRegistrationByBank(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}
                                                        </td>
                                                        <td>
                                                            £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->feeReceivedByBank(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                        </td>
                                                        <td>
                                                            £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->resourceFeeReceivedByBank(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                        </td>
                                                        <td>
                                                            £{{ !is_null(request()->get('branch_id')) && request()->get('academic_year_id')? auth()->user()->priceFormat(auth()->user()->totalBankReceived(request()->get('branch_id'), request()->get('academic_year_id'))): 0 }}

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{-- </form> --}}


        </div>
    </div>
@endsection
