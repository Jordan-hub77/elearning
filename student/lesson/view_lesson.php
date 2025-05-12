<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif; ?>
<?php
$id = isset($_GET['id']) ? $_GET['id']: '';
if(!empty($id)){
    $qry = $conn->query("SELECT l.*,CONCAT(f.firstname,' ',f.middlename,' ',f.lastname) as fname, CONCAT(s.subject_code,' - ',s.description) as subj FROM lessons l inner join faculty f on f.faculty_id = l.faculty_id inner join subjects s on s.id = l.subject_id where l.id = $id");
    foreach($qry->fetch_array() as $k =>$v){
        if(!is_numeric($k)){
            $$k = $v;
        }
    }
    $description = stripslashes($description);
}
?>
<style>
#carousel_holder{
display: inline-flex;
justify-content:center;
background: #2f2e2e;
}    
#lesson_slides{
    width:calc(50%);
}
.carousel-control-prev {
    left: calc(-30%);
}
.carousel-control-next {
    right: calc(-30%);
}

.pdf_viewer{
    width:100%;
    height: 80vh;
}
video.note-video-clip {
    width: 100%;
    height: 62vh;
    background: #000000d9;
    object-fit: contain;
}
</style>
<div class="card card-outline cardprimary w-fluid">
	<div class="card-header">
		<h3 class="card-title"><?php echo isset($title) ? $title : '' ?></h3>
        <div class="card-tools">
            <button class="btn btn-sm btn-flat btn-primary" type="button" id="my_backpack">My Backpack</button>
        </div>
	</div>
	<div class="card-body">
        <div class="w-100">
            <div class="col-md-12">
                <span class="truncate float-right" style="max-width:calc(50%);font-size:13px !important;font-weight:bold">Subject: <?php echo $subj ?></span>
            </div>
        </div>
        <br>
        <div id="carousel_holder" class="w-100">
            <div id="lesson_slides" class="carousel slide" data-ride="carousel" data-interval="0">
                <div class="carousel-inner">
                    <?php 
                    $slides = scandir(base_app.'uploads/slides/lesson_'.$id);
                    foreach($slides as $k =>$v){
                        if(in_array($slides[$k],array('.','..')))
                        unset($slides[$k]);
                    }
                    $active ="active";
                    foreach($slides as $k =>$v):
                    ?>
                    <div class="carousel-item <?php echo $active; $active=""; ?>">
                    <img class="d-block w-100" src="<?php echo validate_image('uploads/slides/lesson_'.$id.'/'.$slides[$k]) ?>" alt="">
                    </div>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#lesson_slides" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#lesson_slides" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <br>
        <div class="container-fluid" id="lesson-content">
        <h5>Description</h5>
        <hr>
        <div>
        <?php 
        $pdf_pattern  = "<iframe src='".base_url."faculty/file_uploads/view_pdf.php?path=$2' class='pdf_viewer' title='PDF Viewer'></iframe>";
        echo (preg_replace("/(\[pdf_view\spath\s=\s+)([a-zA-Z0-9\/.]+)(\])/",$pdf_pattern,html_entity_decode($description)));
         ?>
        </div>
        <hr>
        <div class="w-100">
            <div class="col-md-12">
            <span class="float-right"><b>Prepared By: </b><?php echo $fname ?></span>
            </div>
        </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        var _content = $('#lesson-content');

        _content.find("video.note-video-clip, img,iframe.pdf_viewer").each(function(){
            var _el = $(this)
            var _type = _el.get(0).nodeName
            var src = _el.attr('src')
                if(_type == 'IFRAME'){
                src = src.split("?path=")[1];
                }
                src = src.replace("<?php echo base_url ?>","")
            var new_container = $('<span>')
                new_container.attr("style",_el.attr('style'))
                new_container.append(_el.clone().attr('style',"").css("width","100%"))
                new_container.addClass('m-1')
            var _btn_container = $('<div class="mb-1 button_fields d-flex justify-content-end">')
            var backpack_btn = $('<button class="btn btn-sm btn-default px-1 py-0 to_backpack" type="button" data-src="'+src+'">')
                backpack_btn.html('<i class="fa fa-plus"></i> Add to Backpack')
            _btn_container.append(backpack_btn)
            new_container.append(_btn_container);
            _el.replaceWith(new_container)

            backpack_btn.click(function(){
                uni_modal("Add to Backpack","backpack/add_file.php?lesson_id=<?php echo $id ?>&file_path="+src,"mid-large")
            })

        })

        $('#my_backpack').click(function(){
            uni_modal("My Backpack Items for <?php echo $title ?> lesson",'backpack/per_lesson.php?lesson_id=<?php echo $id ?>','mid-large')
        })
    })
</script>