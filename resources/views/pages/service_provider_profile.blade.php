
@extends('layouts.admin')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Service Provider Profile
                    </div>
                    <form action="../../service_provider_profile" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-4 text-right">
                                Company Name:
                            </div>
                            <div class="col">
                                <input type="text" class="form-control form-control-sm" name="name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4 text-right">
                                Company Logo
                            </div>
                            <div class="col">
                                <input type="file" class="form-control form-control-sm" name="company_img" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4 text-right">
                                Address:
                            </div>
                            <div class="col">
                                <input type="text" class="form-control form-control-sm" name="address" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4 text-right">
                                Contact No:
                            </div>
                            <div class="col">
                                <input type="text" class="form-control form-control-sm" name="mobile_number" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4 text-right">
                                Contact Person:
                            </div>
                            <div class="col">
                                <input type="text" class="form-control form-control-sm" name="contact_person" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4 text-right">
                                Business Permit No
                            </div>
                            <div class="col">
                                <input type="text" class="form-control form-control-sm" name="business_permit_no" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4 text-right">
                                File Optional
                            </div>
                            <div class="col">
                                <input type="file" name="permit_img">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 text-right">
                                <button class="btn btn-sm btn-primary" type="submit">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
