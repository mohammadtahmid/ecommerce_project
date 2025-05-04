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
                    <div class="d-flex justify-content-between text-white">
                        <h2>Add Category</h2>
                        <form action="{{ url('add_category') }}" method="post">
                            @csrf
                            <div>
                                <input style="width: 300px; height: 40px;" class="" type="text" name="category">
                                <input style="margin-bottom: 5px;" type="submit" name="" id="" class="btn btn-primary"
                                    value="Add Category">
                            </div>
                        </form>
                    </div>

                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category name</th>
                                    <th scope="col">Create_at</th>
                                    <th scope="col">Update_at</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $data)
                                <tr>

                                    <th scope="row">{{ $data->id }}</th>
                                    <td>{{ $data->category_name }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->updated_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- JavaScript files-->
            @include('admin.script')
</body>

</html>
