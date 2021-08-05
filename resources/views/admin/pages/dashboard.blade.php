@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection

@section('css')

@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="row">
        <!-- Monthly -->
        <div class="col-md-3">
            <div class="card rounded shadow">
                <div class="card-body text-light bg-success">
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center">
                            <i class="fas fa-dollar-sign fa-3x"></i>
                        </div>
                        <div class="col-md-8">
                            <small>EARNINGS (MONTHLY)</small>
                            <h5>RM {{ number_format($sales_monthly) }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Annualy -->
        <div class="col-md-3">
            <div class="card rounded shadow">
                <div class="card-body text-light bg-info">
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center">
                            <i class="fas fa-dollar-sign fa-3x"></i>
                        </div>
                        <div class="col-md-8">
                            <small>EARNINGS (ANNUALY)</small>
                            <h5>RM {{ number_format($sales_yearly) }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Transaction -->
        <div class="col-md-3">
            <div class="card rounded shadow">
                <div class="card-body text-light bg-dark">
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center">
                            <i class="fas fa-angle-double-up fa-3x"></i>
                        </div>
                        <div class="col-md-8">
                            <small>TOTAL TRANSACTIONS</small>
                            <h5>{{ number_format($total_transactions) }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active User -->
        <div class="col-md-3">
            <div class="card rounded shadow">
                <div class="card-body text-light bg-primary">
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center">
                            <i class="fas fa-users fa-3x"></i>
                        </div>
                        <div class="col-md-8">
                            <small>ACTIVE USERS</small>
                            <h5>{{ number_format($count_active_user) }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    Earnings Overview
                </div>
                <div class="card-body">
                    <canvas class="w-100" id="myChart" width="900" height="380"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-8">
          <!-- Completed Payment -->
            <div class="card">
                <div class="card-header bg-dark text-light">
                    Completed Payment Report
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="float-right">Total : {{ $count_payment_history }}</p>
                        </div>
                        <div class="col-md-12">
                            <table class="table">
                                <tbody>
                                    @foreach ($payment_history as $payment)
                                        @foreach ($users as $user)
                                            @if ($user->user_id == $payment->user_id)
                                                <tr>
                                                    <td>{{ $count++ }}</td>
                                                    <td><a href="{{ url('admin/user/edit') }}/{{ $user->user_id }}"
                                                            class="text-dark" target="_blank">{{ $user->firstname }}
                                                            {{ $user->lastname }}</a></td>
                                                    <td>{{ $payment->created_at }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="float-right">
                                {{ $payment_history->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Failed Payment -->
            <div class="card mt-4">
                <div class="card-header bg-dark text-light">
                    Failed Payment Report
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="float-right">Total : {{ $count_failed_payment_history }}</p>
                        </div>
                        <div class="col-md-12">
                            <table class="table">
                                <tbody>
                                    @foreach ($failed_payment_history as $payment)
                                        @foreach ($users as $user)
                                            @if ($user->user_id == $payment->user_id)
                                                <tr>
                                                    <td>{{ $count++ }}</td>
                                                    <td><a href="{{ url('admin/user/edit') }}/{{ $user->user_id }}"
                                                            class="text-dark" target="_blank">{{ $user->firstname }}
                                                            {{ $user->lastname }}</a></td>
                                                    <td>{{ $payment->created_at }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="float-right">
                                {{ $payment_history->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    KPI Report (Yearly)
                </div>
                <div class="card-body">
                    <p><b>Current Subscriber : </b> {{ number_format($count_active_user) }}</p>
                    <p><b>Total Collection : </b> RM {{ number_format($sales_yearly) }} </p>
                    <p><b>Total Transactions : </b> {{ number_format($total_transactions) }}</p>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header bg-dark text-light">
                    Pending Payment
                </div>
                <div class="card-body">
                    @if ($payment_history_pending->isEmpty())
                        <p>No Pending Payment</p>
                    @else
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <tbody>
                                        @foreach ($payment_history_pending as $value)
                                            @foreach ($users as $user)
                                                @if ($user->user_id == $value->user_id)
                                                    <tr>
                                                        <td><a href="{{ url('admin/user/edit') }}/{{ $user->user_id }}"
                                                                class="text-dark" target="_blank">{{ $user->firstname }}
                                                                {{ $user->lastname }}</a></td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        /* globals Chart:false, feather:false */

        (function() {
            'use strict'

            feather.replace()

            // Graphs
            var ctx = document.getElementById('myChart')
            // eslint-disable-next-line no-unused-vars
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
                        'January',
                        'February',
                        'Mac',
                        'April',
                        'May',
                        'June',
                        'July',
                        'August',
                        'September',
                        'October',
                        'November',
                        'December'
                    ],
                    datasets: [{
                        data: [
                            {{ $january }},
                            {{ $february }},
                            {{ $mac }},
                            {{ $april }},
                            {{ $may }},
                            {{ $june }},
                            {{ $july }},
                            {{ $august }},
                            {{ $september }},
                            {{ $october }},
                            {{ $november }},
                            {{ $december }}
                        ],
                        lineTension: 0,
                        backgroundColor: 'transparent',
                        borderColor: '#007bff',
                        borderWidth: 4,
                        pointBackgroundColor: '#007bff'
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: false
                            }
                        }]
                    },
                    legend: {
                        display: false
                    }
                }
            })
        }())
    </script>
@endsection
