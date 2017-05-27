@layout('layouts/app')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Inloggen:</div>
            <div class="panel-body">
                <form action="" class="form-horizontal" method="POST">
                    <div class="form-group">
                        <label for="email" class="control-label col-md-3">
                            E-mail: <span class="text-danger">*</span>
                        </label>

                        <div class="col-md-9">
                            <input placeholder="E-mail adres" type="text" name="email" class="form-control" id="email" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="control-label col-md-3">
                            Wachtwoord: <span class="text-danger">*</span>
                        </label>

                        <div class="col-md-9">
                            <input placeholder="Wachtwoord" type="password" name="password" class="form-control" id="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn btn-success">
                                <span class="fa fa-sign-in" aria-hidden="true"></span> Inloggen
                            </button>
                            
                            <a href="" class="btn btn-danger">
                                <span class="fa fa-key" aria-hidden="true"></span> Wachtwoord vergeten.
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection