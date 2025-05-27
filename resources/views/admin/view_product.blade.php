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


                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Category</th>
                    <th scope="col">image</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $products)
                    <tr>
                        <th scope="row">{{ $products->id }}</th>
                        <td>{{ $products->description }}</td>
                        <td>{{ $products->price }}</td>
                        <td>{{ $products->quantity }}</td>
                        <td>{{ $products->category }}</td>
                        <td><img class="" style="height: 120px; width: 120px;" src="products/{{ $products->image }}" alt="image"></td>
                        <td>
                            <a href="#" class="btn btn-info">View</a>
                            <a href="#" class="btn btn-success">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
      </div>
      <div class="d-flex justify-content-end">{{ $product->links() }}</div>
    </div>
    <!-- JavaScript files-->
    @include('admin.script')
  </body>
</html>
