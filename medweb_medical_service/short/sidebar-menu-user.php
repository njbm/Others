<?php 

$menu_items = array(
   
    array(
        'title' => 'Medical Test',
        'icon' => "icon-lab",
        'link' => "blood-test-user.php",
		'id' => '2'
    ),
    array(
        'title' => 'Test Report',
        'icon' => "icon-files-empty",
        'link' => "my-test-report.php",
		'id' => '3'
    ),
    array(
        'title' => 'Doctor Category',
        'icon' => "icon-user-tie",
        'link' => "doctor-profile-user.php",
		'id' => '4'
    ),
    array(
        'title' => 'Appointemnt',
        'icon' => "icon-calendar3",
        'link' => "user_appointment.php",
		'id' => '5'
    ),
    array(
        'title' => 'Ambulence',
        'icon' => "icon-truck",
        'link' => "ambulence-request-user.php",
		'id' => '6'
    )
    );

    $sub_menus = array(
        
        array(
            'title' => 'Blood Test',
            'link' => "blood-test-user.php",
			'for' => '2'
        ),
        array(
            'title' => 'Urine Test',
            'link' => "blood-test-user.php",
			'for' => '2'
        ),
        array(
            'title' => 'X-Ray',
            'link' => "blood-test-user.php",
			'for' => '2'
        ),
        array(
            'title' => 'Endoscopy',
            'link' => "blood-test-user.php",
			'for' => '2'
        ),
        array(
            'title' => 'Biopsy',
            'link' => "blood-test-user.php",
			'for' => '2'
        ),
        array(
            'title' => 'Genetic Test',
            'link' => "blood-test-user.php",
			'for' => '2'
        ),
        array(
            'title' => 'Ultrasound Test',
            'link' => "blood-test-user.php",
			'for' => '2'
        ),
        array(
            'title' => 'My Test Report',
            'link' => "my-test-report.php",
			'for' => '3'
        ),
      
        array(
            'title' => 'Emergency physicians',
            'link' => "doctor-profile-user.php",
			'for' => '4'
        ),
        array(
            'title' => 'Psychiatrists',
            'link' => "doctor-profile-user.user",
			'for' => '4'
        ),
        array(
            'title' => 'Gynecologists',
            'link' => "doctor-profile-admin.user",
			'for' => '4'
        ),
        array(
            'title' => 'Neurologists',
            'link' => "doctor-profile-admin.user",
			'for' => '4'
        ),
        array(
            'title' => 'Radiologists',
            'link' => "doctor-profile-admin.user",
			'for' => '4'
        ),
        array(
            'title' => 'Anesthesiologists',
            'link' => "doctor-profile-admin.user",
			'for' => '4'
        ),
        array(
            'title' => 'Cardiologists',
            'link' => "doctor-profile-admin.user",
			'for' => '4'
        ),
        array(
            'title' => 'Make an Appointment',
            'link' => "user_appointment.php",
			'for' => '5'
        ),
        array(
            'title' => 'My Appointment',
            'link' => "my-appointment.php",
			'for' => '5'
        ),

        array(
            'title' => 'Ambulence Request',
            'link' => "ambulence-request-user.php",
			'for' => '6'
        ),
        array(
            'title' => 'My Ambulence',
            'link' => "my-ambulence.php",
			'for' => '6'
        )

    );
    require_once("../config.php");
    $fileData = file_get_contents($json."NavData.json");
    $data = json_decode($fileData, "true");
?>



<div class="card card-sidebar-mobile">
    <ul class="nav nav-sidebar" data-nav-type="accordion">

        <!-- Main -->
        <li class="nav-item-header">
            <div class="text-uppercase font-size-xs line-height-xs text-center">MENU</div> <i class="icon-menu"
                title="Main"></i>
        </li>
        <li class="nav-item">
            <a href="user-back-index.php" class="nav-link">
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
         <li class="nav-item">
            <a href="user-faq.php" class="nav-link">
                <i class="icon-question4"></i>
                <span>
                    FAQ's
                </span>
            </a>
        </li>
    </ul>


        <!-- <li class="nav-item-header">
            <div class="text-uppercase font-size-xs line-height-xs text-center">Menu</div> <i class="icon-menu"
                title="Main"></i>
        </li>
        <li class="nav-item">
            <a href="user-back-index.php" class="nav-link">
                <i class="icon-home4"></i>
                <span>
                    Dashboard
                </span>
            </a>
        </li>

        <?php foreach($menu_items as $key=>$menu_item){ ?>

        <li class="nav-item nav-item-submenu">
            <a href="<?=$menu_item['link']?>" class="nav-link">
                <i class="<?=$menu_item['icon']?>"></i>
                <span>
                    <?=$menu_item['title']?>
                </span>
            </a>

            <ul class="nav nav-group-sub" data-submenu-title="test components">
                <?php foreach($sub_menus as $sub_key=>$sub_menu){ ?>
                <?php if($sub_menu['for']==$menu_item['id']) { ?>
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

<!--
						
						<li class="nav-item nav-item-submenu">
							<a href="blood-test-user.php" class="nav-link"><i class="icon-lab"></i> <span>Medical Test</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="test components">
							<li class="nav-item"><a href="blood-test-user.php" class="nav-link">Blood Test</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Urine Test</a></li>
								<li class="nav-item"><a href="#" class="nav-link">X-Ray</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Endoscopy</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Biopsy</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Genetic Test</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Ultrasound Test</a></li>
								</ul>

						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-files-empty"></i> <span>Test Report</span></a>

						</li>
						<li class="nav-item nav-item-submenu">
							<a href="doctor-profile-user.php" class="nav-link"><i class="icon-user-tie"></i> <span>Doctor Category</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="doctor category">
								<li class="nav-item"><a href="doctor-profile-user.php" class="nav-link">Emergency physicians</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Psychiatrists</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Gynecologists</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Neurologists</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Radiologists</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Anesthesiologists</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Cardiologists</a></li>
								

							</ul>

						</li>
						<li class="nav-item nav-item-submenu">
							<a href="user_appointment.php" class="nav-link"><i class="icon-calendar3"></i> <span>Appointemnt</span></a>

						</li>
						<li class="nav-item nav-item-submenu">
							<a href="ambulence-request-user.php" class="nav-link"><i class="icon-truck"></i> <span>Ambulence</span></a>

						</li>

					</ul>
				</div> -->