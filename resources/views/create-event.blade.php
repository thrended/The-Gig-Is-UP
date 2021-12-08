@extends('container.frame')

@section('page')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="text-align: center; font-size: 30px;">{{ __('Create New Event') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ asset('save-event') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Address</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="address" value="{{ old('address') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">City</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="city" value="{{ old('city') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">State</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="state" value="{{ old('state') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Postal Code</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="zipcode" value="{{ old('zipcode') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Music Genre</label>
                            <div class="col-md-6">
                                <select name="type" style="width:100%;">
                                    @foreach($music_types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="width:100%;">
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
