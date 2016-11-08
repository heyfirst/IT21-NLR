<?php
namespace App\Repositories;

use App\Models\NL_section;
use App\Models\NL_enroll;
use Carbon;

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
      $result = array(
          '1' => $this->enroll
            ->join('users','users.id','=','nl_enrolls.id')
            ->where([
              ['section_id','=',$id],
              ['rack','=',$rack],
              ['seat','=','1']
            ])->first(),
          '2' => $this->enroll
            ->join('users','users.id','=','nl_enrolls.id')
            ->where([
              ['section_id','=',$id],
              ['rack','=',$rack],
              ['seat','=','2']
            ])->first(),
          '3' => $this->enroll
            ->join('users','users.id','=','nl_enrolls.id')
            ->where([
              ['section_id','=',$id],
              ['rack','=',$rack],
              ['seat','=','3']
            ])->first()
        );

      return $result;
    }

    public function booking($user,$data){
      $id = $this->enroll->insertGetId([
          'id' => $user['id'],
          'section_id' => $data['section_id'],
          'rack' => $data['rack'],
          'seat' => $data['seat']
        ]);

      return $id;
    }

    public function validateBooking($data){
      $valid = $this->enroll->where([
                    ['section_id', '=', $data['section_id']],
                    ['rack', '=', $data['rack']],
                    ['seat', '=', $data['seat']]
                ])->get()->count();

      return $valid;
    }

    public function validateDayBooking($user,$data){

      $section = $this->section->where('section_id',$data['section_id'])->get()->first();

      $valid = $this->enroll
                ->join('nl_sections','nl_sections.section_id','=','nl_enrolls.section_id')
                ->where([
                    ['nl_enrolls.id', '=', $user['id']],
                    ['nl_sections.date', '=',$section['date']],
                ])
                ->get()
                ->count();
      return $valid;
    }

    public function cancelSeat($user,$data){
      $result = $this->enroll->where([
          ['id' ,'=', $user['id']],
          ['section_id', '=', $data['section_id']],
          ['rack', '=', $data['rack']],
          ['seat', '=', $data['seat']]
      ])->delete();

      return $result;
    }

    public function alreadyDone($section){
      $query = $this->section->where([
          ['section_id','=',$section],
          ['date','>=',Carbon\Carbon::now('Asia/Bangkok')->toDateString()],
          ['start_time','<',Carbon\Carbon::now('Asia/Bangkok')->toTimeString()],
        ])->get()->first();

      if ($query == null) {
        return false;
      }
      return true;
    }
}
