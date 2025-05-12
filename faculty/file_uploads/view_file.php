<?php
require_once('../../config.php');
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
    <div class="col-12">
            <?php
            $file_type = mime_content_type(base_app.$_GET['path']);
            if(preg_match("/^image\//",$file_type,$matches)){
                echo "<img class='img_view' src='".validate_image($_GET['path'])."'/>";
            }
            if(preg_match("/^video\//",$file_type,$matches)){
                echo "<video class='video_view' src='".validate_image($_GET['path'])."' controls></video>";
            }
            if(preg_match("/^application\/pdf$/",$file_type,$matches)){
                echo "<iframe class='pdf_view' src='".base_url."faculty/file_uploads/view_pdf.php?path=".$_GET['path']."'></iframe>";
            }
            ?>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-auto my-1">
            <button class="btn btn-default btn-flat btn-sm" data-dismiss="modal" type="button">Close</button>
        </div>
    </div>
</div>
<script>
    $(function(){
       
    })
    
</script>