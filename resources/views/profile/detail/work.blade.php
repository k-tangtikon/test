@include('profile/detail/checklogin')
@foreach ($profiles as $profile)
@endforeach
<div id="reload">
    <div class="text-center">
        <div class="head1">
            <i class="bi bi-briefcase-fill"></i>
            Experience
            <a href="javascript:void(0)" class="btn edit-work" data-id="{{ $profile->id }}">
                <div class="text-edit">Edit</div>
            </a>
        </div>
        <div class="text-con">
            {{-- {{ $profile->exp }} --}}
            {!! nl2br(e($profile->exp)) !!}
        </div>
    </div>
</div>
<!-- boostrap model -->
<div class="modal fade" id="work-model" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxworkModel"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="addEditworkForm" name="addEditworkForm" class="form-horizontal"
                    method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group mb-4">
                        <label for="name" class="col-sm-4 control-label">ประสบการณ์</label>
                        <div class="col-sm-12">
                            <textarea type="text" class="form-control" id="txt_work" name="txt_work" placeholder="ประสบการณ์" value="" required=""
                                rows="8"></textarea>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save-work" value="addNewwork">บันทึก
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
        $('#addNewwork').click(function() {
            $('#addEditworkForm').trigger("reset");
            $('#ajaxworkModel').html("เพิ่มข้อมูล");
            $('#work-model').modal('show');
        });

        $('body').on('click', '.edit-work', function() {
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
                    $('#ajaxworkModel').html("แก้ไข");
                    $('#work-model').modal('show');
                    $('#id').val(res.id);
                    $('#txt_work').val(res.exp);
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
        $('body').on('click', '#btn-save-work', function(event) {
            var id = $("#id").val();
            var work = $("#txt_work").val();
            // console.log(work);
            $("#btn-save").html('Please Wait...');
            $("#btn-save").attr("disabled", true);

            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('add-work') }}",
                data: {
                    id: id,
                    work: work,
                },
                dataType: 'json',
                success: function(res) {
                    $("#reload").load("/work");
                    $('#work-model').modal('hide');
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                }
            });
        });
    });
</script>
