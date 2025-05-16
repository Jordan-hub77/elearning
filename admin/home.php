<h1>Welcome to <?php echo $_settings->info('name') ?></h1>
<?php

// Pata takwimu kutoka kwenye database
$students_count = $conn->query("SELECT COUNT(id) as total FROM students")->fetch_assoc()['total'];
$courses_count = $conn->query("SELECT COUNT(id) as total FROM course")->fetch_assoc()['total'];
$programs_count = $conn->query("SELECT COUNT(id) as total FROM subjects")->fetch_assoc()['total'];
$faculties_count = $conn->query("SELECT COUNT(id) as total FROM faculty")->fetch_assoc()['total'];
$class_count = $conn->query("SELECT COUNT(id) as total FROM class")->fetch_assoc()['total'];
$department_count = $conn->query("SELECT COUNT(id) as total FROM department")->fetch_assoc()['total'];
$users_count = $conn->query("SELECT COUNT(id) as total FROM users")->fetch_assoc()['total'];

?>

<div class="row">
    <!-- Card ya Wanafunzi -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?php echo number_format($students_count) ?></h3>
                <p>Total Students</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-stalker"></i>
            </div>
            <a href="./?page=students" class="small-box-footer">Angalia zaidi <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <!-- Card ya Masomo -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?php echo number_format($courses_count) ?></h3>
                <p>Total Courses</p>
            </div>
            <div class="icon">
                <i class="ion ion-document-text"></i>
            </div>
            <a href="./?page=courses" class="small-box-footer">Angalia zaidi <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <!-- Card ya Kozi -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?php echo number_format($programs_count) ?></h3>
                <p>Total Subject</p>
            </div>
            <div class="icon">
                <i class="ion ion-university"></i>
            </div>
            <a href="./?page=programs" class="small-box-footer">Angalia zaidi <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?php echo number_format($class_count) ?></h3>
                <p>Total Classes</p>
            </div>
            <div class="icon">
                <i class="ion ion-university"></i>
            </div>
            <a href="./?class=programs" class="small-box-footer">Angalia zaidi <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?php echo number_format($department_count) ?></h3>
                <p>Total department</p>
            </div>
            <div class="icon">
                <i class="ion ion-university"></i>
            </div>
            <a href="./?class=programs" class="small-box-footer">Angalia zaidi <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?php echo number_format($users_count) ?></h3>
                <p>Total Staffs</p>
            </div>
            <div class="icon">
                <i class="ion ion-university"></i>
            </div>
            <a href="./?class=programs" class="small-box-footer">Angalia zaidi <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <!-- Card ya Faculty -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?php echo number_format($faculties_count) ?></h3>
                <p>Total Faculty</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-home"></i>
            </div>
            <a href="./?page=faculties" class="small-box-footer">Angalia zaidi <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div> 
  