<?php $reload = (bool)(isset($_GET['reload'])) ?>
<div class="container-fluid">
    <form id="upload_file">
        <input type="hidden" name="reload" value="<?php echo $reload ?>">
        <div class="form-group">
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" name="files[]" multiple accept="image/*,.pdf,video/*" class="custom-file-input" id="fileInput" onchange="filenames(this,$(this))" required>
                    <label class="custom-file-label" style="overflow:hidden;width:100%" for="fileInput">Choose file</label>
                </div>
                <div class="input-group-append">
                <span class="input-group-text">Upload</span>
                </div>
            </div>
        </div>    
    </form>
</div>
<script>
    function filenames(input,_this){
        var filenames = [], fname;
        Object.keys(input.files).map((k)=>{
            filenames.push(input.files[k].name)
        })
        if(filenames.length > 0)
            fname = '"'+filenames.join('" "')+'"';
        else
            fname = "Choose File";

        _this.siblings('label').text(fname)
    }
$(function(){
    $('#upload_file').submit(function(e){
        e.preventDefault();
        start_loader();
        $.ajax({
            url:_base_url_+'classes/Master.php?f=upload_files',
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
                        if(!("<?php echo $reload ?>")){
                        end_loader();
                        alert_toast(" File/s uploaded successfully","success");
                        setTimeout(() => {
                            uni_modal("Media List",'file_uploads/list_uploads.php',"mid-large")
                        }, 1500);
                    }else{
                        location.reload();
                    }
                }else{
                    alert_toast('An error occured');
                }
                end_loader();
            }
        })
        })
})
</script>