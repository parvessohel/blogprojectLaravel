<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    @include('admin.css')

    <style type="text/css">
        .post_title {

            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;

        }


        .div_center {

            text-align: center;
            padding: 30px;
        }

        label {
            display: inline-block;
            width: 200px;
        }
    </style>


</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">

            @if (session()->has('message'))
            <div class="alert alert-danger">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                {{ session()->get('message') }}
            </div>
        @endif


            <h1 class="post_title">Update Post</h1>

            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <div class="div_center">

                    <label>Category Name</label>
                    <input type="text" name="name" value="{{ $category->name }}">


                </div>

            


                <div class="div_center">


                    <input type="submit" value="Update" class="btn btn-primary">


                </div>


            </form>

        </div>
        @include('admin.footer')
</body>

</html>
