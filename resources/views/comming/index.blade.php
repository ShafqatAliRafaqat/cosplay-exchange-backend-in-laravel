<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Cosplay -  Under Construction</title>

    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="<?=asset('comming/css/style.css')?>" type="text/css" media="all" />

    <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;900&display=swap" rel="stylesheet">

    <!-- font-awesome-icons -->
    <link href="<?=asset('comming/css/font-awesome.css')?>" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nixie+One&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="<?=csrf_token()?>">
</head>

<body>
<section class="w3l-coming-soon-page">
    <div class="coming-page-info-6">
        <div class="wrapper">
            <div class="header">
            <!-- <div class="logo">
						<a class="brand-logo" href="index.html"><img src="<?=asset('front/img/logo_finall.png')?>" style="width: 200px;"></a>
					</div> -->
                <!-- <div class="button text-right">
                    <a href="#contact" class="btn contact">Contact Us</a>
                </div> -->
            </div>
            <div class="coming-block">
                <img class="m-logo" src="<?=asset('comming/images/logo.jpg')?>" width="70%" style="margin: 0px auto;">
                <h2>Website Under Construction</h2>
                <p>Admist a pandemic, we are proud of our member growth. We are currently implementing new features to take this platform to the next level. <!-- <span class="hide-mbl">Please add your email below and we will let you know as soon we go live with our redesign.<span> --></p>
                <div class="countdown">
                    <div class="countdown__days">
                        <div class="number"></div>
                        <span class>Days</span>
                    </div>

                    <div class="countdown__hours">
                        <div class="number"></div>
                        <span class>Hours</span>
                    </div>

                    <div class="countdown__minutes">
                        <div class="number"></div>
                        <span class>Minutes</span>
                    </div>

                    <div class="countdown__seconds">
                        <div class="number"></div>
                        <span class>Seconds</span>
                    </div>
                </div>
                <form action="{{url('save_emails')}}" method="POST" id="notifyMail1">
                    @csrf
                    <p>Notify me when we go live:</p>
                    <div class="input">
                        <input type="email" placeholder="Email Address" required="" name="email">
                    </div>
                    <div class="button">
                        <!--<button class="btn">Notify Me</button>-->
                        <input type="submit" class="btn" value="Notify Me">
                    </div>
                </form>
            </div>
            <div class="copyright-footer">
                <div class="w3l-copy-right-left">
                    <p>© 2021 Cosplay. Made with <span class="fa fa-heart"></span> <!-- | Designed by <a
								href="https://HLTSofts.com" target="_blank">HLTSofts</a> --></p>
                </div>
                <div class="w3l-copy-right">
                    <ul class="social">
                        <li><a href="#facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a></li>
                        <li><a href="#linkedin"><span class="fa fa-linkedin" aria-hidden="true"></span></a></li>
                        <li><a href="#twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
                        <li><a href="#google"><span class="fa fa-google" aria-hidden="true"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="<?=asset('comming/js/jquery-3.3.1.min.js')?>"></script>
    <script>
        (() => {
            // Specify the deadline date
            const deadlineDate = new Date('April 7, 2021 23:59:59').getTime();

            // Cache all countdown boxes into consts
            const countdownDays = document.querySelector('.countdown__days .number');
            const countdownHours = document.querySelector('.countdown__hours .number');
            const countdownMinutes = document.querySelector('.countdown__minutes .number');
            const countdownSeconds = document.querySelector('.countdown__seconds .number');

            // Update the count down every 1 second (1000 milliseconds)
            setInterval(() => {
                // Get current date and time
                const currentDate = new Date().getTime();

                // Calculate the distance between current date and time and the deadline date and time
                const distance = deadlineDate - currentDate;

                // Calculations the data for remaining days, hours, minutes and seconds
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Insert the result data into individual countdown boxes
                countdownDays.innerHTML = days;
                countdownHours.innerHTML = hours;
                countdownMinutes.innerHTML = minutes;
                countdownSeconds.innerHTML = seconds;
            }, 1000);
        })();
    </script>

</section>
<!-- //coming-61-w3l-vv-section -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>
<script type="text/javascript">

    $(document).ready(function (e) {
        $('#notifyMail1').on('submit',function (e){
           alert('Request Saved');
        });
        $("#notifyMail").on('submit',(function(e) {
            e.preventDefault();
            $('#submit-btn').attr("disabled",'disabled');
            $.ajax({
                url: "https://cosplay-exchange.com/send_mail.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                processData:false,
                beforeSend: function(xhr, type) {
                    if (!type.crossDomain) {
                        xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                    }
                },
                success: function(data)
                {
                    alert('Request Saved');
                },
                error: function()
                {
                    alert('Request UnSuccessul');
                }
            });
        }));
    });
</script>
