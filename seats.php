<?php include("config.php");?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <?php include("head-tag-contents.php");?>
    
    <link rel="stylesheet" href="seats.css">
</head>
<body>
<div class="container" id="main-content">
    <h3 id="desc"></h3>
    <h4 id="seatlist">Wybrane miejsca: </h4>
    <div class="theatre">
        <div class="cinema-seats left">
            <div class="cinema-row row-1">
            <div class="seat" id="s1"></div>
            <div class="seat" id="s2"></div>
            <div class="seat" id="s3"></div>
            <div class="seat" id="s4"></div>
            <div class="seat" id="s5"></div>
            <div class="seat" id="s6"></div>
            <div class="seat" id="s7"></div>
            </div>

            <div class="cinema-row row-2">
            <div class="seat" id="s8"></div>
            <div class="seat" id="s9"></div>
            <div class="seat" id="s10"></div>
            <div class="seat" id="s11"></div>
            <div class="seat" id="s12"></div>
            <div class="seat" id="s13"></div>
            <div class="seat" id="s14"></div>
            </div>

            <div class="cinema-row row-3">
            <div class="seat" id="s15"></div>
            <div class="seat" id="s16"></div>
            <div class="seat" id="s17"></div>
            <div class="seat" id="s18"></div>
            <div class="seat" id="s19"></div>
            <div class="seat" id="s20"></div>
            <div class="seat" id="s21"></div>
            </div>

            <div class="cinema-row row-4">
            <div class="seat" id="s22"></div>
            <div class="seat" id="s23"></div>
            <div class="seat" id="s24"></div>
            <div class="seat" id="s25"></div>
            <div class="seat" id="s26"></div>
            <div class="seat" id="s27"></div>
            <div class="seat" id="s28"></div>
            </div>

            <div class="cinema-row row-5">
            <div class="seat" id="s29"></div>
            <div class="seat" id="s30"></div>
            <div class="seat" id="s31"></div>
            <div class="seat" id="s32"></div>
            <div class="seat" id="s33"></div>
            <div class="seat" id="s34"></div>
            <div class="seat" id="s35"></div>
            </div>

            <div class="cinema-row row-6">
            <div class="seat" id="s36"></div>
            <div class="seat" id="s37"></div>
            <div class="seat" id="s38"></div>
            <div class="seat" id="s39"></div>
            <div class="seat" id="s40"></div>
            <div class="seat" id="s41"></div>
            <div class="seat" id="s42"></div>
            </div>

            <div class="cinema-row row-7">
            <div class="seat" id="s43"></div>
            <div class="seat" id="s44"></div>
            <div class="seat" id="s45"></div>
            <div class="seat" id="s46"></div>
            <div class="seat" id="s47"></div>
            <div class="seat" id="s48"></div>
            <div class="seat" id="s49"></div>
            </div>
        </div>


        <div class="cinema-seats right">
            <div class="cinema-row row-1">
            <div class="seat" id="s50"></div>
            <div class="seat" id="s51"></div>
            <div class="seat" id="s52"></div>
            <div class="seat" id="s53"></div>
            <div class="seat" id="s54"></div>
            <div class="seat" id="s55"></div>
            <div class="seat" id="s56"></div>
            </div>

            <div class="cinema-row row-2">
            <div class="seat" id="s57"></div>
            <div class="seat" id="s58"></div>
            <div class="seat" id="s59"></div>
            <div class="seat" id="s60"></div>
            <div class="seat" id="s61"></div>
            <div class="seat" id="s62"></div>
            <div class="seat" id="s63"></div>
            </div>

            <div class="cinema-row row-3">
            <div class="seat" id="s64"></div>
            <div class="seat" id="s65"></div>
            <div class="seat" id="s66"></div>
            <div class="seat" id="s67"></div>
            <div class="seat" id="s68"></div>
            <div class="seat" id="s69"></div>
            <div class="seat" id="s70"></div>
            </div>

            <div class="cinema-row row-4">
            <div class="seat" id="s71"></div>
            <div class="seat" id="s72"></div>
            <div class="seat" id="s73"></div>
            <div class="seat" id="s74"></div>
            <div class="seat" id="s75"></div>
            <div class="seat" id="s76"></div>
            <div class="seat" id="s77"></div>
            </div>

            <div class="cinema-row row-5">
            <div class="seat" id="s78"></div>
            <div class="seat" id="s79"></div>
            <div class="seat" id="s80"></div>
            <div class="seat" id="s81"></div>
            <div class="seat" id="s82"></div>
            <div class="seat" id="s83"></div>
            <div class="seat" id="s84"></div>
            </div>

            <div class="cinema-row row-6">
            <div class="seat" id="s85"></div>
            <div class="seat" id="s86"></div>
            <div class="seat" id="s87"></div>
            <div class="seat" id="s88"></div>
            <div class="seat" id="s89"></div>
            <div class="seat" id="s90"></div>
            <div class="seat" id="s91"></div>
            </div>

            <div class="cinema-row row-7">
            <div class="seat" id="s92"></div>
            <div class="seat" id="s93"></div>
            <div class="seat" id="s94"></div>
            <div class="seat" id="s95"></div>
            <div class="seat" id="s96"></div>
            <div class="seat" id="s97"></div>
            <div class="seat" id="s98"></div>
            </div>
        </div>
    </div>
    <button type="button" class="btn" id="request" style="margin-left: 50%">Zamów</button>
</div>
    
     <script>
        var selected = []; 
        var hour = "<?php echo $_POST['hour'];?>";
        var day = "<?php echo $_POST['day'];?>";
        var film = "<?php echo $_POST['film'];?>";
        var userid;
        if(document.getElementById("desc").innerHTML === ""){
                document.getElementById("desc").innerHTML = "Wybrany seans: " + film + " " + day + " godz." + hour;
        }
        $('.cinema-seats .seat').on('click', function() {
            $(this).toggleClass('active');
            var element = $(this).attr('id');
            if(selected.includes(element)){
                var index = selected.indexOf(element);
                selected.splice(index, 1);
            }
            else {
                selected.push(element);
            }
            document.getElementById("seatlist").innerHTML = "";
            document.getElementById("seatlist").innerHTML += "Wybrane miejsca: " + selected;
            <?php 
			    if(isset($_SESSION["id"])){
            ?>
            userid = JSON.stringify(<?php echo $_SESSION["id"] ?>);
            <?php
            }   
            ?>
        });
        <?php 
			if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		?>
            $('.btn').on('click', function(){
                if(hour !== undefined && day !== undefined && film !== undefined && userid !== undefined && selected.length > 0) {
                    var seats = JSON.stringify(selected); 
                    $.ajax({
                        url: 'order.php',
                        type: 'POST',
                        data: {"hour" : hour, "day" : day, "film" : film, "userid" : userid, "seats" : seats},
                        success: function(data) {
                            document.write(data);
                        }
                    });
                }
            })
        <?php
            }   
        ?>
     </script>
</body>
</html>
