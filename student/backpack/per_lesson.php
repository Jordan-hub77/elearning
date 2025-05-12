<?php
require_once('../../config.php');

    $backpack = $conn->query("SELECT * FROM `backpack` where lesson_id = '{$_GET['lesson_id']}' and `student_id` = '{$_settings->userdata('id')}' ");
    if(isset($conn->error) && !empty($conn->error))
    echo $conn->error;
    $result = $backpack->fetch_all(MYSQLI_ASSOC);
    $file_ids = array_column($result,'upload_file_id');
    $list = array();
        foreach($result as $row){
            $list[$row['upload_file_id']] = $row;
        }
    if(count($file_ids) > 0){
    $files_query = $conn->query("SELECT `filename`,`file_path`,id as file_id FROM `upload_files` where id in (".implode(',',$file_ids).")");
    if(isset($conn->error) && !empty($conn->error))
    echo $conn->error;
        while($row = $files_query->fetch_assoc()){
            foreach($row as $k => $v):
            $list[$row['file_id']][$k] = $v;
            endforeach;
        }
    }
?>
<style>
    table#bpack-list tr{
        cursor:pointer
    }
    #uni_modal .modal-footer{
        display:none;
    }
</style>
<div class="contriner-fluid">
    <table class="table-hover table-striped" id="bpack-list">
        <colgroup>
            <col width="25%">
            <col width="25%">
            <col width="25%">
            <col width="25%">
        </colgroup>
        <thead>
            <tr>
                <th class="p-0">Title</th>
                <th class="p-0">Description</th>
                <th class="p-0">file Name</th>
                <th class="p-0">Date Added</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($list as $row):
            ?>
                <tr class="list-item" data-id="<?php echo $row['id'] ?>">
                    <td class="p-0"><?php echo $row['title'] ?></td>
                    <td class="p-0 truncate-1"><?php echo $row['description'] ?></td>
                    <td class="p-0"><?php echo $row['filename'] ?></td>
                    <td class="p-0"><?php echo $row['date_created'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        
    </table>
    <div class="row justify-content-end">
        <div class="col-auto my-1">
            <button class="btn btn-default btn-flat btn-sm" data-dismiss="modal" type="button">Close</button>
        </div>
    </div>
</div>
<script>
    $(function(){
       $('.list-item').click(function(){
           uni_modal('Backpack Item View','backpack/view_file.php?id='+$(this).attr('data-id'),"mid-large")
       })
    })
</script>