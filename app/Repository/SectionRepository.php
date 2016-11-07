<?php
namespace App\Repositories;

use App\Models\NL_section;
use App\Models\NL_enroll;

class SectionRepository implements SectionRepositoryInterface {

    protected $section;
    protected $enroll;

    public function __construct(){
        $this->section = new NL_section();
        $this->enroll = new NL_enroll();
    }

    public function getSection(){
      $result = $this->section->get();
      return $result;
    }

    public function getSeat(){
      $result = $this->seat->get();
      return $result;
    }

    public function CreateSection($data){
      $this->section->insert(
        [
          'date' => $data['date'],
          'start_time' => $data['date'],
          'end_time' => $data['date']
        ]
      );
    }

    public function booking($std_id,$section,$rack,$seat){

      $this->enroll->insert([
        'std_id' => $std_id,
        'section_id' => $section,
        'rack' => $rack,
        'seat' => $seat,
      ]);
      
    }

}
