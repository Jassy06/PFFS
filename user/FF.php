<?php
session_start();
$fullname = $_SESSION['fullname'] ?? '';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form - Punta Elementary School</title>
    <link rel="stylesheet" href="FF.css">
   
    <style>
     body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    
}

.container {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    width: 50%;
    max-width: 1000px;
}
.logo {
    width: 90px;
    margin-bottom: 10px;
  align-items: center;
}

.container {
    max-height: 800px; 
    overflow-y: auto; 
    overflow-x: hidden; 
    border: 1px solid #ccc; 
    padding: 10px;
}
.container {
    background: rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(10px); 
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    width: 60%;
    margin: auto;
    align-items: center;
}


h2 {
    text-align: center;
}

.question {
    margin-bottom: 15px;
}

label {
    display: block;
    margin: 5px 0;
}

button {
    width: 100%;
    padding: 10px;
    border: none;
    background-color: #007bff;
    color: white;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
}
body {
    background-image: url('../images/fbform.png');
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
    height: 120vh; 
    margin: 0;
    font-family: Arial, sans-serif;
    background-attachment: fixed; 
    overflow: hidden;

    
}
.feedbackForm {
    background-image: url('../images/fbform.png');
}


button:hover {
    background-color: #0056b3;
}

.button-link {
    display: inline-block;
    padding: 10px 20px;
    background-color: blue;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    text-align: center;
    border: none;
    cursor: pointer;
}

.button-link:hover {
    background-color: darkblue;
}
.hidden {
    display: none;
    text-align: center;
    font-weight: bold;
    color: green;
}

.header-container {
    display: flex;
    align-items: center;
    justify-content: center; 
    background: rgba(255, 255, 255, 0.3); 
    backdrop-filter: blur(10px); 
    -webkit-backdrop-filter: blur(10px); 
    padding: 10px 50px;
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 8000;
}


.logo {
    width: 60px; 
    height: auto;
    margin-right: 10px; 
    
    
}


.navbar ul {
    list-style: none;
    display: flex;
    gap: 20px;
    margin: 0;
    padding: 0;
}

.navbar ul li {
    display: inline;
}

.navbar ul li a {
    text-decoration: none;
    color: black;
    font-weight: bold;
    font-size: 16px;
}


.navbar ul li a.active {
    text-decoration: underline;
}


.container {
    margin-top: 120px;
}
html, body {
    overflow: auto; 
    scrollbar-width: none; 
}

::-webkit-scrollbar {
    display: none; 
}



    </style>
</head>
<body>
    <div class="header-container">
        <img src="../images/Slogo.png" alt="School Logo" class="logo">
        <h2>Punta Elementary School Feedback Form</h2>
    </div>


    <div class="container">
     <body> 
      
     <form id="feedbackForm">

        <input type="hidden" name="fullname" value="<?php echo htmlspecialchars($fullname); ?>">

            <div class="question">
                <h3>School Environment</h3> 
                <p>1. The school environment is clean and well-maintained.</p>
                <label><input type="radio" name="q1" value="Strongly Agree" required> Strongly Agree</label>
                <label><input type="radio" name="q1" value="Agree" required> Agree</label>
                <label><input type="radio" name="q1" value="Disagree" required> Disagree</label>
                <label><input type="radio" name="q1" value="Strongly Disagree" required> Strongly Disagree</label>
            </div>

            <div class="question">
                <p>2. Office are comfortable while you're comlplying your requirements.</p>
                <label><input type="radio" name="q2" value="Strongly Agree" required> Strongly Agree</label>
                <label><input type="radio" name="q2" value="Agree" required> Agree</label>
                <label><input type="radio" name="q2" value="Disagree" required> Disagree</label>
                <label><input type="radio" name="q2" value="Strongly Disagree" required> Strongly Disagree</label>
            </div>

            <div class="question">
                <p>3. The school provides enough ventilation and lighting in office.</p>
                <label><input type="radio" name="q3" value="Strongly Agree" required> Strongly Agree</label>
                <label><input type="radio" name="q3" value="Agree" required> Agree</label>
                <label><input type="radio" name="q3" value="Disagree" required> Disagree</label>
                <label><input type="radio" name="q3" value="Strongly Disagree" required> Strongly Disagree</label>
            </div>
            <div class="question">
                <p>4. Restrooms are clean and properly maintained.</p>
                <label><input type="radio" name="q4" value="Strongly Agree" required> Strongly Agree</label>
                <label><input type="radio" name="q4" value="Agree" required> Agree</label>
                <label><input type="radio" name="q4" value="Disagree" required> Disagree</label>
                <label><input type="radio" name="q4" value="Strongly Disagree" required> Strongly Disagree</label>
            </div>
            <div class="question">
                <p>5. Waste disposal and recycling practices are properly implemented in the office.</p>
                <label><input type="radio" name="q5" value="Strongly Agree" required> Strongly Agree</label>
                <label><input type="radio" name="q5" value="Agree" required> Agree</label>
                <label><input type="radio" name="q5" value="Disagree" required> Disagree</label>
                <label><input type="radio" name="q5" value="Strongly Disagree" required> Strongly Disagree</label>
            </div>
            <div class="question">
                <h3>Services</h3> 
                <p>1. The guidance and counseling services are accessible and helpful.</p>
                <label><input type="radio" name="q6" value="Strongly Agree" required> Strongly Agree</label>
                <label><input type="radio" name="q6" value="Agree" required> Agree</label>
                <label><input type="radio" name="q6" value="Disagree" required> Disagree</label>
                <label><input type="radio" name="q6" value="Strongly Disagree" required> Strongly Disagree</label>
            </div>
            <div class="question">
                <p>2. The school provides adequate technology and resources for learning, such as computers and internet access.</p>
                <label><input type="radio" name="q7" value="Strongly Agree" required> Strongly Agree</label>
                <label><input type="radio" name="q7" value="Agree" required> Agree</label>
                <label><input type="radio" name="q7" value="Disagree" required> Disagree</label>
                <label><input type="radio" name="q7" value="Strongly Disagree" required> Strongly Disagree</label>
            </div>
            <div class="question">
                <p>3. The enrollment and other administrative processes are efficient and student-friendly</p>
                <label><input type="radio" name="q8" value="Strongly Agree" required> Strongly Agree</label>
                <label><input type="radio" name="q8" value="Agree" required> Agree</label>
                <label><input type="radio" name="q8" value="Disagree" required> Disagree</label>
                <label><input type="radio" name="q8" value="Strongly Disagree" required> Strongly Disagree</label>
            </div>
            <div class="question">
                <p>4. The level of strictness of teachers is appropriate in giving instructions.</p>
                <label><input type="radio" name="q9" value="Strongly Agree" required> Strongly Agree</label>
                <label><input type="radio" name="q9" value="Agree" required> Agree</label>
                <label><input type="radio" name="q9" value="Disagree" required> Disagree</label>
                <label><input type="radio" name="q9" value="Strongly Disagree" required> Strongly Disagree</label>
            </div>
            <div class="question">
                <p>5.Teachers are approachable and open to student questions or concerns.</p>
                <label><input type="radio" name="q10" value="Strongly Agree" required> Strongly Agree</label>
                <label><input type="radio" name="q10" value="Agree" required> Agree</label>
                <label><input type="radio" name="q10" value="Disagree" required> Disagree</label>
                <label><input type="radio" name="q10" value="Strongly Disagree" required> Strongly Disagree</label>
            </div>
            <div class="question">
                <h3>Other Factors</h3> 
                <p>1. Teachers are approachable and willing to assist students with academic concerns.</p>
                <label><input type="radio" name="q11" value="Strongly Agree" required> Strongly Agree</label>
                <label><input type="radio" name="q11" value="Agree" required> Agree</label>
                <label><input type="radio" name="q11" value="Disagree" required> Disagree</label>
                <label><input type="radio" name="q11" value="Strongly Disagree" required> Strongly Disagree</label>
            </div>
            <div class="question">
                <p>2. The school keeps parents informed and involved in student progress.</p>
                <label><input type="radio" name="q12" value="Strongly Agree" required> Strongly Agree</label>
                <label><input type="radio" name="q12" value="Agree" required> Agree</label>
                <label><input type="radio" name="q12" value="Disagree" required> Disagree</label>
                <label><input type="radio" name="q12" value="Strongly Disagree" required> Strongly Disagree</label>
            </div>
            <div class="question">
                <p>3. The school effectively prepares students for future academic or career paths.</p>
                <label><input type="radio" name="q13" value="Strongly Agree" required> Strongly Agree</label>
                <label><input type="radio" name="q13" value="Agree" required> Agree</label>
                <label><input type="radio" name="q13" value="Disagree" required> Disagree</label>
                <label><input type="radio" name="q13" value="Strongly Disagree" required> Strongly Disagree</label>
            </div>
            <div class="question">
                <p>4.The school fosters a sense of belonging and school pride among students.</p>
                <label><input type="radio" name="q14" value="Strongly Agree" required> Strongly Agree</label>
                <label><input type="radio" name="q14" value="Agree" required> Agree</label>
                <label><input type="radio" name="q14" value="Disagree" required> Disagree</label>
                <label><input type="radio" name="q14" value="Strongly Disagree" required> Strongly Disagree</label>
            </div>
            <div class="question">
                <p>5.The school takes student feedback into account when making decisions.</p>
                <label><input type="radio" name="q15" value="Strongly Agree" required> Strongly Agree</label>
                <label><input type="radio" name="q15" value="Agree" required> Agree</label>
                <label><input type="radio" name="q15" value="Disagree" required> Disagree</label>
                <label><input type="radio" name="q15" value="Strongly Disagree" required> Strongly Disagree</label>
            </div>
            <div class="question">
                <button type="submit">Submit Feedback</button>
            </div>
        </form>

  <div id="thankYouMessage" style="display:none;"></div>
<div id="submittedData"></div>


    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    const feedbackForm = document.getElementById("feedbackForm");
    if (!feedbackForm) return; 

    feedbackForm.addEventListener("submit", function (event) {
        event.preventDefault(); 

        const questions = [
            "q1", "q2", "q3", "q4", "q5",
            "q6", "q7", "q8", "q9", "q10",
            "q11", "q12", "q13", "q14", "q15"
        ];

        let isValid = true;


        document.querySelectorAll(".error-message").forEach(el => el.remove());


        const formData = new FormData(feedbackForm);


        for (let q of questions) {
            let options = document.getElementsByName(q);
            let checked = Array.from(options).some(option => option.checked);
            let questionContainer = options[0]?.closest(".question");

            if (!checked) {
                isValid = false;


                if (questionContainer && !questionContainer.querySelector(".error-message")) {
                    let errorMessage = document.createElement("p");
                    errorMessage.classList.add("error-message");
                    errorMessage.style.color = "red";
                    errorMessage.style.fontWeight = "bold";
                    errorMessage.textContent = "⚠ Please answer this question.";
                    questionContainer.appendChild(errorMessage);
                }
            }
        }


        if (!isValid) {
            alert("Please answer all required questions before submitting!");
        } else {

            const submitButton = feedbackForm.querySelector("button[type='submit']");
            if (submitButton) {
                submitButton.disabled = true;
            }


            fetch("save_feedback.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(result => {
       
                if (submitButton) {
                    submitButton.disabled = false;
                }

                if (result.success) {
  
                    document.getElementById('thankYouMessage').textContent = "Thank you for your feedback!";
                    setTimeout(function () {
                        window.location.href = 'submitted.php'; 
                    }, 3000);
                } else {
                    alert("Failed to save feedback: " + result.message);
                }
            })
            .catch(error => {
                alert("There was an error submitting the form: " + error.message);
                
                if (submitButton) {
                    submitButton.disabled = false;
                }
            });
        }
    });
});

    </script>


</body>
</html>