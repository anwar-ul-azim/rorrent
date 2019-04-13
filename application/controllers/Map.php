<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller                //library --2file ,view show_map,controller map, model map_model
{
	public function __construct()
	{
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Home_model');
       // $this->load->model('Map_model');    /////create a map model
        $this->load->library('form_validation');
    }
	
	public function index()
	{
		$data["results"] = $this->Home_model->get_home_info();
		$this->load->library('googlemaps');

		$config['center'] = '23.8149, 90.4260';
		$config['zoom'] = 'auto';
		$config['onclick'] = 'alert(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
		$config['directions'] = TRUE;
		$config['directionsStart'] = '23.8149, 90.4260';
		$config['directionsEnd'] = '23.816747, 90.428165';
		$config['directionsDivID'] = 'directionsDiv';

		$this->googlemaps->initialize($config);

		//for marker
// maarker 1
		// $marker = array();
		// $marker['position'] = '23.816747, 90.428165';
		// $marker['animation'] ="DROP";
		// //$marker['onclick'] = 'alert("You just clicked me!!")';
		// $marker['infowindow_content']='full house/3bed';
		// $marker['draggable']=TRUE;
		// $marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
		// $this->googlemaps->add_marker($marker);
// //marker 2
// 		$marker = array();
// 		$marker['position'] = '23.816354, 90.428536';
// 		$marker['animation'] ="BOUNCE";
// 		$marker['infowindow_content']='full house/2bed';
// 		$marker['draggable']=TRUE;
// 		$this->googlemaps->add_marker($marker);

// //marker 3
// 		$marker = array();
// 		$marker['position'] = '23.816089, 90.429232';
// 		$marker['animation'] ="BOUNCE";
// 		$marker['infowindow_content']='sublet/1bed';
// 		$marker['draggable']=TRUE;
// 		$this->googlemaps->add_marker($marker);
		 

		if ($data!=false): 
            foreach ($data["results"] as $datas): 
                $marker = array();
 				$marker['position'] = $datas['info']['ADDRESS'];
 				$marker['animation'] ="DROP"; 
 				$marker['infowindow_content']= $datas['info']['BASE_RENT']."TK TYPE:".$datas['TYPE'];
 				$marker['draggable']=TRUE;
 				$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
 				// if ($datas['TYPE']==0):
 			 	//$marker['onclick'] = $row['info']['FLAT_ID'];
 				// else :
 				// 	$marker['onclick'] = $row['info']['ROOM_ID'];
 				// endif;
				$this->googlemaps->add_marker($marker);      
               
			endforeach ;
		endif ;


		$data['map'] = $this->googlemaps->create_map();


		$this->load->view('templates/header');

		$this->load->view('showMap' , $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/footer');
		
	}
}
