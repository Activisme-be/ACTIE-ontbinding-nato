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
                        <h2 style="margin-bottom: -5px;">Steunbetuigingen</h2>
                    </div>

                    @if ((int) count($signatures) === 0)
                        <div class="alert alert-info alert-important" role="alert">
                            <strong><span class="fa fa-info-circle" aria-hidden="true"></span> Info:</strong>
                            Er zijn nog geen steunbetuigingen voor dit verdrag.
                        </div>
                    @else
                        <p class="lead">Er zijn {{ count($signatures) }} steunbetuigingen voor dit verdrag.</p>

                        <div class="table-responsive">
                            <table class="table table-condensed table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Naam:</th>
                                        <th>Land:</th>
                                        <th>Plaats:</th>
                                        <th>Datum:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($signatures as $signature)
                                        <tr>
                                            <td><strong>#{{ $signature->id }}</strong></td>

                                            @if ((string) $signature->publish === 'Y')
                                                <td colspan="3"><span class="text-muted"><i>(De gebruiker heeft gekozen om anoniem te tekenen.)</i></span></td>
                                            @else
                                                <td>{{ $signature->name }}</td>
                                                <td>
                                                    <img style="height: 12px;" src="{{ site_url('assets/img/flags/' . $signature->county->country_flag) }}" alt="{{ $signature->county->country_name }}">
                                                    {{ $signature->county->country_name }}
                                                </td>

                                                <td>
                                                    {{ $signature->cities->postal_code }} {{ $signature->cities->city_name }} |
                                                    {{ $signature->cities->region->province_name_nl }}
                                                </td>
                                            @endif

                                            <td>{{ $signature->created_at->format('d-m-Y H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection