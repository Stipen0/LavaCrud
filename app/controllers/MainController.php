<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class MainController extends Controller {
    
    public function home(){
        $this->call->model('Main_model');
        $data['info'] = $this->Main_model->getInfo();
        $this->call->view('home',$data);
    }
    public function add(){
        $studentID = $this->io->post('studentID');
        $FullName = $this->io->post('FullName');
        $YearLevel = $this->io->post('YearLevel');
        $Program = $this->io->post('Program');
        $bind = array(
            "studentID" => $studentID,
            "FullName" => $FullName,
            "YearLevel" => $YearLevel,
            "Program" => $Program,
        );
        $this->db->table('tblinfo')->insert($bind);
        redirect('/home');
    }
    public function delete($id)
    {
        if(isset($id)){
            $this->db->table('tblinfo')->where("id", $id)->delete();
            redirect('/home');
        }
        else{
            $_SESSION['delete'] = "FAILED";
            redirect('/home');
        }
        
    }
    public function edit($id)
    {
        $this->call->model('Main_model');
        $data['info'] = $this->Main_model->getInfo();
        $data['edit'] = $this->Main_model->searchIDInfo($id);
        $this->call->view('home', $data);
    }
    public function submitedit($id)
    {
        if(isset($id))
        {
        $studentID = $this->io->post('studentID');
        $FullName = $this->io->post('FullName');
        $YearLevel = $this->io->post('YearLevel');
        $Program = $this->io->post('Program');
        $data = [
            "studentID" => $studentID,
            "FullName" => $FullName,
            "YearLevel" => $YearLevel,
            "Program" => $Program,
        ];
        $this->db->table('tblinfo')->where("id", $id)->update($data);
        redirect('/home');    
        }
        
    }
}
?>
