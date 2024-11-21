<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Home extends Controller {

    public function __construct() {
        parent::__construct();
        
        if(! logged_in()) {
            redirect('auth');
        }

        //dinagdag ko lang
        $this->call->model('dashboard_model');
        $this->call->model('classes_model');
    }

    public function index() {
        // Retrieve user data from the model
        $data['userdata'] = $this->dashboard_model->read();
        
        // Pass $data to the 'homepage' view
        $this->call->view('homepage', $data);
    }
    

	// public function index() {
    //     $this->call->view('homepage');
    //     $data['userdata'] = $this->dashboard_model->read();
    //     $this->call->view('/home', $data);
    // }


    

    public function classes() {
        $this->call->view('classes');
    }
    public function sessions() {
        $this->call->view('sessions');
    }

    public function aboutus() {
        $this->call->view('aboutus');
    }

    public function class_form(){

        $this->call->view('addclasses');

        
    }

    public function create_class(){
        $class_name = $this->io->post('class_name');
        $instructor_name = $this->io->post('instructor_name');
        $class_time = $this->io->post('class_time');
        $available_slots = $this->io->post('available_slots');

        $this->classes_model->create($class_name, $instructor_name, $class_time, $available_slots);
        redirect('classes');

        

    }

    
    
//WAIT LANG TO
    public function read(){
        $data['userdata'] = $this->dashboard_model->read();
        $this->call->view('/home', $data);

    }
    
}
?>
