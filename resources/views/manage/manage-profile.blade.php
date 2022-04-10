<div class="container mt-2">
    <div class="row">
        <div class="col-md-12 mt-1 mb-2">
            <button type="button" id="addNewBook" class="btn btn-success">Add</button>
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        {{-- <th scope="col">id</th> --}}
                        <th scope="col">Name Surname</th>
                        <th scope="col">phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">address</th>
                        <th scope="col">about</th>
                        <th scope="col">link</th>
                        <th scope="col">edu1</th>
                        <th scope="col">edu2</th>
                        <th scope="col">exp</th>
                        <th scope="col">skills</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            {{-- <td>{{ $profile->id }}</td> --}}
                            <td>{{ $profile->name_surname }}</td>
                            <td>{{ $profile->phone }}</td>
                            <td>{{ $profile->email }}</td>
                            <td>{{ $profile->address }}</td>
                            <td>{{ $profile->about }}</td>
                            <td>{{ $profile->link }}</td>
                            <td>{{ $profile->edu1 }}</td>
                            <td>{{ $profile->edu2 }}</td>
                            <td>{{ $profile->exp }}</td>
                            <td>{{ $profile->skills }}</td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-primary edit"
                                    data-id="{{ $profile->id }}">Edit</a>
                                <a href="javascript:void(0)" class="btn btn-primary delete"
                                    data-id="{{ $profile->id }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {!! $books->links() !!} --}}
        </div>
    </div>
</div>
<!-- boostrap model -->
<div class="modal fade" id="ajax-book-model" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxBookModel"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="addEditBookForm" name="addEditBookForm" class="form-horizontal"
                    method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-4 control-label">ชื่อ-นามสกุล</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name_surname" name="name_surname"
                                placeholder="ชื่อ-นามสกุล" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">โทรศัพท์</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="โทรศัพท์"
                                value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">email</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="email" name="email" placeholder="email"
                                value="" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ที่อยู่</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="address" name="address" placeholder="ที่อยู่"
                                value="" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">เกี่ยวกับ</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="about" name="about" placeholder="เกี่ยวกับ"
                                value="" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">link</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="link" name="link" placeholder="link" value=""
                                required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">มัธยมต้น</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="edu1" name="edu1" placeholder="มัธยมต้น"
                                value="" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ป.ตรี</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="edu2" name="edu2" placeholder="ป.ตรี" value=""
                                required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ประสบการณ์</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="exp" name="exp" placeholder="ประสบการณ์"
                                value="" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">skills</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="skills" name="skills" placeholder="skills"
                                value="" required="">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="addNewBook">บันทึก
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<!-- end bootstrap model -->
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
            $('#ajax-book-model').modal('show');
        });

        $('body').on('click', '.edit', function() {
            var id = $(this).data('id');

            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('edit-profile') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#ajaxBookModel').html("แก้ไข");
                    $('#ajax-book-model').modal('show');
                    $('#id').val(res.id);
                    $('#name_surname').val(res.name_surname);
                    $('#phone').val(res.phone);
                    $('#email').val(res.email);
                    $('#address').val(res.address);
                    $('#about').val(res.about);
                    $('#link').val(res.link);
                    $('#edu1').val(res.edu1);
                    $('#edu2').val(res.edu2);
                    $('#exp').val(res.exp);
                    $('#skills').val(res.skills);

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
            var phone = $("#phone").val();
            var email = $("#email").val();
            var address = $("#address").val();
            var about = $("#about").val();
            var link = $("#link").val();
            var edu1 = $("#edu1").val();
            var edu2 = $("#edu2").val();
            var exp = $("#exp").val();
            var skills = $("#skills").val();

            $("#btn-save").html('Please Wait...');
            $("#btn-save").attr("disabled", true);

            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('add-profile') }}",
                data: {
                    id: id,
                    name_surname: name_surname,
                    phone: phone,
                    email: email,
                    address: address,
                    about: about,
                    link: link,
                    edu1: edu1,
                    edu2: edu2,
                    exp: exp,
                    skills: skills,
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
</body>
