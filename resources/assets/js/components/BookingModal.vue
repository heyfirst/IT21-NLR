<template>
  <div class="">
    {{ sectionId }}
  </div>
  <!-- <div class="container booking" data-section-id="{{$section['section_id']}}">
    <div class="panel">
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-12">
            <h3>ROUND {{$section['section_id']}} : <span>{{ date('D d ,F', strtotime($section['date'])) }}</span></h3>
            <h4 class="time">START <span>{{ date('g:i A', strtotime($section['start_time'])) }}</span></h4>
            <h4 class="time">END <span>{{ date('g:i A', strtotime($section['end_time'])) }}</span></h4>
            <hr>
          </div>
        </div>
        <div class="rack-list">
          @foreach ($section['rack'] as $key => $rack)
            <div class="row rack" data-rack="{{ $key }}">
              <div class="col-sm-3">
                <h4><i class="fa fa-server" aria-hidden="true"></i> RACK NO.{{ $key }}</h4>
              </div>
              @for ($i = 1; $i <= 3; $i++)
                <div class="col-sm-3">
                  <booking-button
                    username="{{ (isset($rack[$i]) && $rack[$i]['seat'] == $i )? $rack[$i]['name'] : "" }}"
                    isowner="{{($rack[$i]['name'] == $user['name'])?"yes":""}}"
                    seat="{{$i}}" >
                  </booking-button>
                </div>
              @endfor
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div> -->
</template>

<script>
    export default {
        mounted() {
            console.log('Component ready.')
        },
        data :{

        },
        props: ['sectionId'],
    }
</script>
