@extends('layouts.admin')
@section('content')
   <div class="col-lg-8 m-auto">
    <div class="card">
        <div class="card-header bg-primary">
            <h3>Trash Accounts</h3>
        </div>
        <div class="card-body">
            <form action="{{route('category.restore.trash')}}" method="POST">
                @csrf
            <table class="table table-striped">

                <tr>
                    <th>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" id="chkSelectAll">
                                Select All
                                <i class="input-frame"></i>
                            </label>
                        </div>
                    </th>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>

                @foreach ($category as $index=>$trash)
                    <tr>
                        <td><div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input chkDel" name="category_id[]" value="{{$trash->id}}">
                                <i class="input-frame"></i>
                            </label>
                        </div></td>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $trash->category_name }}</td>
                        <td><img src="{{asset('uploads/categories')}}/{{$trash->category_image}}" alt=""></td>
                        <td><a href="{{route('category.restore', $trash->id)}}" class="btn btn-success" title="Restore Category">Restore</a>
                        <a data-link="{{route('category.parmanent.delete', $trash->id)}}" class="btn btn-danger del" title="Parmanently Delete Category">Delete</a></td>
                    </tr>
                @endforeach
            </table>
            <div class="my-2">
                <button id="del_btn" name="del_btn" value="1" type="submit" class="btn btn-success d-none">Restore</button>
                <button id="del_btn1" name="del_btn" value="2" type="submit" class="btn btn-danger d-none">Delete</button>
            </div>
        </form>
        </div>
    </div>
   </div>
@endsection

@section('footer_script')
@if (session('restore'))
<script>
    Swal.fire({
    position: "center",
    icon: "success",
    title: "{{ session('restore') }}",
    showConfirmButton: false,
    timer: 1500
  });
</script>
@endif

<script>
    $('.del').click(function(){
        Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
   
    var link = $(this).attr('data-link');
    window.location.href= link;
  }
});
    })
</script>
<script>
    $("#chkSelectAll").on('click', function(){
     this.checked ? $(".chkDel").prop("checked",true) : $(".chkDel").prop("checked",false); 
     $('#del_btn').toggleClass('d-none');
     $('#del_btn1').toggleClass('d-none');
})

    $(".chkDel").on('click', function(){
     $('#del_btn').removeClass('d-none');
     $('#del_btn1').removeClass('d-none');
})
</script>

@if (session('sel_res'))
    <script>
        Swal.fire({
    position: "center",
    icon: "success",
    title: "{{ session('sel_res') }}",
    showConfirmButton: false,
    timer: 1500
  }); 
    </script>
@endif

@if (session('trash_del'))
    <script>
         Swal.fire({
    position: "center",
    icon: "success",
    title: "{{ session('trash_del') }}",
    showConfirmButton: false,
    timer: 1500
  }); 
    </script>
@endif
@endsection