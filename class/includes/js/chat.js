
var myFirebase = new Firebase('https://sterlitetutor.firebaseio.com/');
var user_name;
var room_name;
function getroomcred(names,username){
  user_name = names;
  room_name = username;
}
var status;
var aar=[];
myFirebase.once('value', function(snap) {
  var i = 0;
  snap.forEach(function(userSnap) {
     
     aar.push(userSnap.key());
     
  });
});
function showmsg(){

var myFirebase1=new Firebase('https://sterlitetutor.firebaseio.com/'+room_name);
   /** Function to add a data listener **/
   
     myFirebase1.on('child_added', function(snapshot) {
       var msg = snapshot.val();
     
       var msgUsernameElement = document.createElement("b");
       msgUsernameElement.textContent = msg.name;
       
       var msgTextElement = document.createElement("p");
       msgTextElement.textContent = msg.msg;
 
       var msgDateElement = document.createElement("t");
       msgDateElement.textContent = msg.time;
      // console.log(msg.username+"  "+msg.text);
       var msgElement = document.createElement("div");
       msgElement.appendChild(msgUsernameElement);
       msgElement.appendChild(msgTextElement);
       msgElement.appendChild(msgDateElement);

       document.getElementById("results1").appendChild(msgElement);
     });

}


    function sendmsg()
    {
    //  var msgUser = document.getElementById("username").value;
     var msgText = document.getElementById("text").value;

checkValue(room_name,aar);
//var date= date("Y-m-d h:i:sa");

//today = new Date();  
//var newdate=today.format('YYYY-MM-DD HH:MM:SS'); 
//var newD = dateFormat(today, "YYYY-MM-DD HH:MM:SS");
    
      var datee= Date() ;
      // var newD = dateFormat(datee, "YYYY-MM-DD HH:MM:SS");
//        var today = new Date();
// var dd = today.getDate();

// var mm = today.getMonth()+1; 
// var yyyy = today.getFullYear();


// if(dd<10) 
// {
//     dd='0'+dd;
// } 

// if(mm<10) 
// {
//     mm='0'+mm;
// } 
// today = yyyy+'-'+mm+'-'+dd;
       var newCarRef = myFirebase.child(room_name).push();
   newCarRef.set({
     name: user_name,
   msg: msgText,
   time:datee
   });
    document.getElementById("text").value = "";
     }
   

    function checkValue(value,arr){
  status = 'Not exist';

 for(var i=0; i<arr.length; i++){
  var name = arr[i];
  if(name == value){
   status = 'Exist';
   break;
  }
 }

 return status;
}
