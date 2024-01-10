function teacherLogin() {
  var nic = document.getElementById("nic").value;
  var pass = document.getElementById("password").value;

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      if (request.responseText == "success") {
        // login success
        document.getElementById("failed").style.display = "none";
        window.location = "teacherDashboard.php";
      } else {
        // username is incorrect
        document.getElementById("failed").style.display = "block";
      }
    }
  };

  request.open(
    "GET",
    "process/teacherlogin.php?nic=" + nic + "&pass=" + pass + "",
    true
  );
  request.send();
}

function adminLogin() {
  var nic = document.getElementById("nic").value;
  var pass = document.getElementById("password").value;

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      if (request.responseText == "success") {
        // login success
        document.getElementById("failed").style.display = "none";
        window.location = "adminDashboard.php";
      } else {
        // username is incorrect
        document.getElementById("failed").style.display = "block";
      }
    }
  };

  request.open(
    "GET",
    "process/adminlogin.php?nic=" + nic + "&pass=" + pass + "",
    true
  );
  request.send();
}

function studentLogin() {
  var indexNo = document.getElementById("indexNo").value;
  var pass = document.getElementById("password").value;

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      if (request.status == 200) {
        if (request.responseText == "success") {
          // login success
          document.getElementById("failed").style.display = "none";
          window.location = "dashboard.php";
        } else {
          // username is incorrect
          document.getElementById("failed").style.display = "block";
        }
      } else {
        document.getElementById("failed").style.display = "block";
      }
    }
  };

  request.open(
    "GET",
    "process/studentlogin.php?index=" + indexNo + "&pass=" + pass + "",
    true
  );
  request.send();
}

function logOut() {
  request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      // statement
      window.location = "../homePage/index.html";
    }
  };
  request.open("GET", "process/logout.php", true);
  request.send();
}

function payment() {
  $(document).ready(function () {
    Swal.fire({
      icon: "info",
      title: "NOTE",
      text: "This Feature Not Available Yet",
    });
  });
}

$("#search").click(function () {
  var year = document.getElementById("selectedYear").value;
  var term = document.getElementById("selectedTerm").value;

  if ((year == "selected") | (term == "selected")) {
    $.sweetModal({
      content: "Please select a year and a term.",
      title: "Error!!!",
      icon: $.sweetModal.ICON_ERROR,
      theme: $.sweetModal.THEME_LIGHT,
      buttons: {
        OK: {
          classes: "redB",
        },
      },
    });
  } else {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if ((request.readyState == 4) & (request.status == 200)) {
        if (request.responseText == "error") {
          document.getElementById("marks-container").innerHTML = "";
          $.sweetModal({
            content: "Invalid Year or Term.",
            title: "Error!!!",
            icon: $.sweetModal.ICON_ERROR,
            theme: $.sweetModal.THEME_LIGHT,
            buttons: {
              OK: {
                classes: "redB",
              },
            },
          });
        } else {
          document.getElementById("marks-container").innerHTML =
            request.responseText;
        }
      }
    };
    request.open(
      "GET",
      "process/searchMarks.php?year=" + year + "&term=" + term + "",
      true
    );
    request.send();
  }
});

function addStudent() {
  var studentFullName = document.getElementById("studentFullName");
  var studentInitialName = document.getElementById("studentInitialName");
  var studentDateOfBirth = document.getElementById("studentDateOfBirth");
  var studentIndexNumber = document.getElementById("studentIndexNumber");
  var studentPassword = document.getElementById("studentPassword");
  var enrollYear = document.getElementById("enrollYear");
  var encrollclass = document.getElementById("encrollclass");
  var distanceToSchool = document.getElementById("distanceToSchool");
  var gender = document.getElementById("gender");
  var nationality = document.getElementById("nationality");
  var religion = document.getElementById("religion");
  var travelMethod = document.getElementById("travelMethod");
  var motherName = document.getElementById("motherName");
  var motherNIC = document.getElementById("motherNIC");
  var motherNumber = document.getElementById("motherNumber");
  var motherJob = document.getElementById("motherJob");
  var motherJobAddress = document.getElementById("motherJobAddress");
  var motherEmail = document.getElementById("motherEmail");
  var fatherName = document.getElementById("fatherName");
  var fatherNIC = document.getElementById("fatherNIC");
  var fatherNumber = document.getElementById("fatherNumber");
  var fatherJob = document.getElementById("fatherJob");
  var fatherJobAddress = document.getElementById("fatherJobAddress");
  var fatherEmail = document.getElementById("fatherEmail");
  var guardianName = document.getElementById("guardianName");
  var guardianNIC = document.getElementById("guardianNIC");
  var guardianNumber = document.getElementById("guardianNumber");
  var guardianJob = document.getElementById("guardianJob");
  var guardianJobAddress = document.getElementById("guardianJobAddress");
  var guardianEmail = document.getElementById("guardianEmail");
  var motherContactNumber = document.getElementById("motherContactNumber");
  var motherContactEmail = document.getElementById("motherContactEmail");
  var fatherContactNumber = document.getElementById("fatherContactNumber");
  var fatherContactEmail = document.getElementById("fatherContactEmail");
  var guardianContactNumber = document.getElementById("guardianContactNumber");
  var guardianContactEmail = document.getElementById("guardianContactEmail");
  var emergrencyNumber = document.getElementById("emergrencyNumber");
  var emergrencyEmail = document.getElementById("emergrencyEmail");
  var address = document.getElementById("address");

  const fullName = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
  const indexNumberRegex = /^\d+$/;
  const passwordRegex =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@!%*?&])[A-Za-z\d@!%*?&]{8,}$/;
  const enrollClassRegex = /^[A-H]$/;
  const distanceRegex = /^\d*\.?\d*$/;

  var correctNumber = 0;

  if (fullName.test(studentFullName.value)) {
    studentFullName.classList.remove("is-invalid");
    if (indexNumberRegex.test(studentIndexNumber.value)) {
      studentIndexNumber.classList.remove("is-invalid");
      if (passwordRegex.test(studentPassword.value)) {
        studentPassword.classList.remove("is-invalid");
        if (enrollClassRegex.test(encrollclass.value)) {
          encrollclass.classList.remove("is-invalid");
          if (distanceRegex.test(distanceToSchool.value)) {
            distanceToSchool.classList.remove("is-invalid");
            correctNumber += 1;
          } else {
            // invalid Distance
            distanceToSchool.classList.add("is-invalid");
          }
        } else {
          // enroll Class invalid
          encrollclass.classList.add("is-invalid");
        }
      } else {
        // Week Password
        studentPassword.classList.add("is-invalid");
      }
    } else {
      // Index number invalid
      studentIndexNumber.classList.add("is-invalid");
    }
  } else {
    // Full Name Invalid
    studentFullName.classList.add("is-invalid");
  }

  // check contact numbers are valid
  const mobileNumber = /^7[01245678]{1}[0-9]{7}$/;

  if (mobileNumber.test(motherNumber.value)) {
    correctNumber += 1;
    motherNumber.classList.remove("is-invalid");
  } else {
    // mother number is invalid
    motherNumber.classList.add("is-invalid");
  }

  if (mobileNumber.test(fatherNumber.value)) {
    correctNumber += 1;
    fatherNumber.classList.remove("is-invalid");
  } else {
    // father number is invalid
    fatherNumber.classList.add("is-invalid");
  }

  if (mobileNumber.test(guardianNumber.value) | (guardianNumber.value == "")) {
    correctNumber += 1;
    guardianNumber.classList.remove("is-invalid");
  } else {
    // guardian number is invalid
    guardianNumber.classList.add("is-invalid");
  }

  if (mobileNumber.test(emergrencyNumber.value)) {
    correctNumber += 1;
    emergrencyNumber.classList.remove("is-invalid");
  } else {
    // emergency number is invalid
    emergrencyNumber.classList.add("is-invalid");
  }

  // Email Validation Regex
  const emailRegex =
    /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

  if (emailRegex.test(emergrencyEmail.value)) {
    correctNumber += 1;
    emergrencyEmail.classList.remove("is-invalid");
  } else {
    // Invalid Email
    emergrencyEmail.classList.add("is-invalid");
  }

  // check mother email and father email empty or invalid

  if (emailRegex.test(motherEmail.value) | (motherEmail.value == "")) {
    correctNumber += 1;
    motherEmail.classList.remove("is-invalid");
  } else {
    // if mother email is invalid or not empty
    motherEmail.classList.add("is-invalid");
  }

  if (emailRegex.test(fatherEmail.value) | (fatherEmail.value == "")) {
    correctNumber += 1;
    fatherEmail.classList.remove("is-invalid");
  } else {
    // if father email is invalid or not empty
    fatherEmail.classList.add("is-invalid");
  }

  if (emailRegex.test(guardianEmail.value) | (guardianEmail.value == "")) {
    correctNumber += 1;
    guardianEmail.classList.remove("is-invalid");
  } else {
    // if guardian email is invalid or not empty
    guardianEmail.classList.add("is-invalid");
  }

  // regex for NIC check
  const nicRegex = /^\d{1,12}v?$/;

  if (nicRegex.test(motherNIC.value)) {
    correctNumber += 1;
    motherNIC.classList.remove("is-invalid");
  } else {
    // mother NIC is in=nvalid
    motherNIC.classList.add("is-invalid");
  }

  if (nicRegex.test(fatherNIC.value)) {
    correctNumber += 1;
    fatherNIC.classList.remove("is-invalid");
  } else {
    // father NIC is in=nvalid
    fatherNIC.classList.add("is-invalid");
  }

  if (nicRegex.test(guardianNIC.value)) {
    correctNumber += 1;
    guardianNIC.classList.remove("is-invalid");
  } else {
    // guardian NIC is in=nvalid
    guardianNIC.classList.add("is-invalid" | (guardianNIC.value == ""));
  }

  var form = new FormData();

  form.append("studentFullName", studentFullName.value);
  form.append("studentInitialName", studentInitialName.value);
  form.append("studentDateOfBirth", studentDateOfBirth.value);
  form.append("studentIndexNumber", studentIndexNumber.value);
  form.append("studentPassword", studentPassword.value);
  form.append("enrollYear", enrollYear.value);
  form.append("encrollclass", encrollclass.value);
  form.append("distanceToSchool", distanceToSchool.value);
  form.append("gender", gender.value);
  form.append("nationality", nationality.value);
  form.append("religion", religion.value);
  form.append("travelMethod", travelMethod.value);
  form.append("motherName", motherName.value);
  form.append("motherNIC", motherNIC.value);
  form.append("motherJob", motherJob.value);
  form.append("motherNumber", motherNumber.value);
  form.append("motherJobAddress", motherJobAddress.value);
  form.append("motherEmail", motherEmail.value);
  form.append("fatherName", fatherName.value);
  form.append("fatherNIC", fatherNIC.value);
  form.append("fatherJob", fatherJob.value);
  form.append("fatherNumber", fatherNumber.value);
  form.append("fatherJobAddress", fatherJobAddress.value);
  form.append("fatherEmail", fatherEmail.value);
  form.append("guardianName", guardianName.value);
  form.append("guardianNIC", guardianNIC.value);
  form.append("guardianJob", guardianJob.value);
  form.append("guardianNumber", guardianNumber.value);
  form.append("guardianJobAddress", guardianJobAddress.value);
  form.append("guardianEmail", guardianEmail.value);
  form.append("motherContactNumber", motherContactNumber.value);
  form.append("motherContactEmail", motherContactEmail.value);
  form.append("fatherContactNumber", fatherContactNumber.value);
  form.append("fatherContactEmail", fatherContactEmail.value);
  form.append("guardianContactNumber", guardianContactNumber.value);
  form.append("guardianContactEmail", guardianContactEmail.value);
  form.append("emergrencyNumber", emergrencyNumber.value);
  form.append("emergrencyEmail", emergrencyEmail.value);
  form.append("address", address.value);

  if (correctNumber == 12) {
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
      if (request.readyState == 4) {
        if (request.status == 200) {
          //			location.reload();
          alert("Student Added Successfully");
        } else {
          alert("failed");
        }
      }
    };

    request.open("POST", "process/addNewStudent.php", true);
    request.send(form);
  }
}

function getName() {
  const list = document.querySelectorAll("li");

  list.forEach((li) => {
    li.addEventListener("click", (event) => {
      document.getElementById("sugessions").style.display = "none";
      const dataName = event.target.getAttribute("data-name");
      document.getElementById("typing").value = dataName;
    });
  });
}

function gatherAttendanceData() {
  // Select all of the checkboxes on the page
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');

  // Create an array to store the attendance data
  var attendanceData = [];
  var absentData = [];

  // Loop through all of the checkboxes
  for (var i = 0; i < checkboxes.length; i++) {
    // Get the current checkbox and its student ID
    var checkbox = checkboxes[i];
    var studentId = checkbox.dataset.studentId;

    // Check if the checkbox is checked
    if (checkbox.checked) {
      // If the checkbox is checked, add the student ID to the attendance data array
      attendanceData.push(studentId);
    } else {
      absentData.push(studentId);
    }
  }

  absentStudents(absentData);
  // Return the attendance data array
  return attendanceData;
}

function saveAttendance() {
  // Get the attendance data
  var attendanceData = gatherAttendanceData();

  // Use the fetch function to send a POST request to the server
  fetch("./process/saveAttendance.php", {
    method: "POST",
    body: JSON.stringify(attendanceData),
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then(function (response) {
      // If the request was successful, log a message
      console.log("Attendance data saved successfully");
    })
    .catch(function (error) {
      // If there was an error, log the error message
      console.error("Error saving attendance data:", error);
    });
}

function absentStudents(absentData) {
  // Use the fetch function to send a POST request to the server
  fetch("./process/absent.php", {
    method: "POST",
    body: JSON.stringify(absentData),
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then(function (response) {
      // If the request was successful, log a message
      Swal.fire({
        position: "top-end",
        icon: "success",
        title: "You Marked Attendance Successfully",
        showConfirmButton: false,
        timer: 1500,
      });
    })
    .catch(function (error) {
      // If there was an error, log the error message
      Swal.fire({
        position: "top-end",
        icon: "error",
        title: "Some Error While Processing Request",
        showConfirmButton: false,
        timer: 2500,
      });
    });
}

function addTeacher() {
  const teacherFirstName = document.getElementById("teacherFirstName");
  const teacherLastName = document.getElementById("teacherLastName");
  const teacherFullName = document.getElementById("teacherFullName");
  const teacherDateOfBirth = document.getElementById("teacherDateOfBirth");
  const teacherNIC = document.getElementById("teacherNIC");
  const teacherGender = document.getElementById("teacherGender");
  const teacherNationality = document.getElementById("teacherNationality");
  const teacherReligion = document.getElementById("teacherReligion");
  const qualification = document.getElementById("qualification");
  const teacherContactNumber = document.getElementById("teacherContactNumber");
  const teacherEmail = document.getElementById("teacherEmail");
  const teacherPassword = document.getElementById("teacherPassword");
  const address = document.getElementById("address");

  var form = new FormData();

  form.append("teacherFirstName", teacherFirstName.value);
  form.append("teacherLastName", teacherLastName.value);
  form.append("teacherFullName", teacherFullName.value);
  form.append("teacherDateOfBirth", teacherDateOfBirth.value);
  form.append("teacherNIC", teacherNIC.value);
  form.append("teacherGender", teacherGender.value);
  form.append("teacherNationality", teacherNationality.value);
  form.append("teacherReligion", teacherReligion.value);
  form.append("qualification", qualification.value);
  form.append("teacherContactNumber", teacherContactNumber.value);
  form.append("teacherEmail", teacherEmail.value);
  form.append("teacherPassword", teacherPassword.value);
  form.append("address", address.value);

  const inputs = document.querySelectorAll("input");

  const allInputsAreFilled = Array.prototype.every.call(
    inputs,
    function (input) {
      return input.value !== "";
    }
  );

  if (allInputsAreFilled) {
    // All input fields are filled

    const mobileNumber = /^7[01245678]{1}[0-9]{7}$/;

    if (!mobileNumber.test(teacherContactNumber.value)) {
      Swal.fire({
        icon: "error",
        title: "Error.",
        text: "Double Check Mobile Number",
      });
    } else {
      var request = new XMLHttpRequest();

      request.onreadystatechange = function () {
        if (request.readyState == 4) {
          if (request.status == 200) {
            // success
			if(request.responseText == 'success') {
				Swal.fire({
					position: "top-end",
					icon: "success",
					title: "Teacher Added Successfully",
					showConfirmButton: false,
					timer: 1500,
				  });
				  const inputs = document.querySelectorAll("input");
				  inputs.forEach(input => {
					  input.value = '';
					});
			}
			else if(request.responseText == 'error'){
				Swal.fire({
					icon: "error",
					title: "Error.",
					text: "There is already a teacher with the given NIC",
				  });
			}

          } else {
            // server Error
          }
        }
      };

      request.open("POST", "process/saveTeacher.php", true);
      request.send(form);
    }
  } else {
    Swal.fire({
      icon: "error",
      title: "Error.",
      text: "Fill All Text Field!",
    });
  }
}
