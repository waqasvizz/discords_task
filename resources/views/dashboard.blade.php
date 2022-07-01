@section('title', 'Dashboard')
@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="content-header row">
        
    </div>
    <div class="content-body">
        <!-- Dashboard Analytics Start -->
        <section id="dashboard-analytics">
            <div class="row match-height">
                <!-- Subscribers Chart Card starts -->

                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-start pb-0">
                            <div class="avatar bg-light-primary p-50 m-0">
                                {{-- <a href="{{url('/user')}}" style="color: #7367f0 !important;"> --}}
                                    <div class="avatar-content">
                                        <i data-feather="users" class="font-medium-5"></i>
                                    </div>
                                {{-- </a> --}}
                            </div>
                            <h2 class="font-weight-bolder mt-1">{{ isset($data['active_and_verified_users']) ? $data['active_and_verified_users']: 0 }}</h2>
                            <p class="card-text mb-1">Count of all active and verified users</p>
                        </div>
                        <div id="gained-chart"></div>
                    </div>
                </div>
                <!-- Subscribers Chart Card ends -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-start pb-0">
                            <div class="avatar bg-light-warning p-50 m-0">
                                {{-- <a href="{{url('/products')}}" style="color: #ff9f43 !important;"> --}}
                                    <div class="avatar-content">
                                        <i data-feather="briefcase" class="font-medium-5"></i>
                                    </div>
                                {{-- </a> --}}
                            </div>
                            <h2 class="font-weight-bolder mt-1">{{ isset($data['all_active_products']) ? $data['all_active_products']: 0 }}</h2>
                            <p class="card-text mb-1">Count of active and verified users who have attached active products</p>
                        </div>
                        <div id="order-chart"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-start pb-0">
                            <div class="avatar bg-light-warning p-50 m-0">
                                {{-- <a href="{{url('/task')}}" style="color: #8d007b !important;"> --}}
                                    <div class="avatar-content">
                                        <i data-feather="list" class="font-medium-5"></i>
                                    </div>
                                {{-- </a> --}}
                            </div>
                            <h2 class="font-weight-bolder mt-1">{{ isset($data['all_active_user_products']) ? $data['all_active_user_products']: 0 }}</h2>
                            <p class="card-text mb-1">Count of all active products (just from products table)</p>
                        </div>
                        <div id="order-chart"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-start pb-0">
                            <div class="avatar bg-light-warning p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="list" class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="font-weight-bolder mt-1">{{ isset($data['active_products_not_belong_user']) ? $data['active_products_not_belong_user']: 0 }}</h2>
                            <p class="card-text mb-1">Count of active products which don't belong to any user</p>
                        </div>
                        <div id="order-chart"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-start pb-0">
                            <div class="avatar bg-light-warning p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="list" class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="font-weight-bolder mt-1">{{ isset($data['amount_attached_products']->quantity_sum) ? $data['amount_attached_products']->quantity_sum: 0 }}</h2>
                            <p class="card-text mb-1">Amount of all active attached products</p>
                        </div>
                        <div id="order-chart"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-start pb-0">
                            <div class="avatar bg-light-warning p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="list" class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="font-weight-bolder mt-1">{{ isset($data['Summarized_price_active_products']) ? $data['Summarized_price_active_products']: 0 }}</h2>
                            <p class="card-text mb-1">Summarized price of all active attached products</p>
                        </div>
                        <div id="order-chart"></div>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-start pb-0">
                            <div class="avatar bg-light-warning p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="list" class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="font-weight-bolder mt-1">{{ isset($data['Summarized_price_user_active_products']) ? $data['Summarized_price_user_active_products']: 0 }}</h2>
                            <p class="card-text mb-1">Summarized price of all active attached products</p>
                        </div>
                        <div id="order-chart"></div>
                    </div>
                </div> --}}
    
            </div>

        </section>
        <!-- Dashboard Analytics end -->

    </div>

    <div class="row match-height">
        <!-- Subscribers Chart Card starts -->

        <div class="col-lg-6 col-sm-6 col-12">
            <h4 class="text-center"><b>Summarized price of all active attached products</b></h5>
            
            <table class="table" style="background: white">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data['Summarized_price_user_active_products'] as $key => $value) 
                        <tr>
                            <td>{{$value->user->name}}</td>
                            <td>${{$value->total_user_product_price}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
