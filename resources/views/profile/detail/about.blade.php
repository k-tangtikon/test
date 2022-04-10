@include('profile/detail/checklogin')


@foreach ($profiles as $profile)
@endforeach
<div id="reload">
    <div class="head1 text-center">
        <i class="bi bi-person-fill"></i>
        About
        <a href="javascript:void(0)" class="btn edit-about" data-id="{{ $profile->id }}">
            <div class="text-edit">Edit</div>
        </a>
    </div>
    <div class="text-con">
        {{ $profile->about }}
    </div>
    <hr>
    <div class="head1 text-center">Link</div>
    <a href="{{ $profile->link }}" target="_blank">
        <div class="txtnav-pdf text-center">GitHub</div>
    </a>

    <!-- boostrap model -->
    <div class="modal fade" id="about-model" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ajaxAboutModel"></h4>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="addEditAboutForm" name="addEditAboutForm"
                        class="form-horizontal" method="POST">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group mb-4">
                            <label for="name" class="col-sm-4 control-label">เกี่ยวกับ</label>
                            <div class="col-sm-12">
                                <textarea type="text" class="form-control" id="txt_about" name="txt_about" placeholder="เกี่ยวกับ" value=""
                                    required="" rows="8"></textarea>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="name" class="col-sm-4 control-label">link</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="txt_link" name="txt_link"
                                    placeholder="link" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="btn-save-about" value="addNewAbout">บันทึก
                            </button>
                        </div>
                    </form>
                </div>
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
        $('#addNewAbout').click(function() {
            $('#addEditAboutForm').trigger("reset");
            $('#ajaxAboutModel').html("เพิ่มข้อมูล");
            $('#about-model').modal('show');
        });

        $('body').on('click', '.edit-about', function() {
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
                    $('#ajaxAboutModel').html("แก้ไข");
                    $('#about-model').modal('show');
                    $('#id').val(res.id);
                    $('#txt_about').val(res.about);
                    $('#txt_link').val(res.link);
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
        $('body').on('click', '#btn-save-about', function(event) {
            var id = $("#id").val();
            var about = $("#txt_about").val();
            var link = $("#txt_link").val();
            // console.log(about);
            $("#btn-save").html('Please Wait...');
            $("#btn-save").attr("disabled", true);

            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('add-about') }}",
                data: {
                    id: id,
                    about: about,
                    link: link,
                },
                dataType: 'json',
                success: function(res) {
                    $("#reload").load("/about");
                    $('#about-model').modal('hide');
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                }
            });
        });
    });
</script>
