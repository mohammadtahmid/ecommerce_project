<!DOCTYPE html>
<html>

<head>
    @include('home.css');
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header');
    <!-- end header section -->
    <!-- slider section -->



    <!-- end slider section -->
  </div>
  <!-- end hero area -->





<div class="container">
    <h2>Product Details</h2>
    <div class="row">


        <div class="col-md-10">
          <div class="box">
              <div class="img-box d-flex justify-content-center">
                <img width="400" height="500" src="/products/{{ $data->image }}" alt="">
              </div>
              <div class="detail-box d-flex justify-content-between">
                <h6>
                  {{ $data->title }}
                </h6>
                <h6>
                  Price
                  <span class="text-danger">
                    ${{ $data->price }}
                  </span>
                </h6>
              </div>

              <div class="detail-box d-flex justify-content-between">
                <h6>
                  Category: {{ $data->title }}
                </h6>
                <h6>
                  Available Quantity:
                  <span class="text-danger">
                    {{ $data->price }}
                  </span>
                </h6>
              </div>
              <p class="pt-3">{{ $data->description }}</p>
          </div>
        </div>


    </div>

</div>









  <!-- info section -->

    @include('home.footer')

</body>

</html>

