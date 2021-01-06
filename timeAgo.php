<?php
  function timeAgo($time) {
    $time_ago = strtotime($time);
    $cur_time = time();
    $time_elapsed = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );

    //segons
    if($seconds <= 60){ return "Ara mateix"; }

    //minuts
    else if($minutes <=60){
      if($minutes==1){ return "fa un minut"; }
      else{ return "fa $minutes minuts"; }
    }

    //hores
    else if($hours <=24){
      if($hours==1){ return "fa una hora"; }
      else{ return "fa $hours hores"; }
    }

    //dies
    else if($days <= 7){
      if($days==1){ return "Ahir"; }
      else{ return "fa $days dies";}
    }

    //setmanes
    else if($weeks <= 4.3){
      if($weeks==1){ return "fa una setmana"; }
      else{ return "fa $weeks setmanes"; }
    }

    //mesos
    else if($months <=12){
      if($months==1){ return "fa un mes"; }
      else{ return "fa $months mesos"; }
    }

    //anys
    else{
      if($years==1){ return "fa un any"; }
      else{ return "fa $years anys"; }
    }
  }
?>
