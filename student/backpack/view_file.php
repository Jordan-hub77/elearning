<?php
require_once('../../config.php');
    $redirect = (bool)(isset($_GET['redirect']));
    $backpack = $conn->query("SELECT b.*,f.filename, f.file_path FROM `backpack` b inner join `upload_files` f on b.upload_file_id = f.id where b.id = '{$_GET['id']}'  ");
    if($backpack->num_rows > 0){
        foreach($backpack->fetch_array() as $k => $v){
            $$k = $v;
        }
    }
    $lesson_qry = $conn->query("SELECT * FROM lessons where id = '{$lesson_id}'");
        foreach($lesson_qry->fetch_array() as $k => $v){
            $lesson[$k] = $v;
        }
?>
<style>
    table#bpack-list tr{
        cursor:pointer
    }
    #uni_modal .modal-footer{
        display:none;
    }
    .img_view,.video_view,.pdf_view{
        width:100%;
        height:60vh;
        background:black
    }
    .img_view{
        object-fit:scale-down;
        object-position:center center;
    }
    .video_view{
        object-fit:contain;
        object-position:center center;
    }
</style>
<div class="contriner-fluid" id="file_view">
    <div class="row">
        <div class="col-lg-4">
            <dl class="py-5">
                <dt class="py-3"><?php echo $title ?></dt>
                <dd><?php echo $description ?></dd>
            </dl>
        </div>
        <div class="col-lg-8">
            <?php
            $file_type = mime_content_type(base_app.$file_path);
            if(preg_match("/^image\//",$file_type,$matches)){
                echo "<img class='img_view' src='".validate_image($file_path)."'/>";
            }
            if(preg_match("/^video\//",$file_type,$matches)){
                echo "<video class='video_view' src='".validate_image($file_path)."' controls></video>";
            }
            if(preg_match("/^application\/pdf$/",$file_type,$matches)){
                echo "<iframe class='pdf_view' src='".base_url."faculty/file_uploads/view_pdf.php?path=".$file_path."'></iframe>";
            }
            ?>
        </div>
    </div>
    <div class="row justify-content-end">
        <?php if($redirect): ?>
            <div class="col-auto my-1 mx-1">
                <a class="btn btn-primary btn-flat btn-sm" href="?page=lesson/view_lesson&id=<?php echo $lesson_id ?>">Go to lesson's Page</a>
            </div>
        <?php endif; ?>
        <div class="col-auto my-1 mx-1">
            <a class="btn btn-danger btn-flat btn-sm" href="javascript:void(0)" id="remove_from_backpack">Remove</a>
        </div>
        <div class="col-auto my-1">
            <button class="btn btn-default btn-flat btn-sm" data-dismiss="modal" type="button">Close</button>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('#uni_modal').on('hide.bs.modal',function(){
            if($(this).find('#file_view').length > 0 && !('<?php echo $redirect ?>')){
                setTimeout(() => {
                    uni_modal("My Backpack Items for <?php echo $lesson['title'] ?> lesson",'backpack/per_lesson.php?lesson_id=<?php echo $lesson_id ?>','mid-large')
                }, 300);
            }
        })
        $('#remove_from_backpack').click(function(){
            _conf("Are you sure to remove this item from your backpack?","remove_from_backpack",["<?php echo $id ?>"])
        })
    })
    function remove_from_backpack($id){
        start_loader()
        $.ajax({
			url:_base_url_+'classes/Master.php?f=remove_from_backpack',
			method:'POST',
			data:{id:$id},
			dataType:'json',
			success:function(resp){
				if(resp.status == 'success'){
					location.reload()
				}else{
					alert_toast("Failed to unpinned the Backpack Item.",'error');
                }
                end_loader();
			}
		})
    }
    
</script>