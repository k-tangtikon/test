@include('profile/detail/checklogin')
<div class="col-md-12 mt-1 mb-2 text-center">
    <button type="button" id="addNewWork" class="btn btn-success">เพิ่มผลงาน</button>
</div>
<div class="work" id="work">
    <div class="row">

        <div class="col col-lg-12">
            <?php
            foreach ($posts as $post) { ?>
            <div class="card mb-3">

                <div class="card-header">
                    <a href="javascript:void(0)" class="btn btn-primary edit-post" data-id="{{ $post->id }}">Edit</a>
                    <a href="javascript:void(0)" class="btn btn-danger delete-post"
                        data-id="{{ $post->id }}">Delete</a>
                </div>
                <div class="card-body">
                    <div class="head1 text-center">
                        {{ $post->title }}<br>
                    </div>
                    <div class="text-con text-center">
                        {{ $post->des }}<br>
                    </div>

                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>


<!-- boostrap model -->
<div class="modal fade" id="ajax-Work-model" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxWorkModel"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="addEditWorkForm" name="addEditWorkForm" class="form-horizontal"
                    method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-4 control-label">หัวข้อ</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="text_title" name="text_title"
                                placeholder="หัวข้อ" value="" required="">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name" class="col-sm-2 control-label">รายละเอียด</label>
                        <div class="col-sm-12">
                            <textarea type="text" class="form-control" id="text_des" name="text_des" placeholder="รายละเอียด" value=""
                                rows="10"></textarea>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save-post" value="addNewWork">บันทึก
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
        $('#addNewWork').click(function() {
            $('#addEditWorkForm').trigger("reset");
            $('#ajaxWorkModel').html("เพิ่มข้อมูล");
            $('#ajax-Work-model').modal('show');
        });

        $('body').on('click', '.edit-post', function() {
            var id = $(this).data('id');

            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('edit-post') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#ajaxWorkModel').html("แก้ไข");
                    $('#ajax-Work-model').modal('show');
                    $('#id').val(res.id);
                    $('#text_title').val(res.title);
                    $('#text_des').val(res.des);
                }
            });
        });
        $('body').on('click', '.delete-post', function() {
            if (confirm("Delete Record?") == true) {
                var id = $(this).data('id');

                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('delete-post') }}",
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
        $('body').on('click', '#btn-save-post', function(event) {
            var id = $("#id").val();
            var title = $("#text_title").val();
            var des = $("#text_des").val();
            $("#btn-save").html('Please Wait...');
            $("#btn-save").attr("disabled", true);

            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('add-post') }}",
                data: {
                    id: id,
                    title: title,
                    des: des,

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
