function valid() {
  //result
  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var mname = document.getElementById("mname").value;
  var faname = document.getElementById("faname").value;
  var address = document.getElementById("address").value;
  var mobile = document.getElementById("mobile").value;
  var gender = document.getElementById("gender").value;
  var dob = document.getElementById("dob").value;
  var pincode = document.getElementById("pincode").value;
  var course = document.getElementById("course").value;
  var email = document.getElementById("email").value;

  //result
  localStorage.setItem("textvalue1", fname);
  localStorage.setItem("textvalue2", lname);
  localStorage.setItem("textvalue3", mname);
  localStorage.setItem("textvalue4", faname);
  localStorage.setItem("textvalue5", address);
  localStorage.setItem("textvalue6", mobile);
  localStorage.setItem("textvalue7", gender);
  localStorage.setItem("textvalue8", dob);
  localStorage.setItem("textvalue9", pincode);
  localStorage.setItem("textvalue10", course);
  localStorage.setItem("textvalue11", email);

  var fname = document.forms["form"]["fname"];
  var lname = document.forms["form"]["lname"];
  var mname = document.forms["form"]["mname"];
  var faname = document.forms["form"]["faname"];
  var address = document.forms["form"]["address"];
  var mobile = document.forms["form"]["mobile"];
  var gender = document.forms["form"]["gender"];
  var dob = document.forms["form"]["dob"];
  var pincode = document.forms["form"]["pincode"];
  var course = document.forms["form"]["course"];
  var email = document.forms["form"]["email"];

  var erroR_first = document.getElementById("error_first");
  var erroR_last = document.getElementById("error_last");
  var erroR_mother = document.getElementById("error_mother");
  var erroR_father = document.getElementById("error_father");
  var erroR_address = document.getElementById("error_address");
  var erroR_mobile = document.getElementById("error_mobile");
  var erroR_gender = document.getElementById("error_gender");
  var erroR_dob = document.getElementById("error_dob");
  var erroR_pincode = document.getElementById("error_pincode");
  var erroR_course = document.getElementById("error_course");
  var erroR_email = document.getElementById("error_email");

  if (fname.value == "") {
    fname.style.border = "1px solid red";
    erroR_first.style.color = "red";
  } else {
    fname.style.border = "1px solid ";
    erroR_first.style.color = "";

    if (lname.value == "") {
      lname.style.border = "1px solid red";
      erroR_last.style.color = "red";
    } else {
      lname.style.border = "1px solid ";
      erroR_last.style.color = "";

      if (mname.value == "") {
        mname.style.border = "1px solid red";
        erroR_mother.style.color = "red";
      } else {
        mname.style.border = "1px solid ";
        erroR_mother.style.color = "";

        if (faname.value == "") {
          faname.style.border = "1px solid red";
          erroR_father.style.color = "red";
        } else {
          faname.style.border = "1px solid ";
          erroR_father.style.color = "";

          if (address.value == "") {
            address.style.border = "1px solid red";
            erroR_address.style.color = "red";
          } else {
            address.style.border = "1px solid ";
            erroR_address.style.color = "";

            if (mobile.value == "") {
              mobile.style.border = "1px solid red";
              erroR_mobile.style.color = "red";
            } else {
              mobile.style.border = "1px solid ";
              erroR_mobile.style.color = "";

              if (gender.value == "") {
                gender.style.border = "1px solid red";
                erroR_gender.style.color = "red";
              } else {
                gender.style.border = "1px solid ";
                erroR_gender.style.color = "";

                if (dob.value == "") {
                  dob.style.border = "1px solid red";
                  erroR_dob.style.color = "red";
                } else {
                  dob.style.border = "1px solid ";
                  erroR_dob.style.color = "";

                  if (pincode.value == "") {
                    pincode.style.border = "1px solid red";
                    erroR_pincode.style.color = "red";
                  } else {
                    pincode.style.border = "1px solid ";
                    erroR_pincode.style.color = "";

                    if (course.value == "") {
                      course.style.border = "1px solid red";
                      erroR_course.style.color = "red";
                    } else {
                      course.style.border = "1px solid ";
                      erroR_course.style.color = "";

                      if (email.value == "") {
                        email.style.border = "1px solid red";
                        erroR_email.style.color = "red";
                      } else {
                        email.style.border = "1px solid ";
                        erroR_email.style.color = "";

                        if (
                          !email.value.match(
                            /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/
                          ) ||
                          email.value == ""
                        ) {
                          erroR_email.style.display = "block";
                          email.style.border = "1px solid red";
                          erroR_email.style.color = "red";
                        } else {
                          erroR_email.style.display = "none";
                          email.style.border = "1px solid";
                          erroR_email.style.color = "red";
                          window.location = "saveinfo.html";
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
  return false;
}

function cl1() {
  document.getElementById("fname").value = "";
  document.getElementById("lname").value = "";
  document.getElementById("mname").value = "";
  document.getElementById("faname").value = "";
  document.getElementById("address").value = "";
  document.getElementById("mobile").value = "";
  document.getElementById("gender").value = "";
  document.getElementById("dob").value = "";
  document.getElementById("pincode").value = "";
  document.getElementById("course").value = "";
  document.getElementById("email").value = "";
}
