function validation()
{

var passid = document.registration.password1;
var uname = document.registration.ime;
var lname = document.registration.prezime;
var uemail = document.registration.email;
var inputtxt = document.registration.brojTelefona;

if(passid_validation(passid,7,12))
{
if(allnumeric(inputtxt))
{
if(allLetter(lname))
{
if(allLetter(uname))
{
if(ValidateEmail(uemail))
{
} 
}
}
}
}
return false;
}
function passid_validation(passid,mx,my)
{
var passid_len = passid.value.length;
if (passid_len == 0 ||passid_len >= my || passid_len < mx)
{
alert("Password mora biti popunjen / dužina između"+mx+" to "+my);
passid.focus();
return false;
}
return true;
}
function allLetter(uname)
{ 
var letters = /^[A-Za-z]+$/;
if(uname.value.match(letters))
{
return true;
}
else
{
alert('U imenu mogu biti samo slova!');
uname.focus();
return false;
}
}
function allLetter(lname)
{ 
var letters = /^[A-Za-z]+$/;
if(lname.value.match(letters))
{
return true;
}
else
{
alert('U prezimenu mogu biti samo slova!');
lname.focus();
return false;
}
}
function ValidateEmail(uemail)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(uemail.value.match(mailformat))
{
return true;
}
else
{
alert("Email adresa nije validna!");
uemail.focus();
return false;
}
}
function allnumeric(inputtxt)
{
  var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
  if(inputtxt.value.match(phoneno))
  {
      return true();
  }
  else
  {
        alert("Broj telefona treba da ima samo brojeve!");
        inputtxt.focus();
        return false;
        }
}


