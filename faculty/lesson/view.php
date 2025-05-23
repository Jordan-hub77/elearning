<?php if ($_settings->chk_flashdata('success')): ?>
<script>
    alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success');
</script>
<?php endif; ?>

<?php
$id = isset($_GET['id']) ? intval($_GET['id']) : '';
if (!empty($id)) {
    $qry = $conn->query("SELECT l.*, CONCAT(f.firstname,' ',f.middlename,' ',f.lastname) as fname, CONCAT(s.subject_code,' - ',s.description) as subj 
        FROM lessons l 
        INNER JOIN faculty f ON f.faculty_id = l.faculty_id 
        INNER JOIN subjects s ON s.id = l.subject_id 
        WHERE l.id = $id");

    if ($qry && $qry->num_rows > 0) {
        foreach ($qry->fetch_array() as $k => $v) {
            if (!is_numeric($k)) {
                $$k = $v;
            }
        }
        $description = stripslashes($description);
    }
}
?>

<style>
#carousel_holder {
    display: inline-flex;
    justify-content: center;
    background: #2f2e2e;
}
#lesson_slides {
    width: 50%;
}
.carousel-control-prev {
    left: -30%;
}
.carousel-control-next {
    right: -30%;
}
.pdf_viewer {
    width: 100%;
    height: 80vh;
}
video.note-video-clip {
    width: 100%;
    height: 62vh;
    background: #000000d9;
    object-fit: contain;
}
</style>

<div class="card card-outline card-primary w-fluid">
    <div class="card-header">
        <h3 class="card-title"><?php echo isset($title) ? $title : '' ?></h3>
        <div class="card-tools">
            <a class="btn btn-block btn-sm btn-default btn-flat border-primary edit_lesson" href="./?page=lesson/manage_lesson&id=<?php echo $id ?>"><i class="fa fa-edit"></i> Edit Lesson</a>
        </div>
    </div>

    <div class="card-body">
        <div class="w-100">
            <div class="col-md-12">
                <span class="truncate float-right" style="max-width:calc(50%);font-size:13px !important;font-weight:bold">Subject: <?php echo $subj ?></span>
            </div>
        </div>
        <br>

        <!-- Slide Section -->
        <div id="carousel_holder" class="w-100">
            <div id="lesson_slides" class="carousel slide" data-ride="carousel" data-interval="0">
                <div class="carousel-inner">
                    <?php 
                    // Fetch slides from database
                    $valid_slides = [];
                    $get_lesson_file_sql = "SELECT file_path FROM `lesson_files` WHERE lesson_id = '$id'";
                    $get_lesson_file_query = mysqli_query($conn, $get_lesson_file_sql);

                    if ($get_lesson_file_query && mysqli_num_rows($get_lesson_file_query) > 0) {
                        while ($row = mysqli_fetch_assoc($get_lesson_file_query)) {
                            $valid_slides[] =  base_url.'uploads/lessons/'.$row['file_path'];
                        }
                    }

                    if (count($valid_slides) > 0):
                        $active = "active";
                        foreach ($valid_slides as $slide):
                    ?>
                        <div class="carousel-item <?php echo $active; $active = ""; ?>">
                            <img class="d-block w-100" src="<?php echo $slide ?>" alt="Lesson Slide">
                        </div>
                    <?php 
                        endforeach;
                    else: ?>
                        <div class="text-center w-100 py-5 text-light">
                            <em>No slides uploaded for this lesson.</em>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if (count($valid_slides) > 1): ?>
                <a class="carousel-control-prev" href="#lesson_slides" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#lesson_slides" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <?php endif; ?>
            </div>
        </div>

        <br>

        <!-- Description -->
        <div class="container-fluid">
            <h5>Description</h5>
            <hr>
            <div>
                <?php 
                $pdf_pattern = "<iframe src='" . base_url . "faculty/file_uploads/view_pdf.php?path=$2' class='pdf_viewer' title='PDF Viewer'></iframe>";
                echo preg_replace("/(\[pdf_view\spath\s=\s+)([a-zA-Z0-9\/_.-]+)(\])/i", $pdf_pattern, html_entity_decode($description));
                ?>
            </div>
            <hr>

            <!-- Class visibility -->
            <section>
                <div class="w-100">
                    <h5>This is visible to:</h5>
                    <hr>
                    <?php 
                    $class = $conn->query("SELECT cs.*, d.department, CONCAT(co.course,' ',c.level,'-',c.section) as class, s.subject_code, s.description 
                        FROM class_subjects_faculty cs 
                        INNER JOIN class c ON c.id = cs.class_id 
                        INNER JOIN subjects s ON s.id = cs.subject_id 
                        INNER JOIN department d ON d.id = c.department_id 
                        INNER JOIN course co ON co.id = c.course_id 
                        WHERE cs.faculty_id = '{$faculty_id}' 
                        AND cs.academic_year_id = '{$academic_year_id}' 
                        AND cs.class_id IN (SELECT class_id FROM lesson_class WHERE lesson_id = $id) 
                        GROUP BY cs.class_id");

                    while ($row = $class->fetch_assoc()):
                    ?>
                        <span class="badge badge-primary m-1" style="font-size:12px"><?php echo $row['class'] ?></span>
                    <?php endwhile; ?>
                </div>
            </section>

            <hr>

            <!-- Prepared by -->
            <div class="w-100">
                <div class="col-md-12">
                    <span class="float-right"><b>Prepared By:</b> <?php echo $fname ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
