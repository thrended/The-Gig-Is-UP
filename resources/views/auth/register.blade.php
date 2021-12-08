@extends('container.frame')

@section('page')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ asset('save-account') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Security Question') }}</label>

                            <div class="col-md-6">
                                <select name="security_question">
                                    @foreach($security_questions as $question)
                                    <option value="{{ $question->id }}">{{ $question->question }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Question Answer') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="question_answer" required>                                
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Account Type') }}</label>

                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <button type="button" class="btn account-type" data-id="4">Visitor</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn account-type" data-id="3">Musician</button>
                                </div>
                            </div>
                            <input required type="hidden" name="type" value="">
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Preferred Music') }}</label>

                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <input type="checkbox" name="preferences[]" value="1">EDM
                                </div>
                                <div class="col-md-12">
                                    <input type="checkbox" name="preferences[]" value="2">Rock
                                </div>
                                <div class="col-md-12">
                                    <input type="checkbox" name="preferences[]" value="3">Jazz
                                </div>
                                <div class="col-md-12">
                                    <input type="checkbox" name="preferences[]" value="4">Dubstep
                                </div>
                                <div class="col-md-12">
                                    <input type="checkbox" name="preferences[]" value="5">Rhythm & Blues
                                </div>
                                <div class="col-md-12">
                                    <input type="checkbox" name="preferences[]" value="6">Techno
                                </div>
                                <div class="col-md-12">
                                    <input type="checkbox" name="preferences[]" value="7">Country
                                </div>
                                <div class="col-md-12">
                                    <input type="checkbox" name="preferences[]" value="8">Electro
                                </div>
                                <div class="col-md-12">
                                    <input type="checkbox" name="preferences[]" value="9">Indie Rock
                                </div>
                                <div class="col-md-12">
                                    <input type="checkbox" name="preferences[]" value="10">Pop Music
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>
    var preferences = [];
    $(document).ready(function() {
        $('.account-type').click(function() {
            $('input[name="type"]').val($(this).data('id'));
            $('.account-type').removeClass('btn-success');
            $(this).addClass('btn-success');
        });
    });
</script>
@endsection
