@extends('layouts.app')
@section('title', 'Leave')

@section('content')

    {{-- <div class="container-xxl h-100"> --}}
        <div class="col-md">
            <div class="card">
                @if (session('status'))
                    <div class="alert alert-{{ session('alert-type', 'info') }} alert-dismissible fade show" role="alert">
                        <strong>{{ session('status') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h5 class="card-header">Leave</h5>
                <div class="card-body">
                    <form class="browser-default-validation" action="{{ route('leave.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">

                            <div class="form-floating form-floating-outline mb-4 ">
                                <input class="form-control" type="date" value="{{ old('leave_from') }}"
                                    name="leave_from" id="html5-date-input" />
                                <label for="html5-date-input">Leave From</label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4 ">
                                <input class="form-control" type="date" value="{{ old('leave_to') }}"
                                    name="leave_to" id="html5-date-input" />
                                <label for="html5-date-input">Leave To</label>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">

                            <div class="form-floating form-floating-outline mb-6">
                                <textarea class="materialize-textarea form-control h-px-75 resize-none" id="basic-default-bio" name="reason"
                                    placeholder="Reason" rows="3" >{{ old('reason') }}</textarea>
                                <label for="basic-default-bio">Reason</label>
                                <small class="text-red">
                                    @error('reason')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
