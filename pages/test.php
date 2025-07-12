<?php require_once ('config/config.php');
$faqs = $db->get("faqs");
?>


<!-- 
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دبیرگنال - تایید کد</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }
        
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            padding: 30px;
            text-align: center;
        }
        
        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }
        
        h2 {
            color: #555;
            margin-bottom: 30px;
            font-size: 18px;
            font-weight: normal;
        }
        
        .code-inputs {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }
        
        .code-inputs input {
            width: 40px;
            height: 50px;
            margin: 0 5px;
            text-align: center;
            font-size: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
        }
        
        .code-inputs input:focus {
            border-color: #4CAF50;
        }
        
        .options {
            text-align: right;
            margin-bottom: 20px;
        }
        
        .option {
            margin-bottom: 10px;
            color: #666;
        }
        
        .option strong {
            color: #333;
        }
        
        .timer {
            color: #FF5722;
        }
        
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s;
        }
        
        button:hover {
            background-color: #45a049;
        }
        
        button:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }
        
        .footer {
            margin-top: 20px;
            color: #999;
            font-size: 12px;
        }
    </style>
</head>
<body>
     <div class="container">
        <h1>دبیرگنال</h1>
        <h2>کد تایید را وارد کنید</h2>
        
        <p>کد تایید برای شماره <strong>۵۳۰۵۸۹۷۹۹۹</strong> ارسال شد</p>
        
        <form id="verificationForm" method="post" action="verify.php">
            <div class="code-inputs">
                <input type="text" maxlength="1" pattern="[0-9]" required>
                <input type="text" maxlength="1" pattern="[0-9]" required>
                <input type="text" maxlength="1" pattern="[0-9]" required>
                <input type="text" maxlength="1" pattern="[0-9]" required>
                <input type="text" maxlength="1" pattern="[0-9]" required>
                <input type="text" maxlength="1" pattern="[0-9]" required>
            </div>
            
            <div class="options">
                <div class="option">
                    <strong>ورود با رمز عبور</strong>
                </div>
                <div class="option timer">
                    <span id="countdown">۴۰</span> ثانیه تا دریافت مجدد کد
                </div>
            </div>
            
            <input type="hidden" id="fullCode" name="verification_code">
            <button type="submit" id="submitBtn" disabled>تایید</button>
        </form>
        
        <div class="footer">
            ع ل ا t t h
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.code-inputs input');
            const fullCodeInput = document.getElementById('fullCode');
            const submitBtn = document.getElementById('submitBtn');
            const countdownElement = document.getElementById('countdown');
            
            // Focus on first input
            inputs[0].focus();
            
            // Handle input movement
            inputs.forEach((input, index) => {
                input.addEventListener('input', (e) => {
                    if (e.target.value.length === 1) {
                        if (index < inputs.length - 1) {
                            inputs[index + 1].focus();
                        } else {
                            inputs[index].blur();
                        }
                    }
                    checkCodeCompletion();
                });
                
                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace' && e.target.value === '') {
                        if (index > 0) {
                            inputs[index - 1].focus();
                        }
                    }
                });
            });
            
            // Check if all inputs are filled
            function checkCodeCompletion() {
                let allFilled = true;
                let fullCode = '';
                
                inputs.forEach(input => {
                    if (input.value === '') {
                        allFilled = false;
                    }
                    fullCode += input.value;
                });
                
                fullCodeInput.value = fullCode;
                submitBtn.disabled = !allFilled;
            }
            
            // Countdown timer
            let timeLeft = 40;
            
            const timer = setInterval(() => {
                timeLeft--;
                countdownElement.textContent = timeLeft;
                
                if (timeLeft <= 0) {
                    clearInterval(timer);
                    countdownElement.parentElement.innerHTML = '<a href="#" onclick="resendCode()">ارسال مجدد کد</a>';
                }
            }, 1000);
            
            // Resend code function
            window.resendCode = function() {
                // Here you would typically make an AJAX request to resend the code
                alert('کد تایید جدید ارسال شد');
                timeLeft = 40;
                countdownElement.textContent = timeLeft;
                
                const timer = setInterval(() => {
                    timeLeft--;
                    countdownElement.textContent = timeLeft;
                    
                    if (timeLeft <= 0) {
                        clearInterval(timer);
                        countdownElement.parentElement.innerHTML = '<a href="#" onclick="resendCode()">ارسال مجدد کد</a>';
                    }
                }, 1000);
                
                return false;
            };
        });
    </script> -->
<!-- </body>
</html> --> 

<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
       


    
    <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Accordion Item #1
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
    </div>
  </div>

</div>
   
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>


