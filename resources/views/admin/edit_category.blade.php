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

            <div>
                <h1 class="text-white">Update Category</h1>
                <form method="post" action="{{ url('update_category',$data->id) }}" class="p-3">
                    @csrf
                    <label for="name" class="">Category Name:</label>
                    <input type="text" class="form-control" name="category" value="{{ $data->category_name }}">
                    <input type="submit" value="Update" class="btn btn-primary my-2">
                </form>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.script')
  </body>
</html>
