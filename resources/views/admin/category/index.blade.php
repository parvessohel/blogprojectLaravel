<!DOCTYPE html>
<html>

<head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include('admin.css')

    <style type="text/css">
        .title_deg {

            font-size: 30px;
            font-weight: bold;
            color: white;
            padding: 30px;
            text-align: center;

        }

        .table_deg {

            border: 1px solid white;
            width: 80%;
            text-align: center;
            margin-left: 70px;
        }

        .th_deg {

            background-color: skyblue;
        }


        .img_deg {

            height: 100px;
            width: 150px;
            padding: 10px;

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

            <h1 class="title_deg">All Posts</h1>

            <table class="table_deg">

                <tr class="th_deg">

                    <th>Category Name</th>

                    <th>Delete</th>

                    <th>Edit</th>

                </tr>

                @foreach ($categories as $category)
                    <tr>

                        <td>{{ $category->name }}</td>

                        <td>

                            <a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>


                        </td>
                       
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success">Edit</a>

                        </td>

                    </tr>
                @endforeach
            </table>
        </div>
        @include('admin.footer')

        <script type="text/javascript">
            function confirmation(ev) {
                ev.preventDefault();
                var urlToRedirect = ev.currentTarget.getAttribute('href');
        
                swal({
                    title: "Are you sure to delete this category?",
                    text: "You won't be able to revert this action.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        // Create a form element
                        var form = document.createElement('form');
                        form.method = 'POST';
                        form.action = urlToRedirect;
        
                        // Add CSRF token input
                        var csrfInput = document.createElement('input');
                        csrfInput.type = 'hidden';
                        csrfInput.name = '_token';
                        csrfInput.value = '{{ csrf_token() }}';
                        form.appendChild(csrfInput);
        
                        // Add method spoofing input
                        var methodInput = document.createElement('input');
                        methodInput.type = 'hidden';
                        methodInput.name = '_method';
                        methodInput.value = 'DELETE';
                        form.appendChild(methodInput);
        
                        // Append the form to the body and submit it
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            }
        </script>

</body>

</html>
