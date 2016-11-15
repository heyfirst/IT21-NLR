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

    public function getCountEnrollBySection($section,$rack){
      $result = $this->enroll->where([
        ['section_id' ,'=', $section],
        ['rack' ,'=', $rack]
        ])->get()->count();

      $result = $result/3*100;
      return $result;
    }

    public function getSectionRemain($section){
      $result = $this->enroll->where([
        ['section_id' ,'=', $section],
        ])->get()->count();

      $result = 24-$result;
      return $result;
    }

    public function CreateSection($data){
      $this->section->insert(
        [
          'date' => $data['date'],
          'start_time' => $data['start'],
          'end_time' => $data['end']
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

    public function checkYouAreIn($section,$user){
      $result = $this->enroll->where([
        ['section_id' ,'=', $section],
        ['id' ,'=', $user['id']]
        ])->get()->count();

      return ($result > 0);
    }


}
