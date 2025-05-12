<?php 
require_once('../../config.php');
extract($_GET);
?>
<div class="container-fluid">
    <form id="backpack-form">
        <input type="hidden" name="lesson_id" value="<?php echo $lesson_id ?>">
        <input type="hidden" name="file_path" value="<?php echo $file_path ?>">
        <div class="form-group">
           <label for="title" class="control-label">Title</label>
           <input type="text" id="title" name="title" class="form-control" required>
        </div>    
        <div class="form-group">
           <label for="description" class="control-label">Description</label>
           <textarea name="description" id="description" class="form-control" cols="30" rows="3" required></textarea>
        </div> 
        <div class="form-group">
            <div class="icheck-primary d-inline">
                <input type="checkbox" id="pinned" name="pinned" value="1" >
                <label for="pinned">
                    <i>Pin to Dashboard</i>
                </label>
            </div>
        </div> 
    </form>
</div>
<script>
$(function(){
    $('#backpack-form').submit(function(e){
        e.preventDefault();
        $('.err_msg').remove()
        start_loader();
        $.ajax({
            url:_base_url_+'classes/Master.php?f=save_to_backpack',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            dataType: 'json',
            error:err=>{
                console.log(err)
                alert_toast('An error occured');
                end_loader();
            },
            success:function(resp){
                if(!!resp.status && resp.status == 'success'){
                    end_loader();
                    alert_toast(" File/s uploaded successfully","success");
                    $('.modal').modal('hide')
                }else if(!!resp.status && resp.status == 'failed' && !!resp.msg){
                    var el = $("<div>")
                        el
                            .addClass('err_msg alert alert-danger form-group')
                            .text(resp.msg)
                            .hide()
                        $('#backpack-form').prepend(el)
                        el.show('slow')
                }else{
                    alert_toast('An error occured');
                }
                end_loader();
            }
        })
        })
})
</script>