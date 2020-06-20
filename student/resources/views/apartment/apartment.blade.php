@include ('layouts.template.header')

@include ('layouts.template.menu')

<div class="container">
    <div class="row h-100">
        <div class="col-lg-6">
            <img src="/images/apartment1.jpg" class="img-fluid animated zoomIn delay-1s" alt="image" style="max-width: 100%; margin-top: 10px; border: 1px solid #cec9ab;">
        </div>
        <div class="col-lg-6 align-self-center animated zoomIn delay-1s">
            <h3 class="apartment-advantage text-center animated zoomIn delay-1s">Dynamic nearby places</h3>
            <p class="apartment-add animated zoomIn delay-2s">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                Placeat excepturi eveniet minus odio sed praesentium ex 
                minima dignissimos id ab. Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
            </p>
        </div>
        <div class="col-lg-6 align-self-center">
            <h3 class="apartment-advantage text-center animated zoomIn delay-1s">Residence view</h3>
            <p class="apartment-add animated zoomIn delay-2s">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                Placeat excepturi eveniet minus odio sed praesentium ex 
                minima dignissimos id ab. Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
            </p>
        </div>
        <div class="col-lg-6">
            <img src="/images/apartment3.jpg" class="img-fluid animated zoomIn delay-1s" alt="image" style="max-width: 100%; margin-top: 10px; border: 1px solid black;">
        </div>

        <div class="col-lg-6">
            <img src="/images/apartment3.jpg" class="img-fluid animated zoomIn delay-1s" alt="image" style="max-width: 100%; margin-top: 10px; border: 1px solid black;">
        </div>
        <div class="col-lg-6 align-self-center">
            <h3 class="apartment-advantage text-center animated zoomIn delay-2s">Detailed floorplans</h3>
            <p class="apartment-add animated zoomIn delay-2s">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                Placeat excepturi eveniet minus odio sed praesentium ex 
                minima dignissimos id ab. Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="header-job">Choose size of apartment</h3>
        </div>
    </div>
</div>

<div class="row no-gutters">
    <div class="col-lg-6 ">
        <img src="/images/apartment3.jpg" class="img-fluid animated zoomIn delay-1s" alt="" style="max-width: 100%; position: absolute; height: 409px;">
        <div class="one-room animated bounce delay-1s">
            <h4 class="type-apartment" style="color:white;">One room apartments</h4>
            <p class="apartment-description">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                Corrupti omnis repellendus ex veritatis et optio!
            </p>
            <a href="/apartment-one-room" class="btn btn-primary" style="border-radius: 20px; text-align: center;">View all</a>
        </div>
    </div>
    <div class="col-lg-6">
        <img src="/images/apartment3.jpg" class="img-fluid animated zoomIn delay-2s" alt="" style="max-width: 100%; position: absolute; height: 409px;">
        <div class="one-room animated bounce delay-2s">
            <h4 class="type-apartment" style="color:white;">Two room apartments</h4>
            <p class="apartment-description">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                Corrupti omnis repellendus ex veritatis et optio!
            </p>
            <a href="#" class="btn btn-primary" style="border-radius: 20px; text-align: center;">View all</a>
        </div>
    </div>
</div>

<div class="row no-gutters">
    <div class="col-lg-6 ">
        <img src="/images/apartment3.jpg" class="img-fluid animated zoomIn delay-3s" alt="" style="max-width: 100% \9; position: absolute; height: 409px;">
        <div class="one-room animated bounce delay-3s">
            <h4 class="type-apartment" style="color:white;">Three room apartments</h4>
            <p class="apartment-description">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                Corrupti omnis repellendus ex veritatis et optio!
            </p>
            <a href="#" class="btn btn-primary" style="border-radius: 20px; text-align: center;">View all</a>
        </div>
    </div>
    <div class="col-lg-6">
        <img src="/images/apartment3.jpg" class="img-fluid animated zoomIn delay-4s" alt="" style="max-width: 100%; position: absolute; height: 409px;">
        <div class="one-room animated bounce delay-4s">
            <h4 class="type-apartment" style="color:white;">Four room apartments</h4>
            <p class="apartment-description">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                Corrupti omnis repellendus ex veritatis et optio!
            </p>
            <a href="#" class="btn btn-primary" style="border-radius: 20px; text-align: center;">View all</a>
        </div>
    </div>
</div>

<div class="rent ">
    <div class="row no-margin no-padding">
        <div class="col-lg-7">
            <p class="rent-house">Do you want to Rent your House</p>
            <p class="rent-house-desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="col-lg-5">
            <p class="rent-number">+38762671325</p>
            <p class="rent-mail">studentservice@gmail.com</p>
            <a class="btn btn-outline-warning btn-lg" style="width: 150px !important;" href="#" role="button">Contact</a>
        </div>
    </div>
</div>

@include ('layouts.template.footer')