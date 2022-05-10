<?php

use App\Models\ContactUsPage;
use App\Models\User;
use App\Models\Training;
use App\Models\Team;
use App\Models\LetUsKnow;

function TrainingCountWithCat($id){
    $train_count_cat = Training::where('tcat_id',$id)->count();
    if($train_count_cat > 0){
        return $train_count_cat;
    }
}
function Off($r_p, $s_p){
    $discount = $r_p - $s_p;
    $off =  floor(($discount * 100) /$r_p);
    return $off;
    }
function contactUsPageCount(){
    $count = ContactUsPage::where('status',1)->count();
   return $count;
}
function teamCount(){
    $count = Team::where('status',1)->count();
   return $count;
}
?>