var courseLists = new Array(4)
courseLists[""] = ["  "];
courseLists.jhs = ["  "];
courseLists.shs = ["  "];
courseLists.college = ["Select course", "B.S in Business Administration Major in Marketing Management", "B.S in Accountancy", "B.S in Electronics Engineering", "B.S in Information Technology", "B.S in Tourism Management"];
function departmentChange(selectObj) {
var idx = selectObj.selectedIndex;
var which = selectObj.options[idx].value;

cList = courseLists[which];
var cSelect = document.getElementById("course");
var len = cSelect.options.length;
while (cSelect.options.length > 0) {
cSelect.remove(0);
}
var newOption;
for (var i = 0; i < cList.length; i++) {
newOption = document.createElement("option");
newOption.value = cList[i]; 
newOption.text = cList[i];
try {
    cSelect.add(newOption);
} catch (e) { 
    cSelect.appendChild(newOption);
}
}
}

// ---------------------
const   form = document.querySelector("form"),
        allInput = form.querySelectorAll(".first input"),
        container = document.querySelector(".container"),
        pwShowHide = document.querySelectorAll(".showHidePw"),
        pwFields = document.querySelectorAll(".password");

        //   js code to show/hide password and change icon
    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })
    

    $('.selectDepartment').change(function()
    {
        var departmentSelect = $(this).val();
            if(departmentSelect == "college")
            {
                $('#selectCourse').addClass("show-course");
                $('#selectCourse').removeClass("hide-course");
            } 
            else if (departmentSelect == "jhs")
            {
                $('#selectCourse').addClass("hide-course");
                $('#selectCourse').removeClass("show-course");
                $("#myCombobox option[text='Select course']").attr("selected","selected"); 
            }
            else if (departmentSelect == "shs")
            {
                $('#selectCourse').addClass("hide-course");
                $('#selectCourse').removeClass("show-course");
            }
        console.log(departmentSelect);
    });

function setcookie()
{
  var u =document.getElementById('username').value;
  var p =document.getElementById('password').value;
  document.cookie="myusrname="+u+";path=http://localhost/web6pm/";    
  document.cookie="mypswd="+p+";path=http://localhost/web6pm/";
}
function getcookiedata()
{
  console.log(document.cookie);
  var user=getCookie('myusrname');
  var pswd=getCookie('mypswd');
  document.getElementById('username').value=user;
  document.getElementById('password').value=pswd;
}
function getCookie(cname)
{
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) 
    {
      var c = ca[i];
      while (c.charAt(0) == ' ')
      {
         c = c.substring(1);
      }
       if (c.indexOf(name) == 0)
       {
        return c.substring(name.length, c.length);
       }
    }
   return "";
}
// ---------------------
function autoCaps() 
{
    var sid = document.getElementById("s_id");
    
    sid.value = sid.value.toUpperCase();
}