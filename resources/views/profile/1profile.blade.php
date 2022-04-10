@include('profile/1header')
@foreach ($profiles as $profile)
@endforeach
<title>{{ $profile->name_surname }}</title>

<body>
    <!-- Check user is logged in -->
    @if (\Auth::check())
        <div class="container">
            <div class="profile" id="profile">
                <div class="text-center">

                    <br>
                    <img src="img/profile.jpg" alt="Avatar" style="width:200px;border-radius: 50%;">
                    <br>
                    <div class="txt-profile mt-3">
                        {{ $profile->name_surname }}
                        <a href="javascript:void(0)" class="btn edit" data-id="{{ $profile->id }}">
                            <div class="text-edit">Edit</div>
                        </a>
                    </div>
                </div>
            </div>

            @include('profile/1navbar')
            <div class="row">
                <div class="col col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div id="about" class="line">
                                @include('profile/detail/about')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>


            @include('profile/detail/post_test')


        </div>
        <!-- boostrap model -->
        <div class="modal fade" id="name-model" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="ajaxBookModel"></h4>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:void(0)" id="addEditBookForm" name="addEditBookForm"
                            class="form-horizontal" method="POST">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group mb-4">
                                <label for="name" class="col-sm-4 control-label">ชื่อ-นามสกุล</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name_surname" name="name_surname"
                                        placeholder="ชื่อ-นามสกุล" value="" maxlength="50" required="">
                                </div>
                            </div>
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="btn-save" value="addNewBook">บันทึก
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end bootstrap model -->
    @else
        <div class="text-center"><br><br><br><br>
            กรุณาเข้าสู่ระบบ
            <a href="{{ url('pagelogin') }}">Login</a>
        </div>
    @endif
    <!-- Check user is logged in -->
</body>
<script type="text/javascript">
    $(document).ready(function($) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#addNewBook').click(function() {
            $('#addEditBookForm').trigger("reset");
            $('#ajaxBookModel').html("เพิ่มข้อมูล");
            $('#name-model').modal('show');
        });

        $('body').on('click', '.edit', function() {
            var id = $(this).data('id');

            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('edit-tikon') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#ajaxBookModel').html("แก้ไข");
                    $('#name-model').modal('show');
                    $('#id').val(res.id);
                    $('#name_surname').val(res.name_surname);
                }
            });
        });
        $('body').on('click', '.delete', function() {
            if (confirm("Delete Record?") == true) {
                var id = $(this).data('id');

                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('delete-profile') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        window.location.reload();
                    }
                });
            }
        });
        $('body').on('click', '#btn-save', function(event) {
            var id = $("#id").val();
            var name_surname = $("#name_surname").val();
            $("#btn-save").html('Please Wait...');
            $("#btn-save").attr("disabled", true);

            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('add-tikon') }}",
                data: {
                    id: id,
                    name_surname: name_surname,
                },
                dataType: 'json',
                success: function(res) {
                    window.location.reload();
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                }
            });
        });
    });
</script>

</html>
