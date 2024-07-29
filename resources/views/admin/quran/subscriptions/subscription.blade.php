@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> All Subscriptions</h4>
                        @if (Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success:</strong> {{ Session::get('success_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="table-reponsive pt-3">
                            <table id="subscription" class="table table-bordered subscription">
                                <thead>
                                    <tr>

                                        <th>الاسم و اللقب</th>
                                        <th>الاشتراك</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quran_students as $student)
                                        <tr>
                                            <td>{{ $student->firstName }} {{ $student->lastName }}</td>

                                            <td>
                                                <table class="table table-striped table-borderless">
                                                    <thead>
                                                        <tr>

                                                            {{-- <th>عدد الحصص المتبقية</th>
                                        <th>عدد الحصص مستعملة</th>
                                        <th>عدد أيام التأخير</th> --}}
                                                            <th>تعديل</th>
                                                            <th>تاريخ الدفع المقبل</th>
                                                            <th>تاريخ الدفع</th>
                                                            <th>قيمة الاشتراك</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($student->quranSubscriptions as $subscription)
                                                            <tr
                                                                @if ($subscription->insurance == 0) style= 'background-color: #ffcccc;' @endif>


                                                                <td>
                                                                    <a
                                                                        href="{{ url('admin/next-date-renwal/' . $subscription['id']) }}"><i
                                                                            style="font-size: 25px;"
                                                                            class="mdi mdi-pencil-box"></i></a>
                                                                </td>
                                                                <td>
                                                                    @php

                                                                        $formattedDate = \Carbon\Carbon::parse($subscription->next_date_renewal)->format('Y-m-d');
                                                                        $today = \Carbon\Carbon::now()->format('Y-m-d');
                                                                        $background = '';
                                                                        if ($formattedDate < $today && $subscription->status == 1) {
                                                                            $background = 'grey';
                                                                        } elseif ($formattedDate < $today && $subscription->status == 0) {
                                                                            $background = 'red';
                                                                        } elseif ($formattedDate === $today && $subscription->status == 0) {
                                                                            $background = 'green';
                                                                        } elseif ($formattedDate === $today && $subscription->status == 1) {
                                                                            $background = 'grey';
                                                                        } elseif ($formattedDate > $today && $subscription->status == 0) {
                                                                            $background = 'red';
                                                                        } else {
                                                                            $background = 'grey';
                                                                        }
                                                                    @endphp
                                                                    <div
                                                                        style="background-color: {{ $background }}; color:#ffffff;">
                                                                        {{ $subscription->next_date_renewal }}

                                                                    </div>
                                                                </td>
                                                                <td> {{ $subscription->date_subscription }} </td>
                                                                <td class="font-weight-bold"> {{ $subscription->price }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
