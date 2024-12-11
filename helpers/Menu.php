<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbartopleft = array(
		array(
			'path' => 'home', 
			'label' => 'Dashboard', 
			'icon' => '<i class="fa fa-dashboard "></i>'
		),
		
		array(
			'path' => 'acknowledgement/add', 
			'label' => 'Rsbsaforms', 
			'icon' => '','submenu' => array(
		array(
			'path' => 'trasmittal', 
			'label' => 'Trasmittal', 
			'icon' => ''
		),
		
		array(
			'path' => 'farmerslist', 
			'label' => 'RSBSA List', 
			'icon' => '<i class="fa fa-list-alt "></i>'
		)
	)
		),
		
		array(
			'path' => 'acknowledgement/add', 
			'label' => 'Add AR', 
			'icon' => '<i class="fa fa-server "></i>'
		),
		
		array(
			'path' => 'acknowledgement', 
			'label' => 'List', 
			'icon' => '<i class="fa fa-list "></i>'
		),
		
		array(
			'path' => 'region', 
			'label' => 'PSGC Library', 
			'icon' => '<i class="fa fa-book "></i>'
		),
		
		array(
			'path' => 'acknowledgment_receipt', 
			'label' => 'Liquadation', 
			'icon' => '<i class="fa fa-folder "></i>'
		),
		
		array(
			'path' => 'user', 
			'label' => 'User', 
			'icon' => '<i class="fa fa-user-plus "></i>'
		),
		
		array(
			'path' => 'rsbsa_list', 
			'label' => 'Rsbsa List', 
			'icon' => ''
		)
	);
		
	
	
			public static $Sex = array(
		array(
			"value" => "Male", 
			"label" => "Male", 
		),
		array(
			"value" => "Female", 
			"label" => "Female", 
		),);
		
			public static $role = array(
		array(
			"value" => "Admin", 
			"label" => "Admin", 
		),
		array(
			"value" => "Encoder", 
			"label" => "Encoder", 
		),);
		
			public static $Program = array(
		array(
			"value" => "Rice", 
			"label" => "Rice", 
		),
		array(
			"value" => "Corn", 
			"label" => "Corn", 
		),
		array(
			"value" => "HVCDP", 
			"label" => "HVCDP", 
		),
		array(
			"value" => "Organic", 
			"label" => "Organic", 
		),
		array(
			"value" => "Livestock", 
			"label" => "Livestock", 
		),
		array(
			"value" => "Halal", 
			"label" => "Halal", 
		),
		array(
			"value" => "DRRM", 
			"label" => "DRRM", 
		),
		array(
			"value" => "R&D", 
			"label" => "R&D", 
		),
		array(
			"value" => "TDIF", 
			"label" => "TDIF", 
		),
		array(
			"value" => "SDF", 
			"label" => "SDF", 
		),
		array(
			"value" => "NP", 
			"label" => "NP", 
		),);
		
			public static $Indicator = array(
		array(
			"value" => "Bags", 
			"label" => "Bags", 
		),
		array(
			"value" => "Liters", 
			"label" => "Liters", 
		),
		array(
			"value" => "Box", 
			"label" => "Box", 
		),
		array(
			"value" => "Bottles", 
			"label" => "Bottles", 
		),
		array(
			"value" => "Unit", 
			"label" => "Unit", 
		),
		array(
			"value" => "Rolls", 
			"label" => "Rolls", 
		),
		array(
			"value" => "Sachet", 
			"label" => "Sachet", 
		),
		array(
			"value" => "Pcs", 
			"label" => "Pcs", 
		),
		array(
			"value" => "Pack", 
			"label" => "Pack", 
		),
		array(
			"value" => "Container", 
			"label" => "Container", 
		),);
		
			public static $Fund_Source = array(
		array(
			"value" => "2019 RICE R & D PROGRAM", 
			"label" => "2019 RICE R & D PROGRAM", 
		),
		array(
			"value" => "BAA 2020", 
			"label" => "BAA 2020", 
		),
		array(
			"value" => "GAAB 2021", 
			"label" => "GAAB 2021", 
		),
		array(
			"value" => "GAAB 2022", 
			"label" => "GAAB 2022", 
		),
		array(
			"value" => "GAAB 2023", 
			"label" => "GAAB 2023", 
		),
		array(
			"value" => "GAAB 2024", 
			"label" => "GAAB 2024", 
		),
		array(
			"value" => "GAA 2023(NFP)", 
			"label" => "GAA 2023(NFP)", 
		),
		array(
			"value" => "TDIF 2020", 
			"label" => "TDIF 2020", 
		),
		array(
			"value" => "TDIF 2021", 
			"label" => "TDIF 2021", 
		),
		array(
			"value" => "TDIF 2022", 
			"label" => "TDIF 2022", 
		),
		array(
			"value" => "TDIF 2023", 
			"label" => "TDIF 2023", 
		),
		array(
			"value" => "DRRM 2020", 
			"label" => "DRRM 2020", 
		),
		array(
			"value" => "DRRM 2021", 
			"label" => "DRRM 2021", 
		),
		array(
			"value" => "DRRM 2022", 
			"label" => "DRRM 2022", 
		),
		array(
			"value" => "DRRM 2023", 
			"label" => "DRRM 2023", 
		),);
		
}