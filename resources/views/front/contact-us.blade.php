@extends('front/master')

@section('title')
Contact Us
@endsection
@section('body_section')
<main>
    <section class="contact-inner">
        <div class="container">
             <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-11 col-xl-11 col-xxl-11">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                            <div class="contact-detail">
                                <div class="detail-box">
                                    <h2>Address</h2>
                                    <p class="para">123 Main Street, Anytown, CA 12345 – USA</p>
                                </div>
                                 <div class="detail-box">
                                    <h2>Phone</h2>
                                    <ul>
                                        <li><span>Mobile:</span> (08) 123 456 789 </li>
                                        <li> – </li>
                                        <li><span>Hotline:</span> 1009 678 456</li>
                                    </ul>
                                </div>
                                 <div class="detail-box no-border">
                                    <h2>Email Address</h2>
                                    <p class="para">yourmail@domain.com – support@roadthemes.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7">
                            <div class="contact-field">
                                <form action="{{route('add-contact-us')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                             <input type="text" name="first_name" class="form-control form-input" placeholder="First Name*" required>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                             <input type="text" name="last_name" class="form-control form-input" placeholder="Last Name*">
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                             <input type="email" name="email" class="form-control form-input" placeholder="Email Address" required>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                             <input type="number"  name="phone"  class="form-control form-input" placeholder="Phone" required>
                                        </div>
                                        
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                             <textarea name="message" class="form-control form-input" id="exampleFormControlTextarea1" rows="5" placeholder="Message..." required></textarea>
                                        </div>
                                        <div class="submit-btn">
                                            <button>Submit Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.2798911863!2d-74.25986818535777!3d40.69767006766623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1662676025340!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

</main>

@endsection

@section('script_section')
<script src="{{asset('assets/js/waitMe.js')}}"></script>
<script>
 </script>
@endsection