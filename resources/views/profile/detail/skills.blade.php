@include('profile/detail/checklogin')
@foreach ($profiles as $profile)
@endforeach
<div id="reload">
    <div class="text-center">
        <div class="head1">
            <i class="bi bi-cloud-check-fill"></i>
            Skills
            <a href="javascript:void(0)" class="btn edit-skills" data-id="{{ $profile->id }}">
                <div class="text-edit">Edit</div>
            </a>
        </div>
        <div class="text-con">
            {{-- {{ $profile->skills }} --}}
            {!! nl2br(e($profile->skills)) !!}

        </div>
    </div>
</div>
<!-- boostrap model -->
<div class="modal fade" id="skills-model" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxskillsModel"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="addEditskillsForm" name="addEditskillsForm"
                    class="form-horizontal" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group mb-4">
                        <label for="name" class="col-sm-4 control-label">ทักษะและความสามารถ</label>
                        <div class="col-sm-12">
                            <textarea type="text" class="form-control" id="txt_skills" name="txt_skills" placeholder="ทักษะและความสามารถ" value=""
                                required="" rows="8"></textarea>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save-skills" value="addNewskills">บันทึก
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
        $('#addNewskills').click(function() {
            $('#addEditskillsForm').trigger("reset");
            $('#ajaxskillsModel').html("เพิ่มข้อมูล");
            $('#skills-model').modal('show');
        });

        $('body').on('click', '.edit-skills', function() {
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
                    $('#ajaxskillsModel').html("แก้ไข");
                    $('#skills-model').modal('show');
                    $('#id').val(res.id);
                    $('#txt_skills').val(res.skills);
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
        $('body').on('click', '#btn-save-skills', function(event) {
            var id = $("#id").val();
            var skills = $("#txt_skills").val();
            // console.log(skills);
            $("#btn-save").html('Please Wait...');
            $("#btn-save").attr("disabled", true);

            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('add-skills') }}",
                data: {
                    id: id,
                    skills: skills,
                },
                dataType: 'json',
                success: function(res) {
                    $("#reload").load("/skills");
                    $('#skills-model').modal('hide');
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                }
            });
        });
    });
</script>
