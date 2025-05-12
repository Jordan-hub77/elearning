<hr>
<div class="row row-cols-4 gx-4 row-cols-sm-1 row-cols-md-3 row-cols-lg-3" id="bp-list">
    <?php 
         $backpack = $conn->query("SELECT * FROM `backpack` where `student_id` = '{$_settings->userdata('id')}' order by FIELD(`pinned`,1,0),unix_timestamp(`date_updated`) ");
         if(isset($conn->error) && !empty($conn->error))
         echo $conn->error;
         $result = $backpack->fetch_all(MYSQLI_ASSOC);
         $file_ids = array_column($result,'upload_file_id');
         $list = array();
             foreach($result as $row){
                 $list[] = $row;
             }
             foreach($list as $row):
    ?>
        <div class="col bp-item"  data-id="<?php echo $row['id'] ?>">
            <div class="card text-dark">
                <div class="card-header">
                    <h5 class='card-title'><?php echo $row['title'] ?></h5>
                    <div class="card-tools">
                        <?php if($row['pinned'] == 1): ?>
                        <button class="btn bg-none p-0 unpin-item" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-thumbtack"></i></button>
                        <?php else: ?>
                        <button class="btn bg-none p-0 pin-item text-gray opacity-50" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-thumbtack"></i></button>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid ">
                        <div class="truncate-3">
                            <?php echo $row['description'] ?>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <a href="javascript:void(0)" class="view_bp-item" data-id="<?php echo $row['id'] ?>">View Backpack Item</a>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    <?php endforeach; ?>
</div>
<script>
    $(function(){
        $('.view_bp-item').click(function(){
            uni_modal('Backpack Item View','backpack/view_file.php?redirect=true&id='+$(this).attr('data-id'),"mid-large")
        })
        $('.unpin-item').click(function(){
            unpin($(this))
        })
        $('.pin-item').click(function(){
            var _this= $(this)
            pin(_this)
        })

    })
    function unpin(_this){
        _conf('Are you sure to unpin this backpack item?','unpin_bp_item',[_this.attr('data-id')])
    }
    function pin(_this){
        $id = _this.attr('data-id')
        start_loader()
            $.ajax({
                url:_base_url_+'classes/Master.php?f=pin_bp_item',
                method:'POST',
                data:{id:$id,pinned:1},
                dataType:'json',
                success:function(resp){
                    if(resp.status == 'success'){
                        alert_toast("Backpack Item successfully pinned.",'success');
                        var el = $('.bp-item[data-id="'+$id+'"]').clone()
                            $('.bp-item[data-id="'+$id+'"]').remove()
                        el.find('.pin-item').removeClass('pin-item text-gray opacity-50').addClass('unpin-item')
                        if($('.unpin-item').length > 0)
                            $('.unpin-item:last').closest('.bp-item').after(el)
                        else
                            $('#bp-list').prepend(el);
                            el.find('.unpin-item').click(function(){
                                unpin($(this))
                            })
                        $('.modal').modal('hide')
                        el.find('.view_bp-item').click(function(){
                            uni_modal('Backpack Item View','backpack/view_file.php?redirect=true&id='+$(this).attr('data-id'),"mid-large")
                        })
                    }else{
                        alert_toast("Failed to unpinned the Backpack Item.",'error');
                    }
                    end_loader();
                }
            })
    }
    function unpin_bp_item($id){
        start_loader()
        $.ajax({
			url:_base_url_+'classes/Master.php?f=pin_bp_item',
			method:'POST',
			data:{id:$id,pinned:0},
			dataType:'json',
			success:function(resp){
				if(resp.status == 'success'){
					alert_toast("Backpack Item successfully unpinned.",'success');
                    var el = $('.bp-item[data-id="'+$id+'"]').clone()
                            $('.bp-item[data-id="'+$id+'"]').remove()
                    el.find('.unpin-item').removeClass('unpin-item').addClass('pin-item text-gray opacity-50')
                    if($('.pin-item').length > 0)
                    $('.pin-item:last').closest('.bp-item').before(el);
                    else
                    $('#bp-list').append(el);
                    el.find('.pin-item').click(function(){
                        pin($(this))
                    })
                    $('.modal').modal('hide')
                    el.find('.view_bp-item').click(function(){
                            uni_modal('Backpack Item View','backpack/view_file.php?redirect=true&id='+$(this).attr('data-id'),"mid-large")
                        })
				}else{
					alert_toast("Failed to unpinned the Backpack Item.",'error');
                }
                end_loader();
			}
		})
    }
</script>