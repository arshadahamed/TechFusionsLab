@extends('admin.admin_master')
@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
                </div>
            </div>

            <!-- start row -->
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="row g-3">

                        <!-- Total Reviews -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="fs-14 mb-1">Total Reviews</div>
                                    </div>

                                    <div class="d-flex align-items-baseline mb-2">
                                        <div class="fs-22 mb-0 me-2 fw-semibold text-black">
                                            {{ \App\Models\Review::count() }}
                                        </div>
                                        <div class="me-auto">
                                            <span class="text-success d-inline-flex align-items-center">
                                                @php
                                                    $current = \App\Models\Review::whereMonth(
                                                        'created_at',
                                                        now()->month,
                                                    )->count();
                                                    $previous = \App\Models\Review::whereMonth(
                                                        'created_at',
                                                        now()->subMonth()->month,
                                                    )->count();
                                                    $percent =
                                                        $previous > 0
                                                            ? round((($current - $previous) / $previous) * 100)
                                                            : 0;
                                                @endphp
                                                {{ $percent }}%
                                                <i data-feather="{{ $percent >= 0 ? 'trending-up' : 'trending-down' }}"
                                                    class="ms-1" style="height: 22px; width: 22px;"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div id="review-stats-chart" class="apex-charts" style="height: 45px;"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Emails -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="fs-14 mb-1">Total Emails</div>
                                    </div>

                                    <div class="d-flex align-items-baseline mb-2">
                                        <div class="fs-22 mb-0 me-2 fw-semibold text-black">
                                            {{ \App\Models\Contact::count() }}
                                        </div>
                                        <div class="me-auto">
                                            <span class="text-success d-inline-flex align-items-center">
                                                @php
                                                    $current = \App\Models\Contact::whereMonth(
                                                        'created_at',
                                                        now()->month,
                                                    )->count();
                                                    $previous = \App\Models\Contact::whereMonth(
                                                        'created_at',
                                                        now()->subMonth()->month,
                                                    )->count();
                                                    $percent =
                                                        $previous > 0
                                                            ? round((($current - $previous) / $previous) * 100)
                                                            : 0;
                                                @endphp
                                                {{ $percent }}%
                                                <i data-feather="{{ $percent >= 0 ? 'trending-up' : 'trending-down' }}"
                                                    class="ms-1" style="height: 22px; width: 22px;"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div id="email-stats-chart" class="apex-charts" style="height: 45px;"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Team Members -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="fs-14 mb-1">Team Members</div>
                                    </div>

                                    <div class="d-flex align-items-baseline mb-2">
                                        <div class="fs-22 mb-0 me-2 fw-semibold text-black">{{ \App\Models\Team::count() }}
                                        </div>
                                        <div class="me-auto">
                                            <span class="text-success d-inline-flex align-items-center">
                                                @php
                                                    $current = \App\Models\Team::whereMonth(
                                                        'created_at',
                                                        now()->month,
                                                    )->count();
                                                    $previous = \App\Models\Team::whereMonth(
                                                        'created_at',
                                                        now()->subMonth()->month,
                                                    )->count();
                                                    $percent =
                                                        $previous > 0
                                                            ? round((($current - $previous) / $previous) * 100)
                                                            : 0;
                                                @endphp
                                                {{ $percent }}%
                                                <i data-feather="{{ $percent >= 0 ? 'trending-up' : 'trending-down' }}"
                                                    class="ms-1" style="height: 22px; width: 22px;"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div id="teammembers" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Email List</h5>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Message</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        use Illuminate\Support\Str;
                                                        $emails = \App\Models\Contact::latest()->take(5)->get();
                                                    @endphp
                                                    @forelse ($emails as $key => $item)
                                                        <tr>
                                                            <td>{{ $emails->firstItem() + $key }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->email }}</td>
                                                            <td>{{ Str::limit($item->message, 50, '...') }}</td>
                                                            <td>
                                                                <a href="{{ route('delete.email', $item->id) }}"
                                                                    class="btn btn-danger btn-sm" id="delete">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5" class="text-center">No emails found.</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div> <!-- container-fluid -->
        </div>

        <!-- ApexCharts Initialization -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {

                const months = Array.from({
                    length: 12
                }, (_, i) => i + 1);

                // --- Reviews Chart ---
                const reviewData = @json(\App\Models\Review::selectRaw('MONTH(created_at) as month, COUNT(*) as count')->groupBy('month')->orderBy('month')->pluck('count', 'month'));
                const reviewChartData = months.map(m => reviewData[m] || 0);

                const reviewEl = document.querySelector("#review-stats-chart");
                if (reviewEl) {
                    new ApexCharts(reviewEl, {
                        chart: {
                            type: 'bar',
                            height: 45,
                            sparkline: {
                                enabled: true
                            }
                        },
                        series: [{
                            name: 'Reviews',
                            data: reviewChartData
                        }],
                        colors: ['#3b82f6'],
                        plotOptions: {
                            bar: {
                                columnWidth: '50%'
                            }
                        },
                        tooltip: {
                            enabled: true
                        },
                        xaxis: {
                            labels: {
                                show: false
                            },
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: false
                            }
                        },
                        yaxis: {
                            show: false
                        }
                    }).render();
                }

                // --- Emails Chart ---
                const emailData = @json(\App\Models\Contact::selectRaw('MONTH(created_at) as month, COUNT(*) as count')->groupBy('month')->orderBy('month')->pluck('count', 'month'));
                const emailChartData = months.map(m => emailData[m] || 0);

                const emailEl = document.querySelector("#email-stats-chart");
                if (emailEl) {
                    new ApexCharts(emailEl, {
                        chart: {
                            type: 'bar',
                            height: 45,
                            sparkline: {
                                enabled: true
                            }
                        },
                        series: [{
                            name: 'Emails',
                            data: emailChartData
                        }],
                        colors: ['#10b981'],
                        plotOptions: {
                            bar: {
                                columnWidth: '50%'
                            }
                        },
                        tooltip: {
                            enabled: true
                        },
                        xaxis: {
                            labels: {
                                show: false
                            },
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: false
                            }
                        },
                        yaxis: {
                            show: false
                        }
                    }).render();
                }

                // --- Team Members Chart ---
                const teamData = @json(\App\Models\Team::selectRaw('MONTH(created_at) as month, COUNT(*) as count')->groupBy('month')->orderBy('month')->pluck('count', 'month'));
                const teamChartData = months.map(m => teamData[m] || 0);

                const teamEl = document.querySelector("#teammembers");
                if (teamEl) {
                    new ApexCharts(teamEl, {
                        chart: {
                            type: 'bar',
                            height: 45,
                            sparkline: {
                                enabled: true
                            }
                        },
                        series: [{
                            name: 'Team Members',
                            data: teamChartData
                        }],
                        colors: ['#f59e0b'],
                        plotOptions: {
                            bar: {
                                columnWidth: '50%'
                            }
                        },
                        tooltip: {
                            enabled: true
                        },
                        xaxis: {
                            labels: {
                                show: false
                            },
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: false
                            }
                        },
                        yaxis: {
                            show: false
                        }
                    }).render();
                }


            });
        </script>
    @endsection
