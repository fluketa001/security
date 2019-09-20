
@auth
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="margin-top:20%;font-size:20px;">
                <div class="card-header">{{ __('เลือกโครงการ') }}</div>

                <div class="card-body">
                    @foreach($enterprises as $key => $value)
                        <div class="form-group row">
                            <div class="col-md-12">
                                <a href="{{ url('/home',$value->id) }}"><input id="btn" type="button" class="form-control btn-primary" name="email" value="{{ $value->name }}" {{--autofocus--}} style="font-size:20px;"></a>
                            </div>
                        </div>
                    @endforeach
                        <div class="form-group row">
                            <div class="col-md-12">
                                <a href="{{ url('/home/2') }}"><input id="btn" type="button" class="form-control btn-primary" name="email" value="Serenity Condominium" {{--autofocus--}} style="font-size:20px;"></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <a href="{{ url("/home/theflex") }}"><input id="btn" type="button" class="form-control btn-primary" name="email" value="TheFlex Town Home" style="font-size:20px;"></a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endauth
