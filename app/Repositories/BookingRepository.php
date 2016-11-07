<?php
namespace App\Repositories;

use App\Models\NL_section;
use App\Models\NL_enroll;

class BookingRepository implements BookingRepositoryInterface {

    protected $section;
    protected $enroll;

    public function __construct(){
        $this->section = new NL_section();
        $this->enroll = new NL_enroll();
    }

    public function getSection($id){
      $result = $this->section->where('section_id',$id)->get()->first();

      array_add($result,'rack',[
        '1' => $this->getRackBySection($id,1),
        '2' => $this->getRackBySection($id,2),
        '3' => $this->getRackBySection($id,3),
        '4' => $this->getRackBySection($id,4),
        '5' => $this->getRackBySection($id,5),
        '6' => $this->getRackBySection($id,6),
        '7' => $this->getRackBySection($id,7),
        '8' => $this->getRackBySection($id,8),
      ]);

      return $result;
    }

    public function getRackBySection($id,$rack){
      $result = $this->enroll->where([
        ['section_id','=',$id],
        ['rack','=',$rack]
      ])->get()->first();

      return $result;
    }
}
