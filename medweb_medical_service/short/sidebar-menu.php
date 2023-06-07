
<?php

$menu_items = array(
    array(
        'title' => 'Patient Entry',
        'icon' => "icon-user-plus",
        'link' => "patient-list.php",
		'id' => '2'
    ), 
    array(
        'title' => 'Bed Allotment',
        'icon' => "icon-enter",
        'link' => "bed_allotment_list.php",
		'id' => '3'
    ),
    array(
        'title' => 'Medical Test',
        'icon' => "icon-lab",
        'link' => "blood-test-admin.php",
		'id' => '4'
    ),
    array(
        'title' => 'Test Report',
        'icon' => "icon-files-empty",
        'link' => "test-report-list.php",
		'id' => '5'
    ),
    array(
        'title' => 'Doctor Category',
        'icon' => "icon-user-tie",
        'link' => "doctor-profile-admin.php",
		'id' => '6'
    ),
    array(
        'title' => 'Appointemnt',
        'icon' => "icon-calendar3",
        'link' => "appointment-list.php",
		'id' => '7'
    ),
    array(
        'title' => 'Ambulence',
        'icon' => "icon-truck",
        'link' => "ambulence-req-check.php",
		'id' => '8'
    )
    );

    $sub_menus = array(

        array(
            'title' => 'All Patient List',
            'link' => "patient-list.php",
			'for' => '2'
        ),
        array(
            'title' => 'Add a New Patient',
            'link' => "add-patient.php",
			'for' => '2'
        ),
        array(
            'title' => 'Bed Allotment List',
            'link' => "bed_allotment_list.php",
			'for' => '3'
        ),
        array(
            'title' => 'Bed Allotment Management',
            'link' => "bed_management.php",
			'for' => '3'
        ),
        array(
            'title' => 'Blood Test',
            'link' => "blood-test-admin.php",
			'for' => '4'
        ),
        array(
            'title' => 'Urine Test',
            'link' => "blood-test-admin.php",
			'for' => '4'
        ),
        array(
            'title' => 'X-Ray',
            'link' => "blood-test-admin.php",
			'for' => '4'
        ),
        array(
            'title' => 'Endoscopy',
            'link' => "blood-test-admin.php",
			'for' => '4'
        ),
        array(
            'title' => 'Biopsy',
            'link' => "blood-test-admin.php",
			'for' => '4'
        ),
        array(
            'title' => 'Genetic Test',
            'link' => "blood-test-admin.php",
			'for' => '4'
        ),
        array(
            'title' => 'Ultrasound Test',
            'link' => "blood-test-admin.php",
			'for' => '4'
        ),
        array(
            'title' => 'Upload Test Report',
            'link' => "test-report upload.php",
			'for' => '5'
        ),
        array(
            'title' => 'See All Test Reports',
            'link' => "test-report-list.php",
			'for' => '5'
        ),
        array(
            'title' => 'Emergency physicians',
            'link' => "doctor-profile-admin.php",
			'for' => '6'
        ),
        array(
            'title' => 'Psychiatrists',
            'link' => "doctor-profile-admin.php",
			'for' => '6'
        ),
        array(
            'title' => 'Gynecologists',
            'link' => "doctor-profile-admin.php",
			'for' => '6'
        ),
        array(
            'title' => 'Neurologists',
            'link' => "doctor-profile-admin.php",
			'for' => '6'
        ),
        array(
            'title' => 'Radiologists',
            'link' => "doctor-profile-admin.php",
			'for' => '6'
        ),
        array(
            'title' => 'Anesthesiologists',
            'link' => "doctor-profile-admin.php",
			'for' => '6'
        ),
        array(
            'title' => 'Cardiologists',
            'link' => "doctor-profile-admin.php",
			'for' => '6'
        ),
        array(
            'title' => 'All Appoinment List',
            'link' => "appointment-list.php",
			'for' => '7'
        ),
        array(
            'title' => 'Appointment Management',
            'link' => "add-appointment.php",
			'for' => '7'
        ),

        array(
            'title' => 'Ambulence Management',
            'link' => "add-ambulence-admin.php",
			'for' => '8'
        ),
        array(
            'title' => 'Ambulence Request',
            'link' => "ambulence-req-check.php",
			'for' => '8'
        )

    );

    require_once("../config.php");
    $fileData = file_get_contents($json."adminNavData.json");
    $data = json_decode($fileData, "true");

?>
<!-- Main navigation -->
<div class="card card-sidebar-mobile">
    <ul class="nav nav-sidebar" data-nav-type="accordion">
                <!-- Main -->
                <li class="nav-item-header">
            <div class="text-uppercase font-size-xs line-height-xs text-center">MENU</div> <i class="icon-menu" title="Main"></i>
        </li>
        <li class="nav-item">
							<a href="back-index.php" class="nav-link">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
                        
                <?php 
                foreach($data as $nav){
                ?>
                <li class="nav-item nav-item-submenu ">
                    <a href="" class="nav-link">
                        <i class="<?= $nav['icon']?>"></i>
                        <span>
                            <?= $nav['title']?>
                        </span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="<?= $nav['title']?>">
                        <?php 
                foreach($nav['sub']['title'] as $subName=>$subLink){
                ?>
                        <li class="nav-item"><a href="<?= $subLink?>" class="nav-link"><?= $subName?></a></li>
                        <?php
                }
                ?>
                    </ul>
                </li>
                <?php
                }
                ?>
                <!-- Frontend Menu -->
                <?php

                 $frontFileData = file_get_contents($json."adminNavData-Front.json");
                 $arr_front = json_decode($frontFileData, "true");
                 //dd($arr_front);
?>               
                <!-- Main -->
                <li class="nav-item-header">
            <div class="text-uppercase font-size-xs line-height-xs text-center">FRONTEND MANAGEMENT</div> <i class="icon-menu" title="Main"></i>
        </li>                       
                <?php 
                foreach($arr_front as $front_nav){
                ?>
                <li class="nav-item nav-item-submenu ">
                    <a href="" class="nav-link">
                        <i class="<?= $front_nav['icon']?>"></i>
                        <span>
                            <?= $front_nav['title']?>
                        </span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="<?= $front_nav['title']?>">
                        <?php 
                foreach($front_nav['sub']['title'] as $subFrontName=>$subFrontLink){
                ?>
                        <li class="nav-item"><a href="<?= $subFrontLink?>" class="nav-link"><?= $subFrontName?></a></li>
                        <?php
                }
                ?>
                    </ul>
                </li>
                <?php
                }
                ?>
                <li class="nav-item">
							<a href="contact-list.php" class="nav-link" data-submenu-title="Contact">
								<i class="icon-phone2"></i>
								<span>
									Contact
								</span>
							</a>
						</li>

        <!-- Main -->
        <!-- <li class="nav-item-header">
            <div class="text-uppercase font-size-xs line-height-xs text-center">Menu</div> <i class="icon-menu" title="Main"></i>
        </li>
        <li class="nav-item">
							<a href="back-index.php" class="nav-link">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
        <?php
			foreach($menu_items as $key=>$menu_item)
				{
			?>
            <li class="nav-item nav-item-submenu">
            <a href="<?=$menu_item['link']?>" class="nav-link ">
                <i class="<?=$menu_item['icon']?>"></i>
                <span>
                    <?=$menu_item['title']?>
                </span>
            </a>
            <ul class="nav nav-group-sub" data-submenu-title="test components">
                <?php foreach($sub_menus as $sub_key=>$sub_menu){
					if($sub_menu['for'] == $menu_item['id'] ){
				?>
                <li class="nav-item"><a href="<?=$sub_menu['link']?>" class="nav-link"><?=$sub_menu['title']?></a></li>
                <?php
				}
			} 
			?>
            </ul>
        </li>
        <?php
		}
		?>
    </ul> -->
</div>
