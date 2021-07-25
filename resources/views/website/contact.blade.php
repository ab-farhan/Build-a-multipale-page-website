@extends('layouts.web_master')
@section('title','Contact || Page')
@section('content')
<div class="container-fluid jumbotron mt-5 " style="background-image: url({{asset('/website/images/banner.jpg')}})">
    <div class="row text-center">
        <div class="col-12">
            <h1 class="text-white">-- যোগাযোগ করুন --</h1>
        </div>
    
    </div>
</div>
<div class="container" id="Contact">
    <div class="row">
        <div class="col-md-6 col-lg-6 contact-form ">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d913.2653470722571!2d90.47592312916102!3d23.709501726948382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b708d6ce44fd%3A0xa86ccfc10499dd6e!2sDogair%20Bazar!5e0!3m2!1sen!2sbd!4v1627215974119!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="col-md-6 col-lg-5 contact-form offset-lg-1  mb-3">
            <h3 class="service-card-title">ঠিকানা</h3>
                <hr>
                <p class="footer-text pb-3"><i class="fas fa-map-marker-alt text-danger mr-2"></i> শেখেরটেক ৮ মোহাম্মদপুর, ঢাকা <br> <i class="fas fa-phone text-danger  mr-2"></i> ০১৭৮৫৩৮৮৯১৯ <br><i class="fas fa-envelope text-danger  mr-2"></i> Rabbil@Yahoo.com </p>

                <h5 class="service-card-title pb-3">যোগাযোগ করুন </h5>
                <div class="form-group ">
                    <input id="contactName" type="text" class="form-control w-100" placeholder="আপনার নাম">
                    <span id='name' class="name d-none  text-danger d-block text-left"></span>
                </div>
                <div class="form-group">
                    <input id="contactPhone" type="text" class="form-control  w-100" placeholder="মোবাইল নং ">
                    <span class="phone text-danger d-block text-left"></span>
                </div>
                <div class="form-group">
                    <input id="contactEmail" type="email" class="form-control  w-100" placeholder="ইমেইল ">
                    <span class="email text-danger d-block text-left"></span>
                </div>
                <div class="form-group">
                    <textarea id="contactMsg" type="text" class="form-control  w-100" placeholder="মেসেজ "></textarea>
                    <span class="msg text-danger d-block text-left"></span>
                </div>
                <button id="contactConfirm" type="submit" class="btn btn-block normal-btn w-100">পাঠিয়ে দিন </button>
        </div>
        
    </div>
</div>
@endsection