@extends('layouts.app')


@if(Auth::check())
@section('edit-profile')
<div class="container m-0">

<form class="row justify-content-center" action="/profile" method="post">
    @csrf
    <div class="col-10">
        <div class="form-group col-md-12 p-0">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" name="address" id="inputAddress" value="1234 Main St">
        </div>
        <div class="form-group col-md-12 p-0">
            <label for="inputAddress2">Image Url</label>
            <input type="text" class="form-control" name="image" id="inputLink" placeholder="http://...">
        </div>
        <div class="form-row p-0">
            <div class="form-group col-md-12">
                <label for="inputCity">City</label>
                <input type="text" name="location" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-12">
                <label for="inputState">Province</label>
                <select id="inputState" name="location2" class="form-control">
                    <option selected>Choose...</option>
                    <option>Alberta</option>
                    <option>British Columbian</option>
                    <option>Manitoba</option>
                    <option>New Brunswick</option>
                    <option>NewFoundland/Labrador</option>
                    <option>Nova Scotia</option>
                    <option>Ontario</option>
                    <option>P.E.I</option>
                    <option>Quebec</option>
                    <option>Saskatchawan</option>
                    <option>NorthWest Territories</option>
                    <option>Nunavut</option>
                    <option>Yukon</option>
                </select>
            </div>
            <!-- <div class="form-group col-md-3 p-0">
                <label for="inputZip">Zip</label>
                <input type="text" name="location3" class="form-control" id="inputZip">
            </div> -->
            <div class="form-group col-md-3">
                <label for="inputState">Gender</label>
                <select id="inputGender" name="gender" class="form-control">
                    <option selected>Choose...</option>
                    <option>M</option>
                    <option>F</option>
                    <option>Somewhere On the Gender Spectrum</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputAge">Age</label>
                <input type="number" name="age" class="form-control" id="inputAge">
            </div>
            <div class="form-group col-md-3">
                <label for="inputPhone">Phone</label>
                <input type="phone" name="phone" class="form-control" id="inputPhone">
            </div>
        </div>
        <div class="form-group p-0">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-info">Sign in</button>
    </div>
</form>
</div>
@endsection
@endif

@section('edit-login')
<form class="row justify-content-center" action="/profile" method="post">
    @csrf
    <div class="col-10">
        <div class="form-row col-md-12 p-0">
            <div class="form-group col-md-4">
                <label for="inputName4">Change Profile Name</label>
                <input type="name" name="name" class="form-control" id="inputEmail4" placeholder="Ex. 'MrWhiskers'">
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail4">Change Email?</label>
                <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">Change Password?</label>
                <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
            </div>
        </div>
        <div class="form-group p-0">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-info">Sign in</button>
    </div>
</form>
@endsection
