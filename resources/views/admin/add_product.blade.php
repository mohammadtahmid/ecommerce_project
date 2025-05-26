<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <form method="post" action="{{ url('upload_product') }}" enctype="multipart/form-data">
            @csrf
            <h3 class="text-white py-3">Product Add form</h3>
            <div class="mb-3">
                <label for="productTitle" class="form-label">Product Title</label>
                <input type="text" name="title" class="form-control" id="productTitle">
            </div>

            <div class="mb-3">
                <label for="productDescription" class="form-label">Product Description</label>
                <textarea name="description" id="" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="productPrice" class="form-label">Product Price</label>
                <input type="text" name="price" class="form-control" id="productPrice">
            </div>

            <div class="mb-3">
                <label for="productQuantity" class="form-label">Product Quantity</label>
                <input type="number" name="quantity" class="form-control" id="productQuantity">
            </div>

            <div class="mb-3">
                <label for="productCategory" class="form-label">Product Category</label>
                <select name="category" id="" class="form-control" required>
                    <option value="">Select a Option</option>
                    @foreach ($category as $category)
                        <option value="{{ $category->category_name }}" class="text-black">{{ $category->category_name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label for="productImage" class="form-label">Product Image</label>
                <input type="file" name="image" class="form-control" id="productImage">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>


      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.script')
  </body>
</html>
