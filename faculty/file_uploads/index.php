<div class="container-fluid">
    <div class="col-12">
        <div class="row justify-content-between mb-2">
            <div class="col-2">
                <input type="text" class="form-control form-control-sm rounded-0" id="search" placeholder="search">
            </div>
            <div>
            <button class="btn btn-sm btn-primary btn-flat mr-2" type="button" id="uplaod_file">Upload File</button>
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
                        <th class="px-0 py-1">Actions</th>
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
                        <button class="btn btn btn-sm py-0 px-1 rounded-circle btn-default view_file" type="button" data-path="<?php echo $row['file_path'] ?>" title="View File"><i class="fa fa-eye"></i></button>
                        <button class="btn btn btn-sm py-0 px-1 rounded-circle btn-default copy_link" type="button" data-link="<?php echo base_url.$row['file_path'] ?>" title="Copy Link"><i class="fa fa-link"></i></button>
                        <?php if(preg_match("/^application\/pdf$/",mime_content_type(base_app.$row['file_path']),$matches)): ?>
                        <button class="btn btn btn-sm py-0 px-1 rounded-circle btn-default shortcode " type="button" data-shortcode="[pdf_view path = <?php echo $row['file_path'] ?>]" title="Copy PDF Shortcode"><i class="fa fa-code"></i></button>
                        <?php endif; ?>
                        <button class="btn btn btn-sm py-0 px-1 rounded-circle btn-default delete_file" type="button" data-id="<?php echo $row['id'] ?>" data-path="<?php echo $row['file_path'] ?>" title="Delete File"><i class="fa fa-trash text-danger"></i></button>

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
            uni_modal("Upload Media", "file_uploads/upload.php?reload=true")
        })
        $('.view_file').click(function(){
            var path = $(this).attr('data-path')
            uni_modal("<i class='fa fa-photo-video'></i> View File",'file_uploads/view_file.php?path='+path,'mid-large')
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
        $('.delete_file').click(function(){
		_conf("Are you sure to delete file?","delete_media",[$(this).attr('data-id'),"'"+$(this).attr('data-path')+"'"])
		})
    })
    function delete_media($id,$path){
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Master.php?f=delete_media',
			method:'POST',
			data:{id:$id,path:$path},
            dataType:'json',
            error:err=>{
                console.log(err)
                alert_toast("An error occured.",'error')
                end_loader()
            },
			success:function(resp){
				if(resp.status=='success'){
					location.reload()
				}else{
                    console.log(resp)
                    alert_toast("An error occured.",'error')
                }
                end_loader()
			}
		})
	}
</script>