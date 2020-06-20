@include ('layouts.template.header')

@include ('layouts.template.menu')

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="full-image">
                <img src="/images/apartment3.jpg" class="img-fluid" alt="" style="max-width: 100%; border-radius: 10px;">
            </div>
            <div class="box"><img src="/images/apartment3.jpg" class="img-fluid" alt="" style="max-width: 100%;"></div>
            <div class="box"><img src="/images/apartment1.jpg" class="img-fluid" alt="" style="max-width: 100%;"></div>
            <div class="box"><img src="/images/apartment3.jpg" class="img-fluid" alt="" style="max-width: 100%;"></div>
            <div class="box"><img src="/images/apartment1.jpg" class="img-fluid" alt="" style="max-width: 100%;"></div>
            <div class="box"><img src="/images/apartment.jpg" class="img-fluid" alt="" style="max-width: 100%;"></div>
            <div class="box"><img src="/images/apartment3.jpg" class="img-fluid" alt="" style="max-width: 100%;"></div> 
            <div class="box"><img src="/images/apartment3.jpg" class="img-fluid" alt="" style="max-width: 100%;"></div>     
        </div>
        <div class="col-lg-4">
            <div class="request">
                <div class="row" >
                    <div class="col-lg-12">
                        <h4 class="booking text-center">Book this apartment</h4>
                    </div>
                    <div class="col-lg-12">
                       <form method="post">
                           <div class="form-group mg-10">
                               <input type="text" class="form-control"  placeholder="First name">
                           </div>
                           <div class="form-group mg-10">
                               <input type="text" class="form-control"  placeholder="Last name">
                           </div>
                           <div class="form-group mg-10">
                               <input type="email" class="form-control" id="email" placeholder="E-mail">
                           </div>
                           <div class="form-group mg-10">
                            <input type="text" class="form-control"  placeholder="Phone number">
                        </div>
                           <div class="form-group mg-10">
                                <textarea class="form-control" id="questions" rows="4" placeholder="Your Message"></textarea>
                           </div>
                            <div class="form-group mg-10 text-center">
                                <button type="submit" class="btn btn-primary request-booking">Request booking</button>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <h3 class="title-of-apartment">Family Apartment</h3>
        </div>
        <div class="col-lg-3">
            <p class="title-of-apartment">Rent/Month: $ 550</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="title-of-apartment">Price details</h4>
            <p class="apartment-properties">Rent/Month: $550 (negoatible)</p>
            <p class="apartment-properties">Service Charge: 8,000 /= Tk per month, subject to change</p>
            <p class="apartment-properties">Security Deposit: 3 month's rent</p>
            <p class="apartment-properties">Flat Release Policy: 3 monts earlier notice required</p>
        </div>
        <div class="col-lg-12">
            <h4 class="title-of-apartment">Property details</h4>
            <p class="apartment-properties">Address and Area: Ozimice I</p>
            <p class="apartment-properties">Facilities: 1 Modern Lift</p>
            <p class="apartment-properties">Additional Facilities: Cloth Hanging facility wiht CC camera</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="apartment-overview">
                <p class="apartment-details align-middle">Car Parking Per Space <span class="float-right">2</span></p>
            </div>
        </div> 
        <div class="col-lg-4">
            <div class="apartment-overview">
                <p class="apartment-details align-middle">Grijanje<span class="float-right">Yes</span></p>
            </div>
        </div> 
    </div>
    <div class="row" style="margin-top: 10px;">
        <div class="col-lg-4">
            <div class="apartment-overview">
                <p class="apartment-details align-middle">Air Condition <span class="float-right">Yes</span></p>
            </div>
        </div> 
        <div class="col-lg-4">
            <div class="apartment-overview">
                <p class="apartment-details align-middle">Total Area (sq. ft) <span class="float-right">300</span></p>
            </div>
        </div> 
    </div>

    <div class="row" style="margin-top: 10px;">
        <div class="col-lg-4">
            <div class="apartment-overview">
                <p class="apartment-details align-middle">Deposit / Bond <span class="float-right">225.000 $</span></p>
            </div>
        </div> 
        <div class="col-lg-4">
            <div class="apartment-overview">
                <p class="apartment-details align-middle">Car Parking Per Space <span class="float-right">2</span></p>
            </div>
        </div> 
    </div>

</div>

@include ('layouts.template.footer')

