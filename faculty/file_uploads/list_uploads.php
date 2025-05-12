<?php
require_once('../../config.php');

?>
<style>
    #uni_modal .modal-footer{
        display:none
    }
</style>
<div class="container-fluid">
    <div class="col-12">
        <div class="row justify-content-between mb-2">
            <div>
                <input type="text" class="form-control form-control-sm rounded-0" id="search" placeholder="search">
            </div>
            <div>
            <button class="btn btn-sm btn-primary btn-flat mr-2" type="button" id="uplaod_file">Upload File</button>
            <button class="btn btn-sm btn-default btn-flat" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>

        <div class="row">
            <table class="table table-hovered table-striped">
                <colgroup>
                    <col width="40%">
                    <col width="30%">
                    <col width="30%">
                </colgroup>
                <thead>
                    <tr>
                        <th class="px-0 py-1">Name</th>
                        <th class="px-0 py-1">Date Added</th>
                        <th class="px-0 py-1">Action</th>
                    </tr>
                </thead>
            <?php 
            $uploads = $conn->query("SELECT * FROM upload_files where faculty_id ='{$_settings->userdata('id')}'  ");
            while($row = $uploads->fetch_assoc()):
            
            ?>
                <tr>
                    <td class="px-0 py-1 truncate-1 filename">
                        <?php echo $row['filename'] ?>
                    </td>
                    <td class="px-0 py-1"><i><small><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></small></i></td>
                    <td class="px-0 py-1">
                        <div class="btn btn btn-sm py-0 px-1 rounded-circle btn-default copy_link" type="button" data-link="<?php echo base_url.$row['file_path'] ?>" title="Copy Link"><i class="fa fa-link"></i></div>
                        <?php if(preg_match("/^application\/pdf$/",mime_content_type(base_app.$row['file_path']),$matches)): ?>
                        <div class="btn btn btn-sm py-0 px-1 rounded-circle btn-default shortcode ml-2" type="button" data-shortcode="[pdf_view path = <?php echo $row['file_path'] ?>]" title="Copy PDF Shortcode"><i class="fa fa-code"></i></div>
                        <?php endif; ?>

                    </td>
                </tr>
            <?php endwhile; ?>
            </table>
        </div>
    </div>

</div>
<script>
    $(function(){
        $('#uplaod_file').click(function(){
            uni_modal("Upload Media", "file_uploads/upload.php")
        })
        $('.copy_link').click(function(){
            var _link = $(this).attr('data-link')
            if(navigator){
                var _copy = navigator.clipboard.writeText(_link);
                _copy.then(()=> { alert_toast(" Link Copied to Clipboard","success") }).catch(()=>{
                    alert_toast("An error occured",'error')
                })
            }else{
               alert("Copy to clipboard is not available in your browser. Here's the link : "+_link);
            }
        })
        $('.shortcode').click(function(){
            var shortcode = $(this).attr('data-shortcode')
            if(navigator){
                var _copy = navigator.clipboard.writeText(shortcode);
                _copy.then(()=> { alert_toast(" Short Code Copied to Clipboard","success") }).catch(()=>{
                    alert_toast("An error occured",'error')
                })
            }else{
               alert("Copy to clipboard is not available in your browser. Here's the Short code : "+shortcode);
            }
        })
        $('#search').on('input keyup',function(){
            var _txt = $(this).val().toLowerCase()
            $('.filename').each(function(){
                if(($(this).text().toLowerCase()).includes(_txt) == true){
                    $(this).closest('tr').toggle(true)
                }else{
                    $(this).closest('tr').toggle(false)
                }
            })
        })
    })
</script>