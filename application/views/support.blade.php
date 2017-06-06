@layout('layouts/app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <img class="img-rounded img-front" src="{{ site_url('assets/img/front.jpg') }}">
        </div>
    </div>

    <div style="padding-top: 15px;" class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div style="margin-top: -20px;" class="page-header">
                        <h2 style="margin-bottom: -5px;">{{ lang('support_heading') }}</h2>
                    </div>

                    @if ($count === 0)
                        <div class="alert alert-info alert-important" role="alert">
                            <strong><span class="fa fa-info-circle" aria-hidden="true"></span> {{ lang('support_alert_status') }}:</strong>
                            {{ lang('support_no_signatures') }}
                        </div>
                    @else
                        <p class="lead">{{ sprintf(lang('support_with_signatures'), $count) }}</p>

                        <div class="table-responsive">
                            <table class="table table-condensed table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ lang('support_table_name') }}:</th>
                                        <th>{{ lang('support_table_country') }}:</th>
                                        <th>{{ lang('support_table_place') }}:</th>
                                        <th>{{ lang('support_table_date') }}:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($results as $signature)
                                        <tr>
                                            <td><strong>#{{ $signature->id }}</strong></td>

                                            @if ((string) $signature->publish !== 'Y')
                                                <td colspan="3"><span class="text-muted"><i>({{ lang('support_table_anonymous') }})</i></span></td>
                                            @else
                                                <td>{{ ucfirst($signature->name) }}</td>
                                                <td>
                                                    <img style="height: 12px;" src="{{ site_url('assets/img/flags/' . $signature->county->country_flag) }}" alt="{{ $signature->county->country_name }}">
                                                    {{ $signature->county->country_name }}
                                                </td>

                                                <td>
                                                    {{ $signature->postal_code }} {{ ucfirst($signature->city_name) }}
                                                    {{-- $signature->cities->region->province_name_nl --}}
                                                </td>
                                            @endif

                                            <td>{{ $signature->created_at->format('d-m-Y H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $results_link }} {{-- Pagination pager --}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
