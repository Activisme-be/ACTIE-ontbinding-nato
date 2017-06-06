@layout('layouts/app')

@section('content')
    <div class="col-md-offset-2 col-md-8">
		@if ($this->session->flashdata('class') && $this->session->flashdata('message'))
			<div class="{{ $this->session->flashdata('class') }}" role="alert">
				{{ $this->session->flashdata('message') }}
			</div>
		@endif

        <div class="panel panel-default">
			<div class="panel-heading"><span class="fa fa-sign-in" aria-hidden="true"></span> {{ lang('auth_panel_heading') }}:</div>
            <div class="panel-body">
                <form action="{{ site_url('authencation/verify') }}" class="form-horizontal" method="POST">
                    <div class="form-group">
                        <label for="email" class="control-label col-md-3">
                            {{ lang('auth_label_email') }}: <span class="text-danger">*</span>
                        </label>

                        <div class="col-md-9">
                            <input placeholder="{{ lang('auth_placeholder_email') }}" type="text" name="email" class="form-control" id="email" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="control-label col-md-3">
                            {{ lang('auth_label_password') }}: <span class="text-danger">*</span>
                        </label>

                        <div class="col-md-9">
                            <input placeholder="{{ lang('auth_placeholder_password') }}" type="password" name="password" class="form-control" id="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn btn-success">
                                <span class="fa fa-sign-in" aria-hidden="true"></span> {{ lang('auth_button_submit') }}
                            </button>
                            
                            <a href="" class="btn btn-danger">
                                <span class="fa fa-key" aria-hidden="true"></span> {{ lang('auth_button_lost') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
