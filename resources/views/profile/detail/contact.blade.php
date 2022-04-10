@include('profile/detail/checklogin')
@foreach ($profiles as $profile)
@endforeach
<div id="reload">

    <div class="head1 text-center">
        <i class="bi bi-house-fill"></i>
        Contact
        <a href="javascript:void(0)" class="btn edit-contact" data-id="{{ $profile->id }}">
            <div class="text-edit">Edit</div>
        </a>
    </div>
    <div class="text-con text-center">
        โทรศัพท์:{{ $profile->phone }}<br>
        E-mail:{{ $profile->email }}<br>
        ที่อยู่: {{ $profile->address }}<br>
    </div>

</div>
<!-- boostrap model -->
<div class="modal fade" id="contact-model" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxcontactModel"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="addEditcontactForm" name="addEditcontactForm"
                    class="form-horizontal" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group mb-4">
                        <label for="name" class="col-sm-4 control-label">โทรศัพท์</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="txt_phone" name="txt_phone"
                                placeholder="โทรศัพท์" value="">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="name" class="col-sm-4 control-label">E-mail</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="txt_email" name="txt_email"
                                placeholder="E-mail" value="">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="name" class="col-sm-4 control-label">ที่อยู่</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="txt_address" name="txt_address"
                                placeholder="ที่อยู่" value="">
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save-contact" value="addNewcontact">บันทึก
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
        $('#addNewcontact').click(function() {
            $('#addEditcontactForm').trigger("reset");
            $('#ajaxcontactModel').html("เพิ่มข้อมูล");
            $('#contact-model').modal('show');
        });

        $('body').on('click', '.edit-contact', function() {
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
                    $('#ajaxcontactModel').html("แก้ไข");
                    $('#contact-model').modal('show');
                    $('#id').val(res.id);
                    $('#txt_phone').val(res.phone);
                    $('#txt_email').val(res.email);
                    $('#txt_address').val(res.address);
                }
            });
        });

        $('body').on('click', '#btn-save-contact', function(event) {
            var id = $("#id").val();
            var phone = $("#txt_phone").val();
            var email = $("#txt_email").val();
            var address = $("#txt_address").val();
            // console.log(contact);
            $("#btn-save").html('Please Wait...');
            $("#btn-save").attr("disabled", true);

            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('add-contact') }}",
                data: {
                    id: id,
                    phone: phone,
                    email: email,
                    address: address,
                },
                dataType: 'json',
                success: function(res) {
                    // window.location.reload("/contact");
                    $("#reload").load("/contact");
                    $('#contact-model').modal('hide');
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                }
            });
        });
    });
</script>
