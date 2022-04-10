@include('profile/detail/checklogin')
@foreach ($profiles as $profile)
@endforeach
<div id="reload">
    <div class="text-center">
        <div class="head1">
            <i class="bi bi-mortarboard-fill"></i>
            Education
            <a href="javascript:void(0)" class="btn edit-edu" data-id="{{ $profile->id }}">
                <div class="text-edit">Edit</div>
            </a>
        </div>

        <div class="text-con">
            <div class="text-head">ปริญญาตรี</div>
            <br>{{ $profile->edu2 }}
        </div>

        <hr>
        <div class="text-con">
            <div class="text-head">มัธยมปลาย</div>
            <br>{{ $profile->edu1 }}
        </div>

    </div>
</div>
<!-- boostrap model -->
<div class="modal fade" id="edu-model" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxeduModel"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="addEditeduForm" name="addEditeduForm" class="form-horizontal"
                    method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group mb-4">
                        <label for="name" class="col-sm-4 control-label">ปริญญาตรี</label>
                        <div class="col-sm-12">
                            <textarea type="text" class="form-control" id="txt_edu2" name="txt_edu2" placeholder="ปริญญาตรี" value="" required=""
                                rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="name" class="col-sm-4 control-label">มัธยมปลาย</label>
                        <div class="col-sm-12">
                            <textarea type="text" class="form-control" id="txt_edu1" name="txt_edu1" placeholder="มัธยมปลาย" value="" required=""
                                rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save-edu" value="addNewedu">บันทึก
                        </button>
                    </div>
                </form>
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
        $('#addNewedu').click(function() {
            $('#addEditeduForm').trigger("reset");
            $('#ajaxeduModel').html("เพิ่มข้อมูล");
            $('#edu-model').modal('show');
        });

        $('body').on('click', '.edit-edu', function() {
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
                    $('#ajaxeduModel').html("แก้ไข");
                    $('#edu-model').modal('show');
                    $('#id').val(res.id);
                    $('#txt_edu2').val(res.edu2);
                    $('#txt_edu1').val(res.edu1);
                }
            });
        });

        $('body').on('click', '#btn-save-edu', function(event) {
            var id = $("#id").val();
            var edu2 = $("#txt_edu2").val();
            var edu1 = $("#txt_edu1").val();
            // console.log(edu);
            $("#btn-save").html('Please Wait...');
            $("#btn-save").attr("disabled", true);

            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('add-edu') }}",
                data: {
                    id: id,
                    edu2: edu2,
                    edu1: edu1,
                },
                dataType: 'json',
                success: function(res) {
                    // window.location.reload("/edu");
                    $("#reload").load("/edu");
                    $('#edu-model').modal('hide');
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                }
            });
        });
    });
</script>
