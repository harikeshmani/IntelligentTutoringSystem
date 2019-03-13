<?php
include("auth.php");
$user_id = $_SESSION['userid'];
if (isset($_POST["insert"]))
{
$score1 = $_POST['val1'];
$score2 = $_POST['val2'];
$score3 = $_POST['val3'];
$score4 = $_POST['val4'];
$score5 = $_POST['val5'];
$score6 = $_POST['val6'];
$id = $_POST['val7'];
//$question3 = $_POST['val1'];
$sql = "INSERT INTO tbl_intelligence (user_id, self_awareness_score, self_regulation_score, motivation_score, empathy_score, social_skill_score, overall_score,  date) VALUES ('$id', '$score1', '$score2',  '$score3',  '$score4',  '$score5', '$score6',CURRENT_TIMESTAMP)";
if (mysqli_query($link, $sql)) {
$last = mysqli_insert_id($link);
echo $last;
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include("header.php") ?>
    <style type="text/css">
    form label {
    color: #1d68b2;
    </style>
  </head>
  <body>
    <div class="body">
      <?php include("menu.php") ?>
      <div role="main" class="main">
        <section class="page-header">
          <div class="container">
            <div class="row">
            </div>
            <div class="row">
              <div class="col">
                <h1>Emotional Intelligence Game</h1>
              </div>
            </div>
          </div>
        </section>
        <div class="container">
          <!-- Modal -->
          <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Emotional Intelligence</h4>
                </div>
                <div class="modal-body">
                  <h5>This module can enable you to fully harness your potential in each and every skill and subject.</h5>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal" id="instruction">Click Here for instructions.</button>
                </div>
              </div>
            </div>
          </div>
          <!--instruction modal-->
          <div class="modal" id="modalinstr" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-body">
                  <h5>The GEIT, is a forced-choice psychological test which requires you to chose one statement in each pair of statements that describes you best. For each pair of statements, select the statement that best applies to you. Do not over-analyse the questions, or try to think of "exceptions to the rule." Be spontaneous and choose the statement that comes closest to the way you are. The GEIT usually takes about 10 minutes to complete.
                  </h5>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal" id="start">Start the test</button>
                </div>
              </div>
              
            </div>
          </div>
          <!--end modal-->
          <form id="myForm">
            <div class="row">
              <div class="col-lg-6">
                <div class="row">
                  <h4><strong>1.</strong> My emotions generally have </h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question1" value="0" checked class="hides">
                    <input type="radio" id="answer1" name="question1" value="2" >
                    <label for="answer1">a strong impact on the way I behave.</label>
                  </div>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer2" name="question1" value="5">
                    <label for="answer2">little or no impact on the way I behave</label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>2.</strong> I am generally guided by</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question2" value="0" checked class="hides">
                    <input type="radio" id="answer3" name="question2" value="5" >
                    <label for="answer3">my goals and values</label>
                  </div>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer4" name="question2" value="3">
                    <label for="answer4">Other goals and values</label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>3.</strong>  When I am under pressure, I generally have </h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question3" value="0" checked class="hides">
                    <input type="radio" id="answer5" name="question3" value="2" >
                    <label for="answer5">changed  behaviours from normal</label>
                  </div>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer6" name="question3" value="5">
                    <label for="answer6">behaviours that remain unchanged</label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>4.</strong>  I generally learn most </h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question4" value="0" checked class="hides">
                    <input type="radio" id="answer7" name="question4" value="3" >
                    <label for="answer7"> by actively doing activities</label>
                  </div>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer8" name="question4" value="5">
                    <label for="answer8">from reflecting on past experiences.</label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>5.</strong>  I generally </h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question5" value="0" checked class="hides">
                    <input type="radio" id="answer9" name="question5" value="5" >
                    <label for="answer9">have a good sense of humour about myself. </label>
                  </div>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer10" name="question5" value="2">
                    <label for="answer10">take myself seriously.</label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>6.</strong>  I present myself </h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question6" value="0" checked class="hides">
                    <input type="radio" id="answer11" name="question6" value="5" >
                    <label for="answer11">with self-assurance and having  "presence".
                    </label>
                  </div>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer12" name="question6" value="3">
                    <label for="answer12">with some confidence and cautiousness</label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>7.</strong> Where there are uncertainties and pressures, I am always</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question7" value="0" checked class="hides">
                    <input type="radio" id="answer13" name="question7" value="5" >
                    <label for="answer13">decisive and make sound decisions</label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer14" name="question7" value="2">
                    <label for="answer14">cautious about making the right decision.</label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>8.</strong> I always voice views that</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question8" value="0" checked class="hides">
                    <input type="radio" id="answer15" name="question8" value="4" >
                    <label for="answer15">are unpopular and go out on a limb for what is right</label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    
                    <input type="radio" id="answer16" name="question8" value="3">
                    <label for="answer16">most others agree with and support.</label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>9.</strong> I always like to </h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question9" value="0" checked class="hides">
                    <input type="radio" id="answer17" name="question9" value="5" >
                    <label for="answer17">take on new challenges</label>
                  </div>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer18" name="question9" value="0">
                    <label for="answer18">maintain the status quo</label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>10.</strong> I generally </h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question10" value="0" checked class="hides">
                    <input type="radio" id="answer19" name="question10" value="5" >
                    <label for="answer19">inspire confidence in others. </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer20" name="question10" value="3">
                    <label for="answer20">rely on others confidence</label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>11.</strong> I generally </h4>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question11" value="0" checked class="hides">
                    <input type="radio" id="answer21" name="question11" value="2" >
                    <label for="answer21">allow my emotions and moods to impact on my behaviours.
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer22" name="question11" value="5">
                    <label for="answer22">keep my disruptive emotions and impulses under control.
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>12.</strong> When I am under pressure</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question12" value="0" checked class="hides">
                    <input type="radio" id="answer23" name="question12" value="1" >
                    <label for="answer23">I get easily distracted in other things</label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer24" name="question12" value="5">
                    <label for="answer24">I think clearly and stay focused
                    </label>
                  </div>
                  
                </div>
                <div class="row">
                  <h4><strong>13.</strong> I always</h4>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question13" value="0" checked class="hides">
                    <input type="radio" id="answer25" name="question13" value="5" >
                    <label for="answer25">do as I say I will do. </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer26" name="question13" value="2">
                    <label for="answer26">do only what I have to do.
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>14.</strong> Trust by others.</h4>
                  
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question14" value="0" checked class="hides">
                    <input type="radio" id="answer27" name="question14" value="2" >
                    <label for="answer27">is automatically given to me</label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    
                    <input type="radio" id="answer28" name="question14" value="5">
                    <label for="answer28">is built through reliability and authenticity
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>15.</strong> I am always</h4>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question15" value="0" checked class="hides">
                    <input type="radio" id="answer29" name="question15" value="5" >
                    <label for="answer29">flexible in how I see events.
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer30" name="question15" value="3">
                    <label for="answer30">able to see events for what they are.
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>16.</strong> During changing situations, I always</h4>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question16" value="0" checked class="hides">
                    <input type="radio" id="answer31" name="question16" value="3" >
                    <label for="answer31">work hard to try and keep up with the demands.
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer32" name="question16" value="5">
                    <label for="answer32">smoothly handle multiple demands and shifting priorities.
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>17.</strong> I always</h4>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question17" value="0" checked class="hides">
                    <input type="radio" id="answer33" name="question17" value="5" >
                    <label for="answer33">set myself challenging goals
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer34" name="question17" value="2" >
                    <label for="answer34">complete the goals that are set for me
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>18.</strong> When obstacles and setbacks occur in pursuing my goals, I always</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question18" value="0" checked class="hides">
                    <input type="radio" id="answer35" name="question18" value="5" >
                    <label for="answer35">readjust the goals and/or expectations.
                    </label>
                  </div>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer36" name="question18" value="3">
                    <label for="answer36">persist in seeking the goals despite what has happened.
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>19.</strong> Generally I,</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question19" value="0" checked class="hides">
                    <input type="radio" id="answer37" name="question19" value="5" >
                    <label for="answer37">pursue goals beyond what is required or expected of me.
                    </label>
                  </div>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer38" name="question19" value="2">
                    <label for="answer38">pursue goals only as far as is required of me.
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>20.</strong> When I Identify opportunities, I am always</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question20" value="0" checked class="hides">
                    <input type="radio" id="answer39" name="question20" value="3" >
                    <label for="answer39">uncertain about whether to pursue the opportunity.
                    </label>
                  </div>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer40" name="question20" value="5">
                    <label for="answer40">proactive in pursuing the opportunity.
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="row">
                  <h4><strong>21.</strong> Group differences are always</h4>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question21" value="0" checked class="hides">
                    <input type="radio" id="answer41" name="question21" value="1" >
                    <label for="answer41">causing difficulties and unrest.
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer42" name="question21" value="5">
                    <label for="answer42">understood and valued.
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>22.</strong> When I see bias and intolerance, I always</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question22" value="0" checked class="hides">
                    <input type="radio" id="answer43" name="question22" value="5" >
                    <label for="answer43">challenge the initiating people.
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer44" name="question22" value="1">
                    <label for="answer44">turn a blind eye and ignore it.
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>23.</strong> I always help out based on</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question23" value="0" checked class="hides">
                    <input type="radio" id="answer45" name="question23" value="2" >
                    <label for="answer45">the tasks others need help with.
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer46" name="question23" value="5">
                    <label for="answer46">understanding others needs and feelings.
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>24.</strong>  I always</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question24" value="0" checked class="hides">
                    <input type="radio" id="answer47" name="question24" value="2" >
                    <label for="answer47">listen to the important words being said.
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer48" name="question24" value="5">
                    <label for="answer48">turn a blind eye and ignore it.
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>25.</strong> Others perspectives are always</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question25" value="0" checked class="hides">
                    <input type="radio" id="answer49" name="question25" value="2" >
                    <label for="answer49">understood and sensitivity shown.
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer50" name="question25" value="5">
                    <label for="answer50">clouding the issues and getting us off track.
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>26.</strong> I always find social networks in the schools</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question26" value="0" checked class="hides">
                    <input type="radio" id="answer51" name="question26" value="2" >
                    <label for="answer51">get in the way of delivering performance.
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer52" name="question26" value="5">
                    <label for="answer52">help create better decision networks.
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>27.</strong> I always use</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question27" value="0" checked class="hides">
                    <input type="radio" id="answer53" name="question27" value="2" >
                    <label for="answer53">informal key power relationships to get what I need.
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer54" name="question27" value="5">
                    <label for="answer54">formal decision networks to get what I need.
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>28.</strong> I always</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question28" value="0" checked class="hides">
                    <input type="radio" id="answer55" name="question28" value="3" >
                    <label for="answer55">give people what they ask for.
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer56" name="question28" value="5">
                    <label for="answer56">understand people needs and match my offerings
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>29.</strong> I always</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question29" value="0" checked class="hides">
                    <input type="radio" id="answer57" name="question29" value="5" >
                    <label for="answer57">act as a trusted advisor to my friends.
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer58" name="question29" value="3">
                    <label for="answer58">tell my friends what they want to hear.
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>30.</strong> Increasing loyalty</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question30" value="0" checked class="hides">
                    <input type="radio" id="answer59" name="question30" value="5" >
                    <label for="answer59">is always part of the way I work
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer60" name="question30" value="0">
                    <label for="answer60">is not important
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>31.</strong> The vision and mission are always</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question31" value="0" checked class="hides">
                    <input type="radio" id="answer61" name="question31" value="3" >
                    <label for="answer61">given to teams so they know where we are going.
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer62" name="question31" value="5">
                    <label for="answer62">used to inspire groups and individuals.
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>31.</strong>  I always</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question32" value="0" checked class="hides">
                    <input type="radio" id="answer63" name="question32" value="4" >
                    <label for="answer63">let people know of the behaviours expected.
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer64" name="question32" value="5">
                    <label for="answer64">model the behaviours expected of others.</label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>33.</strong> I always give assignments to team members who</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question33" value="0" checked class="hides">
                    <input type="radio" id="answer65" name="question33" value="5" >
                    <label for="answer65">can get the job done and do it well.
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer66" name="question33" value="3">
                    <label for="answer66">will grow and develop as a result of the challenge.
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>34.</strong> Winning people over is something</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question34" value="0" checked class="hides">
                    <input type="radio" id="answer67" name="question34" value="2" >
                    <label for="answer67">that I find difficult to do.
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer68" name="question34" value="5">
                    <label for="answer68">I am very good at.
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>35.</strong> I always communicate in a way</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question35" value="0" checked class="hides">
                    <input type="radio" id="answer69" name="question35" value="3" >
                    <label for="answer69">that everyone understands what I am saying.
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer70" name="question35" value="5">
                    <label for="answer70">that seeks mutual understanding and full information sharing
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>36.</strong> I always</h4>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question36" value="0" checked class="hides">
                    <input type="radio" id="answer71" name="question36" value="2" >
                    <label for="answer71">go along with the changes being driven by others.
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer72" name="question36" value="5">
                    <label for="answer72">recognise the need for changes and remove barriers..
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>37.</strong> I always handle difficult people</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question37" value="0" checked class="hides">
                    <input type="radio" id="answer73" name="question37" value="5" >
                    <label for="answer73">in a straight forward and direct manner.
                    </label>
                  </div>
                  <div class="col-xs-12 col-sm-12">
                    <input type="radio" id="answer74" name="question37" value="3">
                    <label for="answer74">with diplomacy and tact.
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>38.</strong> I always seek out relationships that</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question38" value="0" checked class="hides">
                    <input type="radio" id="answer75" name="question38" value="5" >
                    <label for="answer75">are mutually beneficial.
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer76" name="question38" value="3">
                    <label for="answer76">will help me achieve my end goal.
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>39.</strong> I generally have a</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question39" value="0" checked class="hides">
                    <input type="radio" id="answer77" name="question39" value="3" >
                    <label for="answer77">stronger focus on tasks rather than relationships
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer78" name="question39" value="5">
                    <label for="answer78">balanced focus on tasks and relationships.
                    </label>
                  </div>
                </div>
                <div class="row">
                  <h4><strong>40.</strong> When I work with teams, I always</h4>
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" name="question40" value="0" checked class="hides">
                    <input type="radio" id="answer79" name="question40" value="3" >
                    <label for="answer79">make it clear what I expect members to do.
                    </label>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12" >
                    <input type="radio" id="answer80" name="question40" value="5">
                    <label for="answer80">draw all members into enthusiastic participation
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12" style="margin-top: 5%; margin-bottom: 10%;">
                <button type="button" id="submitans" class="btn btn-primary btn-xl mb-2" >Submit</button>
              </div>
              <div class="col-xs-12 col-sm-12" style="padding-top: 3%;" id="result"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php include("footer.php") ?>
  </div>
  <!-- Vendor -->
  <?php include("footer_files.php") ?> 
   <script>
  $(function() {
  $('.hides').hide();
  ids = '<?php echo $user_id; ?>';
  $("#myModal").modal("show");
  $("#instruction").click(function() {
  event.preventDefault();
  $("#modalinstr").modal("show");
  });
  $("#submitans").click(function() {
  // var x = parseInt($('input[name=question1]:checked').val()) + parseInt($('input[name=question2]:checked').val()) ;
  //alert(x);
  var sa_val = parseInt($('input[name=question2]:checked').val())+parseInt($('input[name=question4]:checked').val())+parseInt($('input[name=question8]:checked').val())+parseInt($('input[name=question15]:checked').val())+parseInt($('input[name=question18]:checked').val())+parseInt($('input[name=question30]:checked').val())+parseInt($('input[name=question36]:checked').val())+parseInt($('input[name=question38]:checked').val())+parseInt($('input[name=question39]:checked').val()) ;
  //alert(sa_val);
  var sr_val = parseInt($('input[name=question1]:checked').val())+parseInt($('input[name=question3]:checked').val())+parseInt($('input[name=question6]:checked').val())+parseInt($('input[name=question7]:checked').val())+parseInt($('input[name=question12]:checked').val())+parseInt($('input[name=question18]:checked').val())+parseInt($('input[name=question39]:checked').val());
  //   alert(sr_val);
  var motivation_val = parseInt($('input[name=question9]:checked').val())+parseInt($('input[name=question10]:checked').val())+parseInt($('input[name=question13]:checked').val())+parseInt($('input[name=question16]:checked').val())+parseInt($('input[name=question17]:checked').val())+parseInt($('input[name=question18]:checked').val())+parseInt($('input[name=question19]:checked').val())+parseInt($('input[name=question20]:checked').val())+parseInt($('input[name=question30]:checked').val())+parseInt($('input[name=question38]:checked').val());
  //alert(motivation_val);
  //for 10 if id = answer 20  lower value from 3 to 2
  if($("input[name=question10]:checked").val() == 3){
  motivation_val  = motivation_val - 1;
  }
  // for 18 if id = answer 36 increase value from 3 to 4
  if($("input[name=question18]:checked").val() == 3){
  motivation_val  = motivation_val + 1;
  }
  //alert(motivation_val);
  var empathy_val = parseInt($('input[name=question8]:checked').val())+parseInt($('input[name=question10]:checked').val())+parseInt($('input[name=question14]:checked').val())+parseInt($('input[name=question15]:checked').val())+parseInt($('input[name=question21]:checked').val())+parseInt($('input[name=question22]:checked').val())+parseInt($('input[name=question23]:checked').val())+parseInt($('input[name=question24]:checked').val())+parseInt($('input[name=question26]:checked').val())+parseInt($('input[name=question28]:checked').val())+parseInt($('input[name=question30]:checked').val())+parseInt($('input[name=question31]:checked').val())+parseInt($('input[name=question32]:checked').val())+parseInt($('input[name=question33]:checked').val())+parseInt($('input[name=question34]:checked').val())+parseInt($('input[name=question35]:checked').val())+parseInt($('input[name=question37]:checked').val())+parseInt($('input[name=question38]:checked').val())+parseInt($('input[name=question39]:checked').val())+parseInt($('input[name=question40]:checked').val());
  // alert(empathy_val);
  //for 15 if id = answer 29  lower value from 5 to 4 if id = answer 30 and increase 3 to 5
  if($("input[name=question15]:checked").val() == 5){
  empathy_val  = empathy_val - 1;
  }
  if($("input[name=question15]:checked").val() == 3){
  empathy_val  = empathy_val + 2;
  }
  //for 32 if id = answer 63  lower value from 4 to 3
  if($("input[name=question32]:checked").val() == 4){
  empathy_val  = empathy_val - 1;
  }
  // for 33 if id = answer 65  lower value from 5 to 3 if id = answer 30 and increase 3 to 5
  if($("input[name=question33]:checked").val() == 5){
  empathy_val  = empathy_val - 2;
  }
  if($("input[name=question15]:checked").val() == 3){
  empathy_val  = empathy_val + 2;
  }
  //for 38 if id = answer 76  lower value from 5 to 2
  if($("input[name=question38]:checked").val() == 5){
  empathy_val  = empathy_val - 2;
  }
  //alert(empathy_val);
  var social_skill_val = parseInt($('input[name=question5]:checked').val())+parseInt($('input[name=question6]:checked').val())+parseInt($('input[name=question16]:checked').val())+parseInt($('input[name=question21]:checked').val())+parseInt($('input[name=question22]:checked').val())+parseInt($('input[name=question25]:checked').val())+parseInt($('input[name=question27]:checked').val())+parseInt($('input[name=question29]:checked').val())+parseInt($('input[name=question31]:checked').val())+parseInt($('input[name=question32]:checked').val())+parseInt($('input[name=question33]:checked').val())+parseInt($('input[name=question34]:checked').val())+parseInt($('input[name=question35]:checked').val())+parseInt($('input[name=question36]:checked').val())+parseInt($('input[name=question37]:checked').val());
  //alert(social_skill_val);
  //for 22 if id = answer 44 value from 1 to 2
  if($("input[name=question22]:checked").val() == 1){
  social_skill_val  = social_skill_val + 1;
  }
  //for 31 if id = answer 61 value from 3 to 4
  if($("input[name=question31]:checked").val() == 3){
  social_skill_val  = social_skill_val + 1;
  }
  ov_score = sa_val + sr_val + motivation_val + empathy_val + social_skill_val;
  $.ajax({
  url: "",
  type: "POST",
  data: {val1: sa_val, val2: sr_val, val3: motivation_val, val4: empathy_val, val5: social_skill_val, val6: ov_score, insert: "once"},
  success: function(responses){
  if(responses !== ''){
  location.href = 'score_intelligence.php?token='+responses+'';
  } else {
  alert(responses);
  }
  }
  });
  });
  });
  </script>
</body>
</html>