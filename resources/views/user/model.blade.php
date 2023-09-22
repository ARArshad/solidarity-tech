<div class="col-md-4 col-sm-12 mb-30">
        <div class="modal fade bs-example-modal-lg" id="user-modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="user-modal-title">Add User</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form id="user_form" method="post" action="{{route('user-save')}}">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id" readonly>
                        <div class="modal-body m-3 m-md-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                        <small class="text-danger clear-error" id="name_error"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Surname</label>
                                        <input type="text" name="surname" id="surname" class="form-control">
                                        <small class="text-danger clear-error" id="surname_error"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="main-password-div">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SA Id Number</label>
                                        <input type="number" name="id_number" id="id_number" class="form-control"
                                               autocomplete="off">
                                        <small class="text-danger clear-error" id="id_number_error"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" id="email"
                                               class="form-control">
                                        <small class="text-danger clear-error" id="email_error"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>DOB</label>
                                        <input type="text" name="dob" id="dob" class="form-control date-picker">
                                        <small class="text-danger clear-error" id="dob_error"></small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone No</label>
                                        <input type="number" name="phone_no" id="phone_no" class="form-control"
                                               autocomplete="off">
                                        <small class="text-danger clear-error" id="phone_no_error"></small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Language</label>
                                        <select class="form-control" id="language" name="language">
                                            <option value="English">English</option>
                                            <option value="Urdu">Urdu</option>
                                            <option value="Punjabi">Punjabi</option>
                                        </select>
                                        <small class="text-danger clear-error" id="language_error"></small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Interests</label>
                                        <select class="custom-select2 form-control" id="interests"
                                                name="interests[]" style="width: 100%;" multiple="multiple">
                                            @foreach($interests as $interest)
                                            <optgroup>
                                                <option value="{{$interest->id}}">{{$interest->interest}}</option>
                                            </optgroup>
                                            @endforeach
                                        </select>
                                        <small class="text-danger clear-error" id="interests_error"></small>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="createOrUpdate()">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
