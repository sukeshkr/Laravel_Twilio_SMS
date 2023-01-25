<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Send SMS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('sms.send')}}" method="POST" enctype="multipart/form-data" class="forms-sample">
                                    @csrf
                                    @if (session('message'))

                                    <div class="alert alert-success">{{session('message')}}</div>

                                    @endif
                                    @error('phone')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    @error('message')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="exampleInputName1">Phone Number</label>
                                            <input type="text" name="phone" class="form-control" id="exampleInputName1" placeholder="Enter Your Phone Number">
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="exampleInputName1">Message</label>
                                            <textarea name="message" rows="2" class="form-control" placeholder="Message"></textarea>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <button type="submit" class="btn btn-primary float-end me-2">Send</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
