@section('title', 'Dashboard')
@extends('layouts.admin')

@section('content')
<style>
    .success_div,
    .error_div{
        display: none;
    }
</style>

<div class="content-wrapper">
    <div class="content-header row">
        
    </div>
    <div class="content-body">
        
        <section id="dashboard-analytics">
            <form id="exchange_rate_api_form" method="POST">
                {{csrf_field()}}

                <div class="row match-height mb-2">

                    <div class="col-6">

                        <div class="row match-height mb-2">

                            <div class="col-lg-6 col-sm-6 col-12">
                                <label><b>From:</b></label>
                                <select name="from" required class="form-control">
                                    <option value="">Choose option</option>
                                    <option value="Eur">Euro</option>
                                </select>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-12">
                                <label><b>To:</b></label>
                                <select name="to" required class="form-control">
                                    <option value="">Choose option</option>
                                    <option value="USD">USD</option>
                                    <option value="RON">RON</option>
                                </select>
                            </div>
                        </div>
                        <div class="row match-height mb-2">

                            <div class="col-lg-6 col-sm-6 col-12">
                                <label><b>Amount:</b></label>
                                <input type="number" name="amount"  class="form-control">
                            </div>

                            <div class="col-lg-6 col-sm-6 col-12">
                                <label><b>Date:</b></label>
                                <input type="date" name="exchangeDate" class="form-control">
                            </div>
                            
                        </div>
                        <button class="btn btn-primary" id="searchBtn" type="submit">Search</button>
                        
                    </div>
                    <div class="col-6 pt-2">
                        <div class="alert alert-success success_div"><strong>Success: </strong><span class="success_message"></span></div>
                        <div class="alert alert-danger error_div"><strong>Sorry: </strong><span class="error_message"></span></div>
                        <div class="exchange_rate_res"></div>
                    </div>
                </div>


            </form>

        </section>

    </div>

</div>
@endsection
