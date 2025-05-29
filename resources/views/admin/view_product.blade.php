
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



                <form action="{{ url('product_search') }}" method="get">
                    <div class="d-flex w-25">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search"/>
                        <input class="btn btn-outline-success" type="submit" value="Search">
                    </div>
                </form>






                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Category</th>
                    <th scope="col">image</th>
                    <th scope="col" class="d-flex justify-content-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $products)
                    <tr>
                        <th scope="row">{{ $products->id }}</th>
                        <td>{{ $products->title }}</td>
                        <td>{!!Str::limit($products->description,50)!!}</td>
                        <td>{{ $products->price }}</td>
                        <td>{{ $products->quantity }}</td>
                        <td>{{ $products->category }}</td>
                        <td><img class="" style="height: 120px; width: 120px;" src="products/{{ $products->image }}" alt="image"></td>
                        <td>
                            <a href="#" class="btn btn-info">View</a>
                            <a href="{{ url('update_product',$products->id) }}" class="btn btn-success">Edit</a>
                            <a href="{{ url('delete_product',$products->id) }}" onclick="confirmation(event)" class="btn btn-danger">Delete</a>
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
